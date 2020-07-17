<?php
defined('TYPO3_MODE') or die();

(function ($_EXTKEY) {
  $icons = [
      'mugce-icon-homeslider' => 'mugce-icon-homeslider.svg',
      'mugce-icon-homesliderelement' => 'mugce-icon-homesliderelement.svg',
      'mugce-icon-link' => 'mugce-icon-link.svg',
      'mugce-icon-text' => 'mugce-icon-text.svg',
      'mugce-icon-offers' => 'mugce-icon-offers.svg',
      'mugce-icon-offer' => 'mugce-icon-offer.svg',
      'mugce-icon-imagetiles' => 'mugce-icon-imagetiles.svg',
      'mugce-icon-imagetileselement' => 'mugce-icon-imagetileselement.svg',
    ];

  $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
  foreach ($icons as $identifier => $path) {
    $iconRegistry->registerIcon(
        $identifier,
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/' . $path]
    );
  }

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/setup.ts">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/Default.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/OE.tsconfig">'
  );

  // Hide content elements in list module & filter in administration module
  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class]['modifyQuery'][]
      = \MUG\ContentElements\Hooks\Backend\RecordListQueryHook::class;

  // Hide content elements in page module
  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Backend\View\PageLayoutView::class]['modifyQuery'][] = \MUG\ContentElements\Hooks\Backend\PageViewQueryHook::class;

  // Content Element: Home Slider
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/HomeSlider.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/HomeSlider/setup.ts">'
  );

  // Content Element: Home Slider Element
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/HomeSliderElement.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/HomeSliderElement/setup.ts">'
  );

  // Content Element: Link
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Link.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Link/setup.ts">'
  );

  // Content Element: Text
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Text.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Text/setup.ts">'
  );

  // Content Element: Offers
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Offers.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Offers/setup.ts">'
  );

  // Content Element: Offer
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Offer.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Offer/setup.ts">'
  );

  // Content Element: Image Tiles
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/ImageTiles.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/ImageTiles/setup.ts">'
  );

  // Content Element: Image Tiles Element
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/ImageTilesElement.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/ImageTilesElement/setup.ts">'
  );

})($_EXTKEY);
