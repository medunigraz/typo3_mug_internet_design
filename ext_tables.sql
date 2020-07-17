CREATE TABLE tt_content (
    mugce_content_elements int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_content_element_pid int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_quicklinks int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_quicklink_pid int(11) unsigned DEFAULT '0' NOT NULL,
    mugce_link_label varchar(255) DEFAULT '' NOT NULL,
    mugce_header varchar(255) DEFAULT '' NOT NULL,
    mugce_subheader varchar(255) DEFAULT '' NOT NULL,
    mugce_caption varchar(255) DEFAULT '' NOT NULL
);