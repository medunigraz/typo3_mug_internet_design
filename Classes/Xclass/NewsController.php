<?php
namespace MUG\ContentElements\Xclass;

use GeorgRinger\Eventnews\Domain\Model\Dto\Demand;
use GeorgRinger\News\Domain\Model\Dto\NewsDemand;
use GeorgRinger\News\Domain\Model\News;
use GeorgRinger\News\Seo\NewsTitleProvider;
use GeorgRinger\News\Utility\Cache;
use GeorgRinger\News\Utility\Page;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class NewsController extends \GeorgRinger\News\Controller\NewsController {

  /**
   * Output a list view of news
   *
   * @param array $overwriteDemand
   */
  public function listAction(array $overwriteDemand = null)
  {
    $this->forwardToDetailActionWhenRequested();

    $demand = $this->createDemandObjectFromSettings($this->settings);
    $demand->setActionAndClass(__METHOD__, __CLASS__);

    if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
      $demand = $this->overwriteDemandObject($demand, $overwriteDemand);
    }
    $newsRecords = $this->newsRepository->findDemanded($demand);

    $assignedValues = [
        'news' => $newsRecords,
        'overwriteDemand' => $overwriteDemand,
        'demand' => $demand,
        'categories' => null,
        'allCategories' => null,
        'tags' => null,
        'settings' => $this->settings,
    ];

    if ($demand->getCategories() !== '') {
      $categoriesList = $demand->getCategories();
      if (!is_array($categoriesList)) {
        $categoriesList = GeneralUtility::trimExplode(',', $categoriesList);
      }
      if (!empty($categoriesList)) {
        $assignedValues['categories'] = $this->categoryRepository->findByIdList($categoriesList);
      }
    }

    if ($this->settings['categories'] !== '') {
      $categoriesList = $this->settings['categories'];
      if (!is_array($categoriesList)) {
        $categoriesList = GeneralUtility::trimExplode(',', $categoriesList);
      }
      if (!empty($categoriesList)) {
        $assignedValues['allCategories'] = $this->categoryRepository->findByIdList($categoriesList, ['title' => 'ASC']);
      }
    }

    if ($demand->getTags() !== '') {
      $tagList = $demand->getTags();
      if (!is_array($tagList)) {
        $tagList = GeneralUtility::trimExplode(',', $tagList);
      }
      if (!empty($tagList)) {
        $assignedValues['tags'] = $this->tagRepository->findByIdList($tagList);
      }
    }
    $assignedValues = $this->emitActionSignal('NewsController', self::SIGNAL_NEWS_LIST_ACTION, $assignedValues);
    $this->view->assignMultiple($assignedValues);

    Cache::addPageCacheTagsByDemandObject($demand);
  }

  /**
   * Single view of a news record
   *
   * @param \GeorgRinger\News\Domain\Model\News $news news item
   * @param int $currentPage current page for optional pagination
   */
  public function detailAction(\GeorgRinger\News\Domain\Model\News $news = null, $currentPage = 1)
  {
    if ($news === null || $this->settings['isShortcut']) {
      $previewNewsId = ((int)$this->settings['singleNews'] > 0) ? $this->settings['singleNews'] : 0;
      if ($this->request->hasArgument('news_preview')) {
        $previewNewsId = (int)$this->request->getArgument('news_preview');
      }

      if ($previewNewsId > 0) {
        if ($this->isPreviewOfHiddenRecordsEnabled()) {
          $news = $this->newsRepository->findByUid($previewNewsId, false);
        } else {
          $news = $this->newsRepository->findByUid($previewNewsId);
        }
      }
    }

    if (is_a($news, News::class) && $this->settings['detail']['checkPidOfNewsRecord']
    ) {
      $news = $this->checkPidOfNewsRecord($news);
    }

    $newsDemand = GeneralUtility::makeInstance(NewsDemand::class);
    $newsDemand->setLimit(4);
    $newsRecords = $this->newsRepository->findDemanded($newsDemand);

    $moreNews = [];
    foreach ($newsRecords as $record) {
      if ($record->getUid() == $news->getUid()) continue;
      $moreNews[] = $record;
    }

    $demand = $this->createDemandObjectFromSettings($this->settings);
    $demand->setActionAndClass(__METHOD__, __CLASS__);

    $assignedValues = [
        'newsItem' => $news,
        'news' => array_slice($moreNews, 0, 3),
        'currentPage' => (int)$currentPage,
        'demand' => $demand,
        'settings' => $this->settings
    ];

    $assignedValues = $this->emitActionSignal('NewsController', self::SIGNAL_NEWS_DETAIL_ACTION, $assignedValues);
    $news = $assignedValues['newsItem'];
    $this->view->assignMultiple($assignedValues);

    // reset news if type is internal or external
    if ($news && !$this->settings['isShortcut'] && ($news->getType() === '1' || $news->getType() === '2')) {
      $news = null;
    }

    if ($news !== null) {
      Page::setRegisterProperties($this->settings['detail']['registerProperties'], $news);
      Cache::addCacheTagsByNewsRecords([$news]);

      if ($this->settings['detail']['pageTitle']['_typoScriptNodeValue']) {
        $providerConfiguration = $this->settings['detail']['pageTitle'] ?? [];
        $providerClass = $providerConfiguration['provider'] ?? NewsTitleProvider::class;

        /** @var NewsTitleProvider $provider */
        $provider = GeneralUtility::makeInstance($providerClass);
        $provider->setTitleByNews($news, $providerConfiguration);
      }
    } elseif (isset($this->settings['detail']['errorHandling'])) {
      $errorContent = $this->handleNoNewsFoundError($this->settings['detail']['errorHandling']);
      if ($errorContent) {
        return $errorContent;
      }
    }
  }


  public function listEventsAction(array $overwriteDemand = null) {
    $this->forwardToDetailActionWhenRequested();

    $newsDemand = GeneralUtility::makeInstance(NewsDemand::class);
    $newsDemand->setLimit(3);
    $newsRecords = $this->newsRepository->findDemanded($newsDemand);

    /** @var \GeorgRinger\Eventnews\Domain\Model\Dto\Demand $demand */
    $demand = $this->createDemandObjectFromSettings($this->settings,
        'GeorgRinger\\Eventnews\\Domain\\Model\\Dto\\Demand');
    $demand->setActionAndClass(__METHOD__, __CLASS__);

    if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
      $demand = $this->overwriteDemandObject($demand, $overwriteDemand);
    }

    if ($demand->getMonth() && $demand->getYear()) {
      $prevMonth = \DateTime::createFromFormat('d.m.Y', sprintf('1.%s.%s', $demand->getMonth(), $demand->getYear()))->modify('-1 month');;
      $nextMonth = \DateTime::createFromFormat('d.m.Y', sprintf('1.%s.%s', $demand->getMonth(), $demand->getYear()))->modify('+1 month');;
      $viewType = 1;
      if ($demand->getDay()) {
        $date = \DateTime::createFromFormat('d.m.Y', sprintf('%s.%s.%s', $demand->getDay(), $demand->getMonth(), $demand->getYear()));
        $demand->setRespectDay(true);
        $viewType = 2;
      } else {
        $date = \DateTime::createFromFormat('d.m.Y', sprintf('1.%s.%s', $demand->getMonth(), $demand->getYear()));
      }
    } else {
      $prevMonth = (new \DateTime())->modify('-1 month');
      $nextMonth = (new \DateTime())->modify('+1 month');
      $date = new \DateTime();
      $dateTo = (new \DateTime())->modify('+' . ($this->settings['eventsSearchDays'] ?: '365') . ' days');;
      $viewType = 0;

      $demand->setSearchDateFrom($date->format('Y/m/d'));
      $demand->setSearchDateTo($dateTo->format('Y/m/d'));
    }

    $demand->setEventRestriction(Demand::EVENT_RESTRICTION_ONLY_EVENTS);
    $eventsRecords = $this->newsRepository->findDemanded($demand);

    /** @var \GeorgRinger\Eventnews\Domain\Model\Dto\Demand $demand */
    $demandAvailable = $this->createDemandObjectFromSettings($this->settings, 'GeorgRinger\\Eventnews\\Domain\\Model\\Dto\\Demand');
    $demandAvailable->setEventRestriction(Demand::EVENT_RESTRICTION_ONLY_EVENTS);
    $dateFromAvailable = new \DateTime();
    $dateToAvailable = (new \DateTime())->modify('+' . ($this->settings['eventsSearchDays'] ?: '365') . ' days');;
    $demandAvailable->setSearchDateFrom($dateFromAvailable->format('Y/m/d'));
    $demandAvailable->setSearchDateTo($dateToAvailable->format('Y/m/d'));
    $availableEventsRecords = $this->newsRepository->findDemanded($demandAvailable);

    $availableDates = array();
    foreach ($availableEventsRecords as $availableEvent) {
      $availableDates[] = $availableEvent->getDatetime();
    }

    $assignedValues = [
        'news' => $newsRecords,
        'events' => $eventsRecords,
        'availableEvents' => $availableDates,
        'viewType' => $viewType,
        'date' => $date,
        'nextMonth' => $nextMonth,
        'prevMonth' => $prevMonth,
        'overwriteDemand' => $overwriteDemand,
        'demand' => $demand,
        'categories' => null,
        'tags' => null,
        'settings' => $this->settings,
    ];

    if ($demand->getCategories() !== '') {
      $categoriesList = $demand->getCategories();
      if (!is_array($categoriesList)) {
        $categoriesList = GeneralUtility::trimExplode(',', $categoriesList);
      }
      if (!empty($categoriesList)) {
        $assignedValues['categories'] = $this->categoryRepository->findByIdList($categoriesList);
      }
    }

    if ($demand->getTags() !== '') {
      $tagList = $demand->getTags();
      if (!is_array($tagList)) {
        $tagList = GeneralUtility::trimExplode(',', $tagList);
      }
      if (!empty($tagList)) {
        $assignedValues['tags'] = $this->tagRepository->findByIdList($tagList);
      }
    }
    $assignedValues = $this->emitActionSignal('NewsController', self::SIGNAL_NEWS_LIST_ACTION, $assignedValues);
    $this->view->assignMultiple($assignedValues);

    Cache::addPageCacheTagsByDemandObject($demand);
  }

  /**
   * Single view of a news record
   *
   * @param \GeorgRinger\News\Domain\Model\News $event event item
   */
  public function detailEventsAction(\GeorgRinger\News\Domain\Model\News $event = null)
  {
    if ($event === null || $this->settings['isShortcut']) {
      $previewNewsId = ((int)$this->settings['singleNews'] > 0) ? $this->settings['singleNews'] : 0;
      if ($this->request->hasArgument('news_preview')) {
        $previewNewsId = (int)$this->request->getArgument('news_preview');
      }

      if ($previewNewsId > 0) {
        if ($this->isPreviewOfHiddenRecordsEnabled()) {
          $event = $this->newsRepository->findByUid($previewNewsId, false);
        } else {
          $event = $this->newsRepository->findByUid($previewNewsId);
        }
      }
    }

    if (is_a($event, News::class) && $this->settings['detail']['checkPidOfNewsRecord']
    ) {
      $event = $this->checkPidOfNewsRecord($event);
    }

    $demand = $this->createDemandObjectFromSettings($this->settings);
    $demand->setActionAndClass(__METHOD__, __CLASS__);

    $assignedValues = [
        'eventItem' => $event,
        'currentPage' => 1,
        'demand' => $demand,
        'settings' => $this->settings
    ];

    $assignedValues = $this->emitActionSignal('NewsController', self::SIGNAL_NEWS_DETAIL_ACTION, $assignedValues);
    $event = $assignedValues['eventItem'];
    $this->view->assignMultiple($assignedValues);

    // reset news if type is internal or external
    if ($event && !$this->settings['isShortcut'] && ($event->getType() === '1' || $event->getType() === '2')) {
      $event = null;
    }

    if ($event !== null) {
      Page::setRegisterProperties($this->settings['detail']['registerProperties'], $event);
      Cache::addCacheTagsByNewsRecords([$event]);

      if ($this->settings['detail']['pageTitle']['_typoScriptNodeValue']) {
        $providerConfiguration = $this->settings['detail']['pageTitle'] ?? [];
        $providerClass = $providerConfiguration['provider'] ?? NewsTitleProvider::class;

        /** @var NewsTitleProvider $provider */
        $provider = GeneralUtility::makeInstance($providerClass);
        $provider->setTitleByNews($event, $providerConfiguration);
      }
    } elseif (isset($this->settings['detail']['errorHandling'])) {
      $errorContent = $this->handleNoNewsFoundError($this->settings['detail']['errorHandling']);
      if ($errorContent) {
        return $errorContent;
      }
    }
  }

}