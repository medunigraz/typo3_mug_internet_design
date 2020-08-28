<?php
namespace MUG\ContentElements\ViewHelpers;

use FluidTYPO3\Vhs\Service\PageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Frontend\Page\PageRepository;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetOrganisationRootViewHelper extends AbstractViewHelper {

  public static function renderStatic(array $arguments, \Closure $renderChildrenClosure,  RenderingContextInterface $renderingContext) {
    $pageUid = $GLOBALS['TSFE']->id;
    $pageService = GeneralUtility::makeInstance(ObjectManager::class)->get(PageService::class);
    $pages = $pageService->getRootLine($pageUid);

    $takeNext = false;

    foreach (array_reverse($pages) as $page) {
      if ($takeNext) {
        if (($page['backend_layout'] == '') && ($page['doktype'] < PageRepository::DOKTYPE_BE_USER_SECTION)) {
          return $page;
        }
      }
      if ($page['backend_layout_next_level'] == 'pagets__organisation') {
        $takeNext = true;
      } else {
        if ($page['backend_layout_next_level'] != '') {
          $takeNext = false;
        }
      }
      if (($page['backend_layout'] == 'pagets__organisation') && ($page['doktype'] < PageRepository::DOKTYPE_BE_USER_SECTION)) {
        return $page;
      }
    }

    //nothing found - return root
    return $pages[0]['uid'];
  }
}