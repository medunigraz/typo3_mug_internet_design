tt_content.mugce_quote < tmp.mugceDefaults
tt_content {
    mugce_quote =< lib.contentElement
    mugce_quote {
        templateName = Quote

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
