<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Med Uni Graz Content Elements',
    'description' => 'Content elements for the website of Med Uni Graz.',
    'category' => 'fe',
    'version' => '0.9.0',
    'state' => 'beta',
    'clearCacheOnLoad' => 1,
    'author' => 'Rubikon',
    'author_company' => 'Rubikon',
    'author_email' => 'development@rubikon.at',
    'constraints' => array(
        'depends' => array(
            'typo3' => '9.5.0-9.5.99',
        ),
        'conflicts' => array(
        ),
        'suggests' => array(
        )
    )
);
