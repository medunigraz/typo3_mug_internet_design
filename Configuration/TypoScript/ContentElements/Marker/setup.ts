tt_content.mugce_marker < tmp.mugceDefaults
tt_content {
    mugce_marker =< lib.contentElement
    mugce_marker {
        templateName = Marker

        settings {
            ceClasses = content-block-marker
        }

        dataProcessing {
            10 = MUG\ContentElements\DataProcessing\MarkerCssProcessor
        }
    }
}
