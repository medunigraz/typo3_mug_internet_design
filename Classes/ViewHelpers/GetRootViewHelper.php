<?php
namespace MUG\ContentElements\ViewHelpers;

use FluidTYPO3\Vhs\Service\PageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetRootViewHelper extends AbstractViewHelper {

  public static function renderStatic(array $arguments, \Closure $renderChildrenClosure,  RenderingContextInterface $renderingContext) {
    $pageUid = $GLOBALS['TSFE']->id;
    $pageService = GeneralUtility::makeInstance(ObjectManager::class)->get(PageService::class);
    return $pageService->getRootLine($pageUid)[0];
  }
}