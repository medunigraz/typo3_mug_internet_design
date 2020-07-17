<?php
defined('TYPO3_MODE') or die();

$quickLinksDoktype = 42;

// Add new page type as possible select item:
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'pages',
    'doktype',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:Doktype.quicklinks',
        $quickLinksDoktype,
        'EXT:mug_ce/Resources/Public/Icons/quicklinks.svg'
    ],
    '1',
    'after'
);

\TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
    $GLOBALS['TCA']['pages'],
    [
      // add icon for new page type:
        'ctrl' => [
            'typeicon_classes' => [
                $quickLinksDoktype => 'apps-pagetree-quicklinks',
            ],
        ],
    ]
);
