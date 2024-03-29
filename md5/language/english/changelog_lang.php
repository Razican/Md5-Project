<?php

$lang['changelog.version']		= "Version";
$lang['changelog.description']	= "Description";
$lang['changelog.desc_long']	= "The change log shows the changes that have been made to the last versions of Md5 Project";

$lang['changelog.table']		= array(
	"<div style=\"color: lime;\">1.3</div>" => "<div class=\"changelog-date\">04/04/2011</div>

	- [FIX] There were some bugs in the texts of the installer.
	- [FIX] Fixed some bugs in the decryptor and the encryptor.
	- Deleted some functions in functions.php for saving space.
	- Credits encrypted.
	- [FIX] All images had been correctly translated.
	- [FIX] Deleted unnecesary images.
	",
	"1.2" => "<div class=\"changelog-date\">01/30/2011</div>

	- Deleted residual files which were part of the downloads page.
	- Deleted some lines in the function parsetemplate() in functions.php thanks to the implementation of UTF-8.
	- [FIX] Improved the inline comments.
	- [FIX] Fixed some language errors.
	- [FIX] Fixed undeclared variables.
	- [FIX] UTF-8 implemented.
	",
	"1.1" => "<div class=\"changelog-date\">04/04/2010</div>

	- [FIX] There where some minor translation bugs.
	- [FIX] There was a bug in the installer.
	- Finished with the translation.
	- [FIX] Removed all traces of the update creation system and download page.
	- Improoved installer.
	- Formatted the code.
	- All the files have been commented.
	- [FIX] There was a security problem in some files.
	",
	"1.0" => "<div class=\"changelog-date\">27/09/2009</div>

	- Created a random strin generator.
	- Project name changed. The new name is \"Md5 Project\".
	- [FIX] Finished with the double-hash-bug of the decryptor.
	- Update creation sistem added.
	- [FIX] Fixed a problem wich caused the decryptor not to show the decryption results.
	- The program has been optimized at maximum. The program structure has been completely changed.
	- A favicon has been added.
	- Data update system added.
	- Installer finished.
	- Xtreme security implemented.
	- Templates reorganized.
	- Function ShowMenu added. This makes the templates have fewer lines.
	- [FIX] Installer fixed.
	- Program 100% rebuilt, fewer archives, faster and more stable. Now you can change the file extensions from the installation menu.
	- [FIX] The installer didn't include language archives.
	- [FIX] Fixed little bugs wich had been produced with the implementation of the previous fixes.
	- [FIX] The decryptor distinguishes Md5 hashes correctly.
	- [FIX] The decryptor has been fixed definetly.
	- Added copyright on footer.
	- Archives optimized.
	- Languaje sistem improved.
	",
	"RC 1" => "<div class=\"changelog-date\">14/07/2009</div>

	- Images had been optimized.
	- Skin finished.
	- New Language sistem.
	- Restructured the archive md5.php and totaly optimized.
	- [FIX] I created a big bug when I fixed the last problem. (Thanks to lechiguero)
	- [FIX] If the fields were left blank in the encryptor or decryptor you were sent to index.
	- [FIX] The redirection of md5.php didn't respect language configuration.
	- Now the decryptor tells you that the string you have submited is not a valid Md5 hash when it hasn't 32 characters.
	- The contact page now has a completely manipulable script.
	- Logo created.
	- [FIX] The decryptor had a bug.
	- [FIX] Language sistem had a big bug.
	- Index page now has a good skin.
	",
	"Beta 2" => "<div class=\"changelog-date\">02/07/2009</div>

	- [FIX] The menu didn't work correctly.
	- [FIX] The decryptor didn't work.
	- Footer Added. There you can see the number of the values in the database.
	- [FIX] The encryptor had a SQL error.
	- [FIX] When a value wasn't in the database the decryptor didn't put the result.
	- [FIX] The encryptor didn't store any values if the md5 hash was the same of someone in the database.
	- Decryptor running.
	- [FIX] The encryptor wasn't case sensitive.
	- [FIX] The encryptor stored repeated values.
	",
	"Beta 1" => "<div class=\"changelog-date\">26/06/2009</div>

	- [FIX] The menu wasn't showing links.
	- Program translated 100% to spanish, english and basque.
	- Now, when you change the language, you aren't redirected to the index page.
	- Language changes working at 100%.
	- Language options enabled.
	- Index page created.
	- Menu finished.
	- Contact page and Changelog created.
	- Basic templates created.
	- We have started with the decryptor but we haven't finished yet.
	- The encryptor now saves Md5 hashes in a database.
	- Encryptor Created.
	- The project has started. We'll try to create a Md5 encryptor / decryptor.
	",
);


/* End of file changelog_lang.php */
/* Location: ./application/language/english/changelog_lang.php */