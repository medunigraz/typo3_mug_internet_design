tt_content.mugce_spotlight_cat_news_events < tmp.mugceDefaults
tt_content {
    mugce_spotlight_cat_news_events =< lib.contentElement
    mugce_spotlight_cat_news_events {
        templateName = SpotlightCatNewsEvents

        settings {
            ceClasses = content-block-spotlight
        }

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
            newsStoragePage = TEXT
            newsStoragePage.value = {$const.newsStoragePage}
            eventsStoragePage = TEXT
            eventsStoragePage.value = {$const.eventsStoragePage}
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
