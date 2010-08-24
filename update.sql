ALTER TABLE `md5_decryptor`  ENGINE = InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `md5_decryptor` DROP PRIMARY KEY , ADD PRIMARY KEY ( `ID` );
ALTER TABLE `md5_decryptor` CHANGE `characters` `string` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , CHANGE `md5` `hash` CHAR( 32 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ADD UNIQUE `UNIQUE` ( `ID` , `string` , `hash` );