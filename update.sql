ALTER TABLE `md5_decryptor` CHANGE `ID` `id` INT( 11 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
CHANGE `characters` `string` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
CHANGE `md5` `hash` CHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `md5_decryptor` DROP INDEX `ID`;
ALTER TABLE `md5_decryptor` DROP PRIMARY KEY ,
ADD PRIMARY KEY ( `id` );
ALTER TABLE `md5_decryptor` ADD UNIQUE (
`string` ,
`hash`
);
ALTER DATABASE `md5` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci
ALTER TABLE `md5_decryptor` ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE TABLE IF NOT EXISTS  `ci_sessions` (
session_id varchar(40) DEFAULT '0' NOT NULL,
ip_address varchar(45) DEFAULT '0' NOT NULL,
user_agent varchar(120) NOT NULL,
last_activity int(10) unsigned DEFAULT 0 NOT NULL,
user_data text NOT NULL,
PRIMARY KEY (session_id),
KEY `last_activity_idx` (`last_activity`)
);
