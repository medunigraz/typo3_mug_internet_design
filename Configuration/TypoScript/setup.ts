#############################################
## Default PAGE object
#############################################
page.10 = FLUIDTEMPLATE
page.10 {
    layoutRootPaths {
        10 = EXT:mug_ce/Resources/Private/Layouts/Page/
    }

    partialRootPaths {
        10 = EXT:mug_ce/Resources/Private/Partials/Page/
    }

    templateRootPaths {
        10 = EXT:mug_ce/Resources/Private/Templates/Page/
    }
    templateName = TEXT
    templateName.stdWrap.cObject = CASE
    templateName.stdWrap.cObject {
        key.data = pagelayout

        pagets__home = TEXT
        pagets__home.value = Home.html

        pagets__default = TEXT
        pagets__default.value = Default.html

        pagets__news_overview = TEXT
        pagets__news_overview.value = NewsOverview.html

        pagets__news_detail = TEXT
        pagets__news_detail.value = NewsDetail.html

        pagets__events_overview = TEXT
        pagets__events_overview.value = EventsOverview.html

        pagets__events_detail = TEXT
        pagets__events_detail.value = EventsDetail.html

        pagets__search_results = TEXT
        pagets__search_results.value = SearchResults.html
    }
    variables {
        mugce_content < styles.content.get
        mugce_headercontent < styles.content.get
        mugce_headercontent.select.where = colPos=1
        metaNavId = TEXT
        metaNavId.value = {$const.metaNavId}
        iAmNavId = TEXT
        iAmNavId.value = {$const.iAmNavId}
        footerContentIdDe = TEXT
        footerContentIdDe.value = {$const.footerContentIds.de}
        footerContentIdEn = TEXT
        footerContentIdEn.value = {$const.footerContentIds.en}
        footerNavId = TEXT
        footerNavId.value = {$const.footerNavId}
        footerOrientationNavId = TEXT
        footerOrientationNavId.value = {$const.footerOrientationNavId}
        currentYear = TEXT
        currentYear.data = date:Y
    }
}

page.includeCSSLibs {
    bootstrap4 = https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css
}

page.includeCSS {
    file10 = https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap
    file11 = EXT:mug_ce/Resources/Public/css/styles.css
}
page.includeJS {
    file10 = https://fast.fonts.net/jsapi/4c2272bf-4d6f-4865-a659-3036c896f4bd.js
    file11 = https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js
}
page.includeJSFooter {
    file10 = EXT:mug_ce/Resources/Public/js/stuff.js
    file11 = EXT:mug_ce/Resources/Public/js/main.js
}

tmp.mugceDefaults {
    templateRootPaths {
        10 = EXT:mug_ce/Resources/Private/Templates/ContentElements/
    }
    partialRootPaths {
        10 = EXT:mug_ce/Resources/Private/Partials/ContentElements/
    }
    layoutRootPaths {
        10 = EXT:mug_ce/Resources/Private/Layouts/ContentElements/
    }
    dataProcessing {
        100 = MUG\ContentElements\DataProcessing\DefaultValuesProcessor
    }
}

plugin.tx_form {
    settings {
        yamlConfigurations {
            100 = EXT:mug_ce/Configuration/Yaml/CustomFormSetup.yaml
        }
    }
}

lib.parseFunc_RTE {
    externalBlocks {
        table {
            stdWrap.HTMLparser.tags.table.fixAttrib.class.list := addToList(table,table-bordered,table-green,table-gray,table-striped)
        }
    }
}

lib.tx_news.contentElementRendering = RECORDS
lib.tx_news.contentElementRendering {
    tables = tt_content
    source.current = 1
    dontCheckPid = 1
}

plugin.tx_news {
    view {
        templateRootPaths {
            100 = EXT:mug_ce/Resources/Private/Templates/
        }
        partialRootPaths {
            100 = EXT:mug_ce/Resources/Private/Partials/News/
        }
        layoutRootPaths {
            100 = EXT:mug_ce/Resources/Private/Layouts/News/
        }
    }
    settings {
        newsDetailPid = {$const.newsDetailPid}
        eventsDetailPid = {$const.eventsDetailPid}
        newsOverviewPid = {$const.newsOverviewPid}
        eventsOverviewPid = {$const.eventsOverviewPid}
    }
}

plugin.tx_indexedsearch {
    view {
        templateRootPaths {
            100 = EXT:mug_ce/Resources/Private/Templates/
        }
        partialRootPaths {
            100 = EXT:mug_ce/Resources/Private/Partials/Search/
        }
        layoutRootPaths {
            100 = EXT:mug_ce/Resources/Private/Layouts/Search/
        }
    }
    settings {
        newsDetailPid = {$const.newsDetailPid}
        eventsDetailPid = {$const.eventsDetailPid}
        newsOverviewPid = {$const.newsOverviewPid}
        eventsOverviewPid = {$const.eventsOverviewPid}
    }
}
