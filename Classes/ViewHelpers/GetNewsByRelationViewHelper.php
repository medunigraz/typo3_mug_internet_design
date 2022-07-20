<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;

class GetNewsByRelationViewHelper extends AbstractViewHelper {

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
    $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_mugce_ce_news_mm');

    $queryBuilder->select('uid_foreign');
    $queryBuilder->from('tx_mugce_ce_news_mm');
    $queryBuilder->where(
        $queryBuilder->expr()->eq('uid_local', $queryBuilder->createNamedParameter($this->arguments['uid'], \PDO::PARAM_INT))
    );
    $queryBuilder->orderBy('sorting');

    $result = $queryBuilder->execute();
    $newsEntries = array();
    while ($row = $result->fetch()) {
      $newsEntries[] = $this->newsRepository->findByUid($row);
    }

    return array_slice($newsEntries, 0,$this->arguments['limit'] ?: 3);
  }
}