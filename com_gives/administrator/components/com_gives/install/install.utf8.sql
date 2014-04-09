CREATE TABLE IF NOT EXISTS `j25_gives_volunteers` (
  `gives_volunteer_id` bigint(20) SERIAL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `postal` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `required` tinyint(1) NOT NULL,
  `agency` varchar(250) NOT NULL,
  `hours` int(11) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `saturday` varchar(20) NOT NULL,
  `sunday` varchar(20) NOT NULL,
  `time_flexible` tinyint(1) NOT NULL,
  `emergency_list` tinyint(1) NOT NULL,
  `other` tinyint(1) NOT NULL,
  `organization1` varchar(250) NOT NULL,
  `assignment1` varchar(250) NOT NULL,
  `dates1` varchar(250) NOT NULL,
  `organization2` varchar(250) NOT NULL,
  `assignment2` varchar(250) NOT NULL,
  `dates2` varchar(250) NOT NULL,
  `organization3` varchar(250) NOT NULL,
  `assignment3` varchar(250) NOT NULL,
  `dates3` varchar(250) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `lastminute_email` tinyint(1) NOT NULL,
  `lastminute_sms` tinyint(1) NOT NULL,
  `search` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interests` text NOT NULL,
  `locations` text NOT NULL,
  `skills` text NOT NULL,
  PRIMARY KEY  (`gives_volunteer_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `j25_gives_organizations` (
  `gives_organization_id` SERIAL,
  `title` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `postal` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `fax` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `website` varchar(250) NOT NULL,
  `director` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `contact_email` varchar(250) NOT NULL,
  `contact_title` varchar(250) NOT NULL,
  `created` varchar(250) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `mission` text NOT NULL,
  `description` text NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skills` text NOT NULL,
  `interests` text NOT NULL,
  `locations` text NOT NULL,
  `enabled` tinyint(1) NOT NULL default '0',
  `locked_by` int(11) NOT NULL,
  `locked_on` date NOT NULL,
  `logo` varchar(250) NOT NULL,
  `expires` DATE NOT NULL DEFAULT '2013-02-01'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `#__gives_opportunities` (
  `gives_opportunity_id` SERIAL,

  `title` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `province` varchar(250) NOT NULL,
  `postal` varchar(250) NOT NULL,
  `other_skills` tinyint(1) NOT NULL,
  `event` tinyint(1) NOT NULL,
  `event_date` date NOT NULL,
  `min_hours` int(11) NOT NULL,
  `max_hours` int(11) NOT NULL,
  `license` tinyint(1) NOT NULL,
  `police_check` tinyint(1) NOT NULL,
  `min_age` tinyint(1) NOT NULL,
  `other` varchar(250) NOT NULL,
  `enabled` tinyint(1) NOT NULL default '1',
  `gives_organization_id` bigint(20) NOT NULL,
  `locations` text NOT NULL,
  `interests` text NOT NULL,
  `skills` text NOT NULL,
  `description` text NOT NULL,
  `lat` varchar(10) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `notification_sent` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `#__gives_transactions` (
  `gives_transaction_id` SERIAL,

  `completed` TINYINT(1) NOT NULL DEFAULT 0,
  `gives_organization_id` BIGINT(20) NOT NULL,
  `notes` TEXT NOT NULL,
  `txn_type` VARCHAR(20) NOT NULL,
  `ipn_txn_id` VARCHAR(20) NOT NULL,
  `ipn_error` TEXT NOT NULL,

  `created_on` DATETIME,
  `modified_on` DATETIME
);

CREATE OR REPLACE VIEW `#__gives_view_opportunities` AS
  SELECT opp.*, org.expires as expires
  FROM `#__gives_opportunities` as opp
  LEFT JOIN `#__gives_organizations` AS org ON opp.gives_organization_id = org.gives_organization_id;


CREATE TABLE IF NOT EXISTS `#__gives_events` (
  `gives_event_id` SERIAL,
  `title` varchar(250) NOT NULL,
  `event_date` date NOT NULL,
  `time` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `max_capacity` INT NOT NULL DEFAULT '-1'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `#__gives_registrations` (
  `gives_registration_id` SERIAL,
  `gives_event_id` BIGINT(20) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `#__gives_ctwhours` (
  `gives_ctwhours_id` SERIAL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `school` varchar(250) NOT NULL,
  `organization` varchar(250) NOT NULL,
  `hours` INT NOT NULL,
  `user_id` INT(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;