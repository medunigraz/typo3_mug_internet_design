tt_content.mugce_gallery < tmp.templatePaths
tt_content {
    mugce_gallery =< lib.contentElement
    mugce_gallery {
        templateName = Gallery

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
