<?php
defined('TYPO3_MODE') or die();

(function ($_EXTKEY) {
  $icons = [
      'mugce-icon-homeslider' => 'mugce-icon-homeslider.svg',
      'mugce-icon-homesliderelement' => 'mugce-icon-homesliderelement.svg',
      'mugce-icon-header-default' => 'mugce-icon-header-default.svg',
      'mugce-icon-header-simple' => 'mugce-icon-header-simple.svg',
      'mugce-icon-header-organisation' => 'mugce-icon-header-organisation.svg',
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
      'mugce-icon-quote' => 'mugce-icon-quote.svg',
      'mugce-icon-link-list' => 'mugce-icon-link-list.svg',
      'mugce-icon-gallery' => 'mugce-icon-gallery.svg',
      'mugce-icon-newsletter' => 'mugce-icon-newsletter.svg',
      'mugce-icon-default' => 'mugce-icon-default.svg',
      'mugce-icon-link-button' => 'mugce-icon-link-button.svg'
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
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/Home.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/Default.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/NewsOverview.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/NewsDetail.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/EventsOverview.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/EventsDetail.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/BackendLayouts/SearchResults.tsconfig">'
  );
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/RTE/Page.tsconfig">'
  );

  $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['mug_ce'] = 'EXT:mug_ce/Configuration/RTE/MugCEPresets.yaml';

  // Hide content elements in list module & filter in administration module
  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Recordlist\RecordList\DatabaseRecordList::class]['modifyQuery'][]
      = \MUG\ContentElements\Hooks\Backend\RecordListQueryHook::class;

  // Hide content elements in page module
  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Backend\View\PageLayoutView::class]['modifyQuery'][] = \MUG\ContentElements\Hooks\Backend\PageViewQueryHook::class;

  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['mug_ce'] =
      \MUG\ContentElements\Hooks\Backend\ContentPreviewRenderer::class;

  // Update flexforms
  $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS'][\TYPO3\CMS\Core\Configuration\FlexForm\FlexFormTools::class]['flexParsing'][]
      = \MUG\ContentElements\Hooks\Backend\FlexFormHook::class;

  $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][GeorgRinger\News\Controller\NewsController::class] = [
      'className' => MUG\ContentElements\Xclass\NewsController::class
  ];

  // Add rootline field
  $rootlinefields = &$GLOBALS["TYPO3_CONF_VARS"]["FE"]["addRootLineFields"];
  if ($rootlinefields != '') {
    $rootlinefields .= ' , ';
  }
  $rootlinefields .= 'backend_layout';

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

  // Content Element: Header Default
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/HeaderDefault.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/HeaderDefault/setup.ts">'
  );

  // Content Element: Header Simple
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/HeaderSimple.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/HeaderSimple/setup.ts">'
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

  // Content Element: Quote
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Quote.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Quote/setup.ts">'
  );

  // Content Element: Link List
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/LinkList.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/LinkList/setup.ts">'
  );

  // Content Element: Gallery
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Gallery.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Gallery/setup.ts">'
  );

  // Content Element: Newsletter
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Newsletter.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Newsletter/setup.ts">'
  );

  // Content Element: Default
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/Default.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/Default/setup.ts">'
  );

  // Content Element: Link Button
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TSconfig/Page/ContentElements/LinkButton.tsconfig">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
      '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/ContentElements/LinkButton/setup.ts">'
  );

  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScript(
    $_EXTKEY,
    'setup',
    '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/RTE/setup.typoscript">',
    'defaultContentRendering'
  );

  $GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->listEvents'] = 'List view events';
  $GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->detailEvents'] = 'Detail view events';
  $GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->listNewsEvents'] = 'List view news and events';

})($_EXTKEY);
