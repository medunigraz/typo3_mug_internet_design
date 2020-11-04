tt_content.mugce_link_list < tmp.templatePaths
tt_content {
    mugce_link_list =< lib.contentElement
    mugce_link_list {
        templateName = LinkList

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_quicklink_pid = |
                as = linklist
            }
        }
    }
}
