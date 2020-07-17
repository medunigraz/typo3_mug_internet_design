<?php
defined('TYPO3_MODE') or die();

(function ($_EXTKEY) {
  $quickLinksDoktype = 42;

  // Add new page type:
  $GLOBALS['PAGES_TYPES'][$quickLinksDoktype] = [
      'type' => 'web',
      'allowedTables' => '*',
  ];

  // Provide icon for page tree, list view, ... :
  \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
      ->registerIcon(
          'apps-pagetree-quicklinks',
          TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
          [
              'source' => 'EXT:mug_ce/Resources/Public/Icons/quicklinks.svg',
          ]
      );

  // Allow backend users to drag and drop the new page type:
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
      'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $quickLinksDoktype . ')'
  );

  $GLOBALS['TBE_STYLES']['skins'][$_EXTKEY]['stylesheetDirectories'][] = 'EXT:mug_ce/Resources/Public/css/backend/';

})($_EXTKEY);