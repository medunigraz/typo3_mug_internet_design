<?php
namespace MUG\ContentElements\ViewHelpers;

use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetTopEventsViewHelper extends AbstractViewHelper {

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

    $demand = GeneralUtility::makeInstance(Demand::class);
    $demand->setLimit($this->arguments['limit'] ?: 3);
    $demand->setEventRestriction(Demand::EVENT_RESTRICTION_ONLY_EVENTS);

    return $this->newsRepository->findDemanded($demand);
  }
}