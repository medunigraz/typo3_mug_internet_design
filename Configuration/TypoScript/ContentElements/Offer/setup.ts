tt_content.mugce_offer < tmp.mugceDefaults
tt_content {
    mugce_offer =< lib.contentElement
    mugce_offer {
        templateName = Offer

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
