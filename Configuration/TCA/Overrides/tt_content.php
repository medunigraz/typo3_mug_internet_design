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
                'showAllLocalizationLink' => 1,
                'useSortable' => 1
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
                'showAllLocalizationLink' => 1,
                'useSortable' => 1
            ),
        ),
    ),
    'mugce_news_entries' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.news_entries',
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'enableMultiSelectFilterTextfield' => true,
            'foreign_table' => 'tx_news_domain_model_news',
            'foreign_table_where' => ' AND tx_news_domain_model_news.is_event = 0 AND tx_news_domain_model_news.sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY tx_news_domain_model_news.sorting ASC',
            'MM' => 'tx_mugce_ce_news_mm'
        ),
    ),
    'mugce_event_entries' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.event_entries',
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'enableMultiSelectFilterTextfield' => true,
            'foreign_table' => 'tx_news_domain_model_news',
            'foreign_table_where' => ' AND tx_news_domain_model_news.is_event = 1 AND tx_news_domain_model_news.sys_language_uid = ###REC_FIELD_sys_language_uid### ORDER BY tx_news_domain_model_news.sorting ASC',
            'MM' => 'tx_mugce_ce_events_mm'
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
    'mugce_link_label_2' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.link_label_2',
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
    'mugce_text' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.text',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_text_2' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.text_2',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_text_3' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.text_3',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_text_4' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.text_4',
        'config' => array(
            'type' => 'input',
            'size' => 50,
            'max' => 255
        )
    ),
    'mugce_bodytext' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.bodytext',
        'config' => [
            'type' => 'text',
            'cols' => 80,
            'rows' => 15,
            'softref' => 'typolink_tag,images,email[subst],url',
            'search' => [
                'andWhere' => '{#CType}=\'text\' OR {#CType}=\'textpic\' OR {#CType}=\'textmedia\''
            ]
        ]
    ),
    'mugce_link' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'size' => 50,
            'max' => 1024,
            'eval' => 'trim',
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'title' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_link_formlabel',
                    ],
                ],
            ],
            'softref' => 'typolink'
        ]
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
    'mugce_show_border' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.show_border',
        'config' => array(
            'type' => 'check',
            'default' => '1',
        )
    ),
    'mugce_add_effect' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.add_effect',
        'config' => array(
            'type' => 'check',
            'default' => '0',
        )
    ),
    'mugce_display_type' => array (
        'exclude' => 0,
        'label' => 'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type',
        'config' => array(
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type.standard', 0]
            ],
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

$ceName = 'mugce_header_default';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.caption',
        $ceName,
        'mugce-icon-header-default',
    ],
    'mugce_homesliderelement',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    mugce_display_type,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.image,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.header,
                    mugce_header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.mugce_header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.bodytext,
                    mugce_news_entries;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.mugce_news_entries,
                    mugce_event_entries;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.mugce_event_entries,
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
      'image' => [
          'config' => [
              'maxitems' => 1,
              'minitems' => 1,
          ],
      ],
      'header' => [
          'config' => [
              'eval' => 'required'
          ]
      ],
      'mugce_display_type' => [
          'onChange' => 'reload',
          'config' => array(
              'items' => [
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.plain', 0],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.news', 1],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.events', 8],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.submenu', 2],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.text', 3],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.news_submenu', 4],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.event_submenu', 9],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.text_submenu', 5],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.text_news', 6],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_default.input.display_type.text_events', 10]
              ],
          )
      ],
      'mugce_header' => [
          'displayCond'  => [
              'OR' => [
                  'FIELD:mugce_display_type:=:3',
                  'FIELD:mugce_display_type:=:5',
                  'FIELD:mugce_display_type:=:6'
              ]
          ]
      ],
      'bodytext' => [
          'displayCond'  => [
              'OR' => [
                  'FIELD:mugce_display_type:=:3',
              ]
          ],
          'config' => [
              'enableRichtext' => true,
              'richtextConfiguration' => 'mug_ce'
          ]
      ],
      'mugce_news_entries' => [
          'displayCond'  => [
              'OR' => [
                  'FIELD:mugce_display_type:=:1',
                  'FIELD:mugce_display_type:=:4',
                  'FIELD:mugce_display_type:=:6',
                  'FIELD:mugce_display_type:=:7'
              ]
          ]
      ],
      'mugce_event_entries' => [
          'displayCond'  => [
              'OR' => [
                  'FIELD:mugce_display_type:=:8',
                  'FIELD:mugce_display_type:=:9',
                  'FIELD:mugce_display_type:=:10'
              ]
          ]
      ]
    ]
];

$ceName = 'mugce_header_simple';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_simple.caption',
        $ceName,
        'mugce-icon-header-simple',
    ],
    'mugce_header_default',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    mugce_display_type,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_header_simple.input.image,
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
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1,
            ],
        ],
    ]
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
    'mugce_header_simple',
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
                    mugce_display_type,
                    mugce_show_border,
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
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
        ],
        'mugce_display_type' => [
          'config' => array(
              'items' => [
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type.standard', 0],
                  ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text.input.display_type.headline_left', 1]
              ],
          )
        ],
        'mugce_show_border' => [
            'config' => array(
                'default' => '0'
            )
        ],
        'bodytext' => [
            'config' => [
                'eval' => 'required',
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ]
    ]
];

$ceName = 'mugce_text_columns';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.caption',
        $ceName,
        'mugce-icon-text-columns',
    ],
    'mugce_text',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.subheader,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.bodytext,
                    mugce_link_label;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.mugce_link_label,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.header_link,
                    mugce_header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.mugce_header,
                    mugce_bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.mugce_bodytext,
                    mugce_link_label_2;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.mugce_link_label_2,
                    mugce_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_columns.input.mugce_link,
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
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
        ],
        'mugce_header' => [
            'config' => [
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
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
        'mugce_bodytext' => [
            'config' => [
                'eval' => 'required',
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ]
    ]
];

$ceName = 'mugce_text_media';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.caption',
        $ceName,
        'mugce-icon-text-media',
    ],
    'mugce_text_columns',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.subheader,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.bodytext,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.image,
                    mugce_link_label;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.mugce_link_label,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media.input.header_link,
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
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1,
            ],
        ]
    ]
];

$ceName = 'mugce_text_media_teaser';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.caption',
        $ceName,
        'mugce-icon-text-media-teaser',
    ],
    'mugce_text_media',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.subheader,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.header,
                    mugce_display_type,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.bodytext,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.image,
                    mugce_header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.mugce_header,
                    mugce_bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.mugce_bodytext,
                    mugce_quicklinks;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.mugce_quicklinks,
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
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
        ],
        'mugce_display_type' => [
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type.standard', 0],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_text_media_teaser.input.display_type.no_background', 1]
                ],
            )
        ],
        'mugce_header' => [
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
        ],
        'bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
        'mugce_bodytext' => [
            'config' => [
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 0,
            ],
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
    'mugce_text_media_teaser',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offers.input.header,
                    mugce_display_type,
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
        'mugce_display_type' => [
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type.standard', 0],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_offers.input.display_type.no_background', 1]
                ],
            )
        ],
        'header' => [
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255,
            ],
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
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
        'header' => [
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255
            ],
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

$ceName = 'mugce_contact';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.caption',
        $ceName,
        'mugce-icon-contact',
    ],
    'mugce_imagetileselement',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    mugce_caption;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_caption,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.bodytext,
                    mugce_header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_header,
                    mugce_text_3;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_text_3,
                    mugce_text_4;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_text_4,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.subheader,
                    mugce_text;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_text,
                    mugce_text_2;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_text_2,
                    mugce_subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_subheader,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.header_link,
                    mugce_link_label;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.mugce_link_label,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_contact.input.image,
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
            'config' => array(
                'type' => 'input',
                'size' => 50,
                'max' => 255
            )
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 0,
            ],
        ]
    ],
];

$ceName = 'mugce_accordion';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_accordion.caption',
        $ceName,
        'mugce-icon-accordion',
    ],
    'mugce_contact',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_accordion.input.header,
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
                                'default' => 'mugce_accordionelement',
                            ],
                        ],
                        'colPos' => [
                            'config' => [
                                'default' => '104',
                            ],
                        ],
                    ],
                ],
                'maxitems' => 50,
                'minitems' => 1,
            ],
        ],
    ],
];

$ceName = 'mugce_accordionelement';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_accordionelement.caption',
        $ceName,
        'mugce-icon-accordionelement',
    ],
    'mugce_accordion',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_accordionelement.input.header,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_accordionelement.input.bodytext,
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
        'bodytext' => [
            'config' => [
                'eval' => 'required',
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ],
    ],
];

$ceName = 'mugce_quote';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.caption',
        $ceName,
        'mugce-icon-quote',
    ],
    'mugce_accordionelement',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.subheader,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.header,
                    mugce_display_type,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.bodytext,
                    mugce_subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.mugce_subheader,
                    mugce_add_effect,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.image,
                    mugce_link_label;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.mugce_link_label,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.header_link,
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
        'mugce_display_type' => [
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.default.input.display_type.standard', 0],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_quote.input.display_type.no_background', 1]
                ],
            )
        ],
        'bodytext' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'mugce_subheader' => [
            'config' => [
                'type' => 'text',
                'cols' => 50,
                'rows' => 3,
                'max' => 255
            ]
        ],
        'image' => [
            'config' => [
                'maxitems' => 1,
                'minitems' => 1
            ]
        ]
    ]
];

$ceName = 'mugce_link_list';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_list.caption',
        $ceName,
        'mugce-icon-link-list',
    ],
    'mugce_quote',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_list.input.header,
                    mugce_show_border,
                    mugce_quicklinks;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_list.input.mugce_quicklinks,
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
              'minitems' => 1
          ]
       ]
    ]
];

$ceName = 'mugce_gallery';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_gallery.caption',
        $ceName,
        'mugce-icon-gallery',
    ],
    'mugce_link_list',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    --palette--;;gallerySettings,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_gallery.input.header,
                    image;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_gallery.input.image,
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
        'image' => [
            'config' => [
                'minitems' => 1
            ]
        ]
    ]
];

$ceName = 'mugce_newsletter';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_newsletter.caption',
        $ceName,
        'mugce-icon-newsletter',
    ],
    'mugce_gallery',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_newsletter.input.header,
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
                'max' => 255
            ]
        ]
    ]
];

$ceName = 'mugce_default';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_default.caption',
        $ceName,
        'mugce-icon-default',
    ],
    'mugce_newsletter',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    bodytext;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_default.input.bodytext,
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
                'enableRichtext' => true,
                'richtextConfiguration' => 'mug_ce'
            ]
        ]
    ]
];

$ceName = 'mugce_link_button';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.caption',
        $ceName,
        'mugce-icon-link-button',
    ],
    'mugce_default',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.header,
                    header_link;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.header_link,
                    mugce_display_type,
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
        'mugce_display_type' => [
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.display_type.white', 0],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.display_type.grey', 1],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.display_type.white_no_space', 2],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_link_button.input.display_type.grey_no_space', 3]
                ],
            )
        ],
        'header' => [
            'config' => [
                'eval' => 'required'
            ]
        ],
        'header_link' => [
            'config' => [
                'eval' => 'required'
            ]
        ]
    ]
];

$ceName = 'mugce_spotlight';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.caption',
        $ceName,
        'mugce-icon-spotlight',
    ],
    'mugce_link_button',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.header,
                    mugce_display_type,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.subheader,
                    assets;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.assets,
                    mugce_news_entries,
                    mugce_event_entries,
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
        'assets' => [
            'config' => [
                'minitems' => 1
            ]
        ],
        'mugce_display_type' => [
            'onChange' => 'reload',
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.display_type.plain', 1],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.display_type.newsevents', 0],
                ],
            )
        ],
        'mugce_news_entries' => [
            'displayCond'  => 'FIELD:mugce_display_type:=:0'
        ],
        'mugce_event_entries' => [
            'displayCond'  => 'FIELD:mugce_display_type:=:0'
        ]
    ]
];

$ceName = 'mugce_spotlight_cat_news_events';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight_cat_news_events.caption',
        $ceName,
        'mugce-icon-spotlight',
    ],
    'mugce_spotlight',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    header;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight_cat_news_events.input.header,
                    subheader;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.subheader,
                    assets;LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_spotlight.input.assets,
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
        'assets' => [
            'config' => [
                'minitems' => 1
            ]
        ]
    ]
];

$ceName = 'mugce_marker';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_marker.caption',
        $ceName,
        'mugce-icon-marker',
    ],
    'mugce_spotlight_cat_news_events',
    'after'
);

$GLOBALS['TCA']['tt_content']['types'][$ceName] = [
    'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    mugce_display_type,
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
        'mugce_display_type' => [
            'onChange' => 'reload',
            'config' => array(
                'items' => [
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_marker.input.display_type.moved_down', 2],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_marker.input.display_type.standard', 0],
                    ['LLL:EXT:mug_ce/Resources/Private/Language/Backend.xlf:CType.mugce_marker.input.display_type.moved_up', 1],
                ],
            )
        ],
    ]
];
