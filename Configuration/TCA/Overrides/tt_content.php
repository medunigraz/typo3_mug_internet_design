<?php

$additionalColumns = array(
    'mugce_content_elements' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.content_elements',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'overrideChildTca' => [
                'columns' => [
                    'colPos' => [
                        'config' => [
                            'default' => '100',
                        ],
                    ],
                ],
            ],
            'foreign_field' => 'mugce_content_element_pid',
            'maxitems'      => 9999,
            'appearance' => array(
                'collapse' => 0,
                'levelLinksPosition' => 'top',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ),
        ),
    ),
    'mugce_quicklinks' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.quicklinks',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'overrideChildTca' => [
                'columns' => [
                    'CType' => [
                        'config' => [
                            'default' => 'mugce_link',
                        ],
                    ],
                    'colPos' => [
                        'config' => [
                            'default' => '101',
                        ],
                    ],
                ],
            ],
            'foreign_field' => 'mugce_quicklink_pid',
            'maxitems'      => 9999,
            'appearance' => array(
                'collapse' => 0,
                'levelLinksPosition' => 'top',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ),
        ),
    ),
    'mugce_link_label' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.link_label',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_header' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.header',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_subheader' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.subheader',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_caption' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.caption',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $additionalColumns
);

$GLOBALS['TCA']['tt_content']['ctrl']['label_userFunc'] = 'MUG\ContentElements\Userfuncs\ContentElementLabelRenderer->getContentElementTitle';

$ceName = 'mugce_homeslider';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homeslider.caption',
        $ceName,
        'mugce-icon-homeslider',
    ],
    'textmedia',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    mugce_content_elements,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'mugce_content_elements' => [
            'config' => [
                'overrideChildTca' => [
                    'columns' => [
                        'CType' => [
                            'config' => [
                                'default' => 'mugce_homesliderelement',
                            ],
                        ],
                    ],
                ],
                'maxitems' => 5,
                'minitems' => 1,
            ],
        ],
    ],
];

$ceName = 'mugce_homesliderelement';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.caption',
        $ceName,
        'mugce-icon-homesliderelement',
    ],
    'mugce_homeslider',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.header,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.subheader,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.image,
                --div--;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.tab.infobox,    
                    mugce_header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.mugce_header,
                    mugce_subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.mugce_subheader,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.header_link,
                --div--;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.tab.quicklinks, 
                    mugce_caption;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.mugce_caption,
                    mugce_quicklinks;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_homesliderelement.input.mugce_quicklinks,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1,
            ],
        ],
        'mugce_quicklinks' => [
            'config' => [
                'maxitems' => 10,
                'minitems' => 0,
            ],
        ],
    ],
];

$ceName = 'mugce_link';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link.caption',
        $ceName,
        'mugce-icon-link',
    ],
    'mugce_homesliderelement',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link.input.header,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link.input.header_link,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'header_link' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
    ],
];

$ceName = 'mugce_text';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.caption',
        $ceName,
        'mugce-icon-text',
    ],
    'mugce_link',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.subheader,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.bodytext,
                    mugce_link_label,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.header_link,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'required',
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
        ],
        'bodytext' => [
            'config' => [
                'eval' => 'required',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ]
        ]
    ]
];

$ceName = 'mugce_offers';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offers.caption',
        $ceName,
        'mugce-icon-offers',
    ],
    'mugce_text',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offers.input.header,
                    mugce_content_elements,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'mugce_content_elements' => [
            'config' => [
                'overrideChildTca' => [
                    'columns' => [
                        'CType' => [
                            'config' => [
                                'default' => 'mugce_offer',
                            ],
                        ],
                        'colPos' => [
                            'config' => [
                                'default' => '102',
                            ],
                        ],
                    ],
                ],
                'maxitems' => 10,
                'minitems' => 2,
            ],
        ],
    ],
];

$ceName = 'mugce_offer';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.caption',
        $ceName,
        'mugce-icon-offer',
    ],
    'mugce_offers',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.input.bodytext,
                    mugce_link_label;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.input.mugce_link_label,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.input.header_link,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offer.input.image,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'bodytext' => [
            'config' => [
                'eval' => 'required',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ]
        ],
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1,
            ],
        ]
    ],
];

$ceName = 'mugce_imagetiles';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetiles.caption',
        $ceName,
        'mugce-icon-imagetiles',
    ],
    'mugce_offer',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetiles.input.header,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetiles.input.subheader,
                    mugce_content_elements,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'mugce_content_elements' => [
            'config' => [
                'overrideChildTca' => [
                    'columns' => [
                        'CType' => [
                            'config' => [
                                'default' => 'mugce_imagetileselement',
                            ],
                        ],
                        'colPos' => [
                            'config' => [
                                'default' => '103',
                            ],
                        ],
                    ],
                ],
                'maxitems' => 10,
                'minitems' => 2,
            ],
        ],
    ],
];

$ceName = 'mugce_imagetileselement';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.caption',
        $ceName,
        'mugce-icon-imagetileselement',
    ],
    'mugce_imagetiles',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.input.header,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.input.subheader,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.input.header_link,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.input.image,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_imagetileselement.input.bodytext,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ',
    'columnsOverrides' => [
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1,
            ],
        ]
    ],
];
