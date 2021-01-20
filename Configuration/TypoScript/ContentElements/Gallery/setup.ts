tt_content.mugce_gallery < tmp.mugceDefaults
tt_content {
    mugce_gallery =< lib.contentElement
    mugce_gallery {
        templateName = Gallery

        settings {
            ceClasses = ce-gallery
        }

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            10 {
                references {
                    fieldName = image
                }
                as = images
            }
        }
    }
}
