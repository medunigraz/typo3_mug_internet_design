<?php
namespace MUG\ContentElements\Hooks\Backend;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;

class ContentPreviewRenderer implements PageLayoutViewDrawItemHookInterface {

  /**
   * Preprocesses the preview rendering of a content element of type "My new content element"
   *
   * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
   * @param bool $drawItem Whether to draw the item using the default functionality
   * @param string $headerContent Header content
   * @param string $itemContent Item content
   * @param array $row Record row of tt_content
   *
   * @return void
   */
  public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row) {
    if ($row['CType'] === 'mugce_contact') {
      $headerContent = $parentObject->linkEditContent('<strong>' . $row['mugce_caption'] ?: ($row['header'] ?: ($row['subheader'] ?: $row['bodytext'])) . '</strong>', $row);
    }
  }
}