tt_content.mugce_accordion < tmp.templatePaths
tt_content {
    mugce_accordion =< lib.contentElement
    mugce_accordion {
        templateName = Accordion

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
