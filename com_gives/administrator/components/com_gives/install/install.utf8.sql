CREATE TABLE IF NOT EXISTS `#__gives_volunteers` (
	`gives_volunteer_id` SERIAL,
	
	# personal info
	`first_name`	VARCHAR(250) NOT NULL,
	`last_name`		VARCHAR(250) NOT NULL,
	`address`		VARCHAR(250) NOT NULL,
	`city`			VARCHAR(250) NOT NULL,
	`province`		VARCHAR(250) NOT NULL,
	`postal`		VARCHAR(250) NOT NULL,
	`phone`			VARCHAR(250) NOT NULL,
	`email`			VARCHAR(250) NOT NULL,
	`type`			TINYINT(1) NOT NULL,
	`required`		TINYINT(1) NOT NULL,
	`agency`		VARCHAR(250) NOT NULL,
	`hours`			INT NOT NULL,
	
	# search info
	`interests`		TEXT NOT NULL,
	`skills`		TEXT NOT NULL,
	`locations`		TEXT NOT NULL,
	
	# availability
	`monday`		VARCHAR(20) NOT NULL,
	`tuesday`		VARCHAR(20) NOT NULL,
	`wednesday`		VARCHAR(20) NOT NULL,
	`thursday`		VARCHAR(20) NOT NULL,
	`friday`		VARCHAR(20) NOT NULL,
	`saturday`		VARCHAR(20) NOT NULL,
	`sunday`		VARCHAR(20) NOT NULL,
	`time_flexible`	TINYINT(1) NOT NULL,
	`emergency_list`TINYINT(1) NOT NULL, 
	
	# experience
	`organization1`		VARCHAR(250) NOT NULL,
	`assignment1`		VARCHAR(250) NOT NULL,
	`dates1`			VARCHAR(250) NOT NULL,
	`organization2`		VARCHAR(250) NOT NULL,
	`assignment2`		VARCHAR(250) NOT NULL,
	`dates2`			VARCHAR(250) NOT NULL,
	`organization3`		VARCHAR(250) NOT NULL,
	`assignment3`		VARCHAR(250) NOT NULL,
	`dates3`			VARCHAR(250) NOT NULL,
	
	`newsletter`		TINYINT(1) NOT NULL,
	`search`			TINYINT(1) NOT NULL,
	
	`user_id`		INT(11) NOT NULL,
	
	PRIMARY KEY(`gives_volunteer_id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__gives_organizations` (
	`gives_organization_id` SERIAL,
	
	# organization info
	`title` 		VARCHAR(250) NOT NULL,
	`address`		VARCHAR(250) NOT NULL,
	`city`			VARCHAR(250) NOT NULL,
	`province`		VARCHAR(250) NOT NULL,
	`postal`		VARCHAR(250) NOT NULL,
	`phone`			VARCHAR(250) NOT NULL,
	`fax`			VARCHAR(250) NOT NULL,
	`email`			VARCHAR(250) NOT NULL,
	`website`		VARCHAR(250) NOT NULL,
	`director`		VARCHAR(250) NOT NULL,
	`contact`		VARCHAR(250) NOT NULL,
	`contact_email`	VARCHAR(250) NOT NULL,
	`contact_title`	VARCHAR(250) NOT NULL,
	
	# organization info
	`created` 	VARCHAR(250) NOT NULL,
	`type` 		TINYINT(1) NOT NULL,
	`mission`	TEXT NOT NULL,
	`description` TEXT NOT NULL,
	`logo`		VARCHAR(250) NOT NULL,
	
	# search 
	`interests`		TEXT NOT NULL,
	`skills`		TEXT NOT NULL,
	`locations`		TEXT NOT NULL,
	
	# misc
	`newsletter`		TINYINT(1) NOT NULL,
  	`enabled` tinyint(1) NOT NULL default '0',
	
	`user_id`			INT(11) NOT NULL
		
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `#__gives_opportunities` (
	`gives_opportunity_id` SERIAL,
	
	# opportunity info
	`title`		VARCHAR(250) NOT NULL,
	`start_date`DATE NOT NULL,
	`end_date`	DATE NOT NULL,
	`address`	VARCHAR(250) NOT NULL,
	`city`		VARCHAR(250) NOT NULL,
	`province`	VARCHAR(250) NOT NULL,
	`postal`	VARCHAR(250) NOT NULL,
	`description`	TEXT NOT NULL,
	
	# location
	`lat`		VARCHAR(10) NOT NULL,
	`lng`		VARCHAR(10) NOT NULL,
	
	# search 
	`interests`		TEXT NOT NULL,
	`skills`		TEXT NOT NULL,
	`locations`		TEXT NOT NULL,
	
	# position requirements
	`event`				TINYINT(1) NOT NULL,
	`event_date`		DATE NOT NULL,
	`min_hours`			INT NOT NULL,
	`max_hours`			INT NOT NULL,
	`license`			TINYINT(1) NOT NULL,
	`police_check`		TINYINT(1) NOT NULL,
	`min_age`			TINYINT(1) NOT NULL,
	`other`				VARCHAR(250) NOT NULL,
	
	`enabled` tinyint(1) NOT NULL default '0',

	`gives_organization_id` BIGINT(20) NOT NULL
) ENGINE = InnoDB;