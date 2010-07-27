ALTER TABLE `md5_decryptor` DROP PRIMARY KEY, ADD PRIMARY KEY(`ID`);
ALTER TABLE `md5_decryptor` ADD UNIQUE `UNIQUE` ( `ID` , `hash` ( 32 ) , `string` ( 50 ) );
ALTER TABLE `md5_decryptor` CHANGE `characters` `string` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL;
ALTER TABLE `md5_decryptor` CHANGE `md5` `hash` VARCHAR( 32 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL;
ALTER TABLE `md5_decryptor`  ENGINE =  InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci AUTO_INCREMENT =34;
ALTER TABLE `md5_decryptor` ENGINE =  InnoDB;
FLUSH TABLE `md5_decryptor`;
OPTIMIZE TABLE `md5_decryptor`;

CREATE TABLE `md5_admin` (
`ID` BIGINT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`username` VARCHAR( 20 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL ,
`password` VARCHAR( 32 ) NOT NULL ,
`email` VARCHAR( 40 ) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL ,
`last_ip` VARCHAR( 15 ) NOT NULL ,
UNIQUE (
`username` ,
`email`
);

INSERT INTO `md5_admin` (
`username` ,
`password` ,
`email` ,
`last_ip`
)
VALUES (
'admin', '63a9f0ea7bb98050796b649e85481845', 'admin@razican.com', '0.0.0.0'
);