tt_content.mugce_text_media_teaser < tmp.mugceDefaults
tt_content {
    mugce_text_media_teaser =< lib.contentElement
    mugce_text_media_teaser {
        templateName = TextMediaTeaser

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            10 {
                references {
                    fieldName = image
                }
                as = image
            }
            20 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            20 {
                table = tt_content
                orderBy = sorting
                pidInList.field = pid
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_quicklink_pid = |
                as = quicklinks
            }
        }
    }
}
