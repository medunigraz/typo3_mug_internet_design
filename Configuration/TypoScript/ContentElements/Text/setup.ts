tt_content.mugce_text < tmp.mugceDefaults
tt_content {
    mugce_text =< lib.contentElement
    mugce_text {
        templateName = Text
        dataProcessing {
            10 = MUG\ContentElements\DataProcessing\TextCssProcessor
        }
    }
}
