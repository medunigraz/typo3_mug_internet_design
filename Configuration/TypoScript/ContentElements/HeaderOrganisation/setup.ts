tt_content.mugce_header_organisation < tmp.templatePaths
tt_content {
    mugce_header_organisation =< lib.contentElement
    mugce_header_organisation {
        templateName = HeaderOrganisation

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
