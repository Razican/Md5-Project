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
ALTER TABLE `md5_decryptor` ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
