tt_content.mugce_text_media < tmp.mugceDefaults
tt_content {
    mugce_text_media =< lib.contentElement
    mugce_text_media {
        templateName = TextMedia

        settings {
            ceClasses = ce-text-columns ce-text-media
        }

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
