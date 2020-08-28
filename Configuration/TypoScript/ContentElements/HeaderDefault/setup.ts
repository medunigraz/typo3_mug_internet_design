tt_content.mugce_header_default < tmp.templatePaths
tt_content {
    mugce_header_default =< lib.contentElement
    mugce_header_default {
        templateName = HeaderDefault

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
