<?php
defined('TYPO3_MODE') or die();

$quickLinksDoktype = 42;

// Add new page type as possible select item:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'pages_language_overlay',
    'doktype',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/locallang.xlf:archive_page_type',
        $quickLinksDoktype,
        'EXT:mug_ce/Resources/Public/Icons/quicklinks.svg'
    ],
    '1',
    'after'
);