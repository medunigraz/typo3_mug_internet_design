tt_content.mugce_spotlight < tmp.mugceDefaults
tt_content {
    mugce_spotlight =< lib.contentElement
    mugce_spotlight {
        templateName = Spotlight

        dataProcessing {
            10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
            10 {
                references {
                    fieldName = assets
                }
                as = assets
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
