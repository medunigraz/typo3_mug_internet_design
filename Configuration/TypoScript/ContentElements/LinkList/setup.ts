tt_content.mugce_link_list < tmp.mugceDefaults
tt_content {
    mugce_link_list =< lib.contentElement
    mugce_link_list {
        templateName = LinkList

        settings {
            ceClasses = ce-linklist trans
        }

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                pidInList.field = pid
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_quicklink_pid = |
                as = linklist
            }
        }
    }
}
