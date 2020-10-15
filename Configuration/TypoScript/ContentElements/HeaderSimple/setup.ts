tt_content.mugce_header_simple < tmp.templatePaths
tt_content {
    mugce_header_simple =< lib.contentElement
    mugce_header_simple {
        templateName = HeaderSimple

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            10 {
                references {
                    fieldName = image
                }
                as = image
            }
        }
    }
}
