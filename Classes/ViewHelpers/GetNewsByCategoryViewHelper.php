<?php
namespace MUG\ContentElements\ViewHelpers;

use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;

class GetNewsByCategoryViewHelper extends AbstractViewHelper {

  /**
   * @var \GeorgRinger\News\Domain\Repository\NewsRepository
   */
  protected $newsRepository = null;

  /**
   * @param \GeorgRinger\News\Domain\Repository\NewsRepository $newsRepository
   * @return void
   */
  public function injectNewsRepository(\GeorgRinger\News\Domain\Repository\NewsRepository $newsRepository)
  {
      $this->newsRepository = $newsRepository;
  }

  public function initializeArguments() {
    parent::initializeArguments();
    $this->registerArgument(
        'page',
        'array',
        'Optional page to use'
    );
    $this->registerArgument(
        'storagePage',
        'string',
        'Optional storage pages',
        false,
        null
    );
    $this->registerArgument(
        'uid',
        'int',
        'Uid of the content element.'
    );
    $this->registerArgument(
      'offset',
      'int',
      'Optional offset. Default is 0.',
      false,
      0
    );
    $this->registerArgument(
        'limit',
        'int',
        'Optional maximum news entries to return. Default is 3.',
        false,
        3
    );
    $this->registerArgument(
        'topNewsRestriction',
        'int',
        'Optional top news restriction. Default is not set.',
        false,
        null
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

    /** @var Demand $demand */
    $demand = GeneralUtility::makeInstance(Demand::class);
    $demand->setStoragePage($this->arguments['storagePage']);
    $demand->setCategories($catIds);
    $demand->setCategoryConjunction('OR');
    $demand->setOffset($this->arguments['offset']);
    $demand->setLimit($this->arguments['limit']);
    $demand->setEventRestriction(Demand::EVENT_RESTRICTION_NO_EVENTS);
    $demand->setOrder('datetime DESC');
    $demand->setOrderByAllowed('datetime');
    $demand->setTopNewsRestriction($this->arguments['topNewsRestriction']);
    $demand->setExcludeAlreadyDisplayedNews(true);

    return $this->newsRepository->findDemanded($demand);
  }
}