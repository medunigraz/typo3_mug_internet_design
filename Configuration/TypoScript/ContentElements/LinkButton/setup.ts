tt_content.mugce_link_button < tmp.mugceDefaults
tt_content {
    mugce_link_button =< lib.contentElement
    mugce_link_button {
        templateName = LinkButton

        settings {
            ceClasses = ce-link-button
        }

        dataProcessing {
            10 = MUG\ContentElements\DataProcessing\LinkButtonCssProcessor
        }
    }
}
