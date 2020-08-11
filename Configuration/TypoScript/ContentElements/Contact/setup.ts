tt_content.mugce_contact < tmp.templatePaths
tt_content {
    mugce_contact =< lib.contentElement
    mugce_contact {
        templateName = Contact

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
