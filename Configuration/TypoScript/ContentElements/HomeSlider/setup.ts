tt_content.mugce_homeslider < tmp.templatePaths
tt_content {
    mugce_homeslider =< lib.contentElement
    mugce_homeslider {
        templateName = HomeSlider

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                pidInList = this
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_content_element_pid = |
                as = elements
            }
        }
    }
}
