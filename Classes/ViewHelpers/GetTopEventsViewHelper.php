<?php
namespace MUG\ContentElements\ViewHelpers;

use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetTopEventsViewHelper extends AbstractViewHelper {

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
        'limit',
        'int',
        'Optinal maximum news entries to return. Default is 3.'
    );
  }

  public function render() {

    $demand = GeneralUtility::makeInstance(Demand::class);
    $demand->setLimit($this->arguments['limit'] ?: 3);
    $demand->setEventRestriction(Demand::EVENT_RESTRICTION_ONLY_EVENTS);
    $demand->setTopNewsFirst(true);

    return $this->newsRepository->findDemanded($demand);
  }
}