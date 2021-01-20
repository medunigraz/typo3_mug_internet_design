tt_content.mugce_header_default < tmp.mugceDefaults
tt_content {
    mugce_header_default =< lib.contentElement
    mugce_header_default {
        templateName = HeaderDefault

        settings {
            ceClasses = content-header-default
        }

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            10 {
                references {
                    fieldName = image
                }
                as = image
            }
        }
        variables {
            newsDetailPid = TEXT
            newsDetailPid.value = {$const.newsDetailPid}
            eventsDetailPid = TEXT
            eventsDetailPid.value = {$const.eventsDetailPid}
            newsOverviewPid = TEXT
            newsOverviewPid.value = {$const.newsOverviewPid}
            eventsOverviewPid = TEXT
            eventsOverviewPid.value = {$const.eventsOverviewPid}
        }
    }
}
