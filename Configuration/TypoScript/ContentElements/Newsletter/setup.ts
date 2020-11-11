tt_content.mugce_newsletter < tmp.mugceDefaults
tt_content {
    mugce_newsletter =< lib.contentElement
    mugce_newsletter {
        templateName = Newsletter
        variables {
            newsletterFormIdDe = TEXT
            newsletterFormIdDe.value = {$const.newsletterFormIds.de}
            newsletterFormIdEn = TEXT
            newsletterFormIdEn.value = {$const.newsletterFormIds.de}
        }
    }
}
