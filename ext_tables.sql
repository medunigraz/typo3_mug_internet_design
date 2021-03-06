CREATE TABLE tt_content (
    mugce_content_elements int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_content_element_pid int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_quicklinks int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_quicklink_pid int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_link_label varchar(255) DEFAULT '' NOT NULL,
    mugce_link_label_2 varchar(255) DEFAULT '' NOT NULL,
    mugce_header varchar(255) DEFAULT '' NOT NULL,
    mugce_bodytext mediumtext,
	mugce_link varchar(1024) DEFAULT '' NOT NULL,
    mugce_subheader varchar(255) DEFAULT '' NOT NULL,
    mugce_text varchar(255) DEFAULT '' NOT NULL,
    mugce_text_2 varchar(255) DEFAULT '' NOT NULL,
    mugce_text_3 varchar(255) DEFAULT '' NOT NULL,
    mugce_text_4 varchar(255) DEFAULT '' NOT NULL,
    mugce_caption varchar(255) DEFAULT '' NOT NULL,
    mugce_show_border tinyint(1) DEFAULT '1' NOT NULL,
    mugce_add_effect tinyint(1) DEFAULT '0' NOT NULL,
    mugce_display_type smallint(5) DEFAULT '0' NOT NULL,
    mugce_news_entries int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_event_entries int(11) unsigned DEFAULT '0' NOT NULL
);

CREATE TABLE tx_mugce_ce_news_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

CREATE TABLE tx_mugce_ce_events_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);