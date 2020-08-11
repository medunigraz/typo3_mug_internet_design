<?php
defined('TYPO3_MODE') or die();

(function ($_EXTKEY) {
  $icons = [
      'mugce-icon-homeslider' => 'mugce-icon-homeslider.svg',
      'mugce-icon-homesliderelement' => 'mugce-icon-homesliderelement.svg',
      'mugce-icon-link' => 'mugce-icon-link.svg',
      'mugce-icon-text' => 'mugce-icon-text.svg',
      'mugce-icon-text-columns' => 'mugce-icon-text-columns.svg',
      'mugce-icon-text-media' => 'mugce-icon-text-media.svg',
      'mugce-icon-text-media-teaser' => 'mugce-icon-text-media-teaser.svg',
      'mugce-icon-offers' => 'mugce-icon-offers.svg',
      'mugce-icon-offer' => 'mugce-icon-offer.svg',
      'mugce-icon-imagetiles' => 'mugce-icon-imagetiles.svg',
      'mugce-icon-imagetileselement' => 'mugce-icon-imagetileselement.svg',
      'mugce-icon-contact' => 'mugce-icon-contact.svg',
      'mugce-icon-accordion' => 'mugce-icon-accordion.svg',
      'mugce-icon-accordionelement' => 'mugce-icon-accordionelement.svg',
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

  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['mug_ce'] =
      \MUG\ContentElements\Hooks\Backend\ContentPreviewRenderer::class;

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

  // Content Element: Text Columns
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/TextColumns.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/TextColumns/setup.ts">'
  );

  // Content Element: Text Media
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/TextMedia.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/TextMedia/setup.ts">'
  );

  // Content Element: Text Media Teaser
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/TextMediaTeaser.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/TextMediaTeaser/setup.ts">'
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

  // Content Element: Contact
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Contact.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Contact/setup.ts">'
  );

  // Content Element: Accordion
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Accordion.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Accordion/setup.ts">'
  );

  // Content Element: Accordion Element
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/AccordionElement.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/AccordionElement/setup.ts">'
  );

})($_EXTKEY);
