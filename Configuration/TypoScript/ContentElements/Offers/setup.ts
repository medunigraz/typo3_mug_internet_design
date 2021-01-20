tt_content.mugce_offers < tmp.mugceDefaults
tt_content {
    mugce_offers =< lib.contentElement
    mugce_offers {
        templateName = Offers

        settings {
            ceClasses = content-block-ce-offers
        }

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                pidInList.field = pid
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_content_element_pid = |
                as = elements
            }
            20 = MUG\ContentElements\DataProcessing\OffersCssProcessor
        }
    }
}
