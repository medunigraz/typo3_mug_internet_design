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

        pagets__default = TEXT
        pagets__default.value = EXT:mug_ce/Resources/Private/Layouts/Default.html

        pagets__oe = TEXT
        pagets__oe.value = EXT:mug_ce/Resources/Private/Layouts/OE.html
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
    bootstrap4 = https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css
}

page.includeCSS {
    file10 = https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap
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