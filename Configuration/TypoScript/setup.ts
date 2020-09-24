#############################################
## Default PAGE object
#############################################
page.10 = FLUIDTEMPLATE
page.10 {
    layoutRootPaths {
        100 = EXT:mug_ce/Resources/Private/Layouts/
    }

    partialRootPaths {
        100 = EXT:mug_ce/Resources/Private/Partials/
    }

    templateRootPaths {
        100 = EXT:mug_ce/Resources/Private/Templates/
    }
    file.stdWrap.cObject = CASE
    file.stdWrap.cObject {
        key.data = pagelayout

        pagets__home = TEXT
        pagets__home.value = EXT:mug_ce/Resources/Private/Layouts/Home.html

        pagets__default = TEXT
        pagets__default.value = EXT:mug_ce/Resources/Private/Layouts/Default.html

        pagets__news_overview = TEXT
        pagets__news_overview.value = EXT:mug_ce/Resources/Private/Layouts/NewsOverview.html

        pagets__news_detail = TEXT
        pagets__news_detail.value = EXT:mug_ce/Resources/Private/Layouts/NewsDetail.html

        pagets__events_overview = TEXT
        pagets__events_overview.value = EXT:mug_ce/Resources/Private/Layouts/EventsOverview.html

        pagets__events_detail = TEXT
        pagets__events_detail.value = EXT:mug_ce/Resources/Private/Layouts/EventsDetail.html

        pagets__search_results = TEXT
        pagets__search_results.value = EXT:mug_ce/Resources/Private/Layouts/SearchResults.html
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
}

page.includeCSS {
    styles = EXT:mug_ce/Resources/Public/Css/styles.min.css
}
page.includeJS {
    jquery = EXT:mug_ce/Resources/Public/Js/jquery.min.js
    bootstrap = EXT:mug_ce/Resources/Public/Js/bootstrap.min.js
}
page.includeJSFooter {
    main = EXT:mug_ce/Resources/Public/Js/main.min.js
}

tmp.templatePaths {
    templateRootPaths {
        10 = EXT:mug_ce/Resources/Private/Templates/
    }
    partialRootPaths {
        10 = EXT:mug_ce/Resources/Private/Partials/
    }
    layoutRootPaths {
        10 = EXT:mug_ce/Resources/Private/Layouts/
    }
}

plugin.tx_form {
    settings {
        yamlConfigurations {
            100 = EXT:mug_ce/Configuration/Yaml/CustomFormSetup.yaml
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
