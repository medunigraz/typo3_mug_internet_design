tt_content.mugce_accordion < tmp.mugceDefaults
tt_content {
    mugce_accordion =< lib.contentElement
    mugce_accordion {
        templateName = Accordion

        settings {
            ceClasses = content-block-ce-accordion test
        }

        dataProcessing {
            10 = MUG\ContentElements\DataProcessing\AccordionDatabaseQueryProcessor
            10 {
                table = tt_content
                orderBy = sorting
                pidInList.field = pid
                where.field = uid
                where.intval = 1
                where.dataWrap = mugce_content_element_pid = |
                as = elements
            }
        }
    }
}
