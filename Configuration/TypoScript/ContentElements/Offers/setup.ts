tt_content.mugce_offers < tmp.templatePaths
tt_content {
    mugce_offers =< lib.contentElement
    mugce_offers {
        templateName = Offers

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_content_element_pid = |
                as = elements
            }
        }
    }
}
