tt_content.mugce_imagetileselement < tmp.templatePaths
tt_content {
    mugce_imagetileselement =< lib.contentElement
    mugce_imagetileselement {
        templateName = ImageTilesElement

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
