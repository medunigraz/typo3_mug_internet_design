<?php
namespace MUG\ContentElements\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;

class GetTopNewsViewHelper extends AbstractViewHelper {

  /**
   * @var \GeorgRinger\News\Domain\Repository\NewsRepository
   * @inject
   */
  protected $newsRepository = null;

  public function initializeArguments() {
    parent::initializeArguments();
    $this->registerArgument(
        'limit',
        'int',
        'Optinal maximum news entries to return. Default is 3.'
    );
  }

  public function render() {

    $demand = GeneralUtility::makeInstance(NewsDemand::class);
    $demand->setLimit($this->arguments['limit'] ?: 3);
    $demand->setTopNewsFirst(true);

    return $this->newsRepository->findDemanded($demand);
  }
}