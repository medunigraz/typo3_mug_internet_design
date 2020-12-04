<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;

class GetEventsByCategoryViewHelper extends AbstractViewHelper {

  /**
   * @var \GeorgRinger\News\Domain\Repository\NewsRepository
   * @inject
   */
  protected $newsRepository = null;

  public function initializeArguments() {
    parent::initializeArguments();
    $this->registerArgument(
        'page',
        'array',
        'Optional page to use'
    );
    $this->registerArgument(
        'uid',
        'int',
        'Uid of the content element.'
    );
    $this->registerArgument(
        'limit',
        'int',
        'Optinal maximum news entries to return. Default is 3.'
    );
  }

  public function render() {
    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_category');

    $queryBuilder->select('sys_category.uid');
    $queryBuilder->from('sys_category');
    $queryBuilder->join(
        'sys_category',
        'sys_category_record_mm',
        'sys_category_record_mm',
        $queryBuilder->expr()->eq('sys_category_record_mm.uid_local', $queryBuilder->quoteIdentifier('sys_category.uid'))
    );
    $queryBuilder->where(
        $queryBuilder->expr()->eq('sys_category_record_mm.uid_foreign', $queryBuilder->createNamedParameter($this->arguments['uid'], \PDO::PARAM_INT)),
        $queryBuilder->expr()->like('sys_category_record_mm.tablenames',  $queryBuilder->createNamedParameter('tt_content'))
    );

    $result = $queryBuilder->execute();
    $catIds = array();
    while ($row = $result->fetch()) {
      $catIds[] = $row;
    }

    if (count($catIds) == 0) {
      return array();
    }

    $demand = GeneralUtility::makeInstance(Demand::class);
    $demand->setCategories($catIds);
    $demand->setCategoryConjunction('OR');
    $demand->setLimit($this->arguments['limit'] ?: 3);
    $demand->setEventRestriction(Demand::EVENT_RESTRICTION_ONLY_EVENTS);

    return $this->newsRepository->findDemanded($demand);
  }
}