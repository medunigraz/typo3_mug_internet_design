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
    }
    variables {
        mugce_content < styles.content.get
        mugce_headercontent < styles.content.get
        mugce_headercontent.select.where = colPos=1
        metaNavId = TEXT
        metaNavId.value = {$const.metaNavId}
        iAmNavId = TEXT
        iAmNavId.value = {$const.iAmNavId}
    }
}

page.includeCSSLibs {
}

page.includeCSS {
    styles = EXT:mug_ce/Resources/Public/Css/styles.css
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
