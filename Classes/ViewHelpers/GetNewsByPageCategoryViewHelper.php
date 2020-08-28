<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;

class GetNewsByPageCategoryViewHelper extends AbstractViewHelper {

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
        'limit',
        'int',
        'Optinal maximum news entries to return. Default is 3.'
    );
  }

  public function render() {
    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_category');
    $pageUid = $this->arguments['page'] ? $this->arguments['page']['uid'] : $GLOBALS['TSFE']->page['uid'];

    $queryBuilder->select('sys_category.uid');
    $queryBuilder->from('sys_category');
    $queryBuilder->join(
        'sys_category',
        'sys_category_record_mm',
        'sys_category_record_mm',
        $queryBuilder->expr()->eq('sys_category_record_mm.uid_local', $queryBuilder->quoteIdentifier('sys_category.uid'))
    );
    $queryBuilder->where(
        $queryBuilder->expr()->eq('sys_category_record_mm.uid_foreign', $queryBuilder->createNamedParameter($pageUid, \PDO::PARAM_INT)),
        $queryBuilder->expr()->like('sys_category_record_mm.tablenames',  $queryBuilder->createNamedParameter('pages'))
    );

    $result = $queryBuilder->execute();
    $catIds = array();
    while ($row = $result->fetch()) {
      $catIds[] = $row;
    }

    if (count($catIds) == 0) {
      return array();
    }

    $demand = GeneralUtility::makeInstance(NewsDemand::class);
    $demand->setCategories($catIds);
    $demand->setCategoryConjunction('OR');
    $demand->setLimit($this->arguments['limit'] ?: 3);

    return $this->newsRepository->findDemanded($demand);
  }
}