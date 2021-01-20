tt_content.mugce_text_columns < tmp.mugceDefaults
tt_content {
    mugce_text_columns =< lib.contentElement
    mugce_text_columns {
        templateName = TextColumns

        settings {
            ceClasses = ce-text-columns
        }
    }
}
