<?php

$lang['changelog.version']		= "Bertsioa";
$lang['changelog.description']	= "Deskribapena";
$lang['changelog.desc_long']	= "Aldaketa zerrendak Md5 Project-ek azken bertsioetan izandako aldaketak erakusten ditu";

$lang['changelog.table']		= array(
	"<div style=\"color: lime;\">1.3</div>" => "<div class=\"changelog-date\">2011/04/04</div>

	- [FIX] Arazo batzuk zeuden instalatzailearen testuetan.
	- [FIX] Enkriptatzaile eta desenkriptatzailean arazo batzuk konponduta.
	- functions.php artxiboko funtzio batzuk ezabatuta, leku gutxiago hartzeko.
	- Kredituak enkriptatuta.
	- [FIX] Irudi guztiak ongi itzulita.
	- [FIX] Beharrezkoak ez ziren irudiak ezabatuta.
	",
	"1.2" => "<div class=\"changelog-date\">2011/01/30</div>

	- Fitxategi-hondakinak ezabatuta; deskarga orria eratzen zutenak.
	- parsetemplate() funtzioan, functions.php artxiboan soberan zeuden lerroak ezabatuta UTF-8 erabiltzeari esker.
	- [FIX] Iruzkinak hobetuta.
	- [FIX] Hizkuntz arazoak konponduta.
	- [FIX] Definitu gabeko aldagaien arazoa konponduta.
	- [FIX] UTF-8-ren erabilera txertatuta.
	",
	"1.1" => "<div class=\"changelog-date\">2010/04/04</div>

	- [FIX] Itzulpenean akats batzuk zeuden.
	- [FIX] Instalatzaileak akats bat zuen.
	- Itzulpena amitua.
	- [FIX] Eguneratze sistema egiteko sistemaren eta deskarga orrialdearen zatiak geratzen ziren.
	- Instalatzailea hobetua.
	- Kodeari formatua emanda.
	- Fitxategi guztiak iruzkinduta.
	- [FIX] Segurtasun arazo bat zegoen fitxategi batzuetan.
	",
	"1.0" => "<div class=\"changelog-date\">2009/09/27</div>

	- Karaktere kate egile automatikoa eginda.
	- Proiektuaren izena aldatua. Orain izena \"Md5 Proiektua\" da.
	- [FIX] Azkenik hash bikien problema amaitua.
	- Eguneratze sistema egiteko sistema eratua.
	- [FIX] Desenkriptatzailearen emaitzak ez ikustea eragiten zuen arazoa konponduta.
	- Programa osoa berrantolatuta.
	- Favicon bat jarrita.
	- Datu baseen eguneratzailea sortua.
	- Instalatzailea amaituta.
	- Segurtasun osoa jarrita.
	- Template guztiak berrantolatutak.
	- ShowMenu funtzioa eginda, honekin template guztietan lerro gutxiago egongo dira.
	- [FIX] Instalatzailea konponduta.
	- Programa %100 berreginda, fitxategi gutxiago eta azkarragoa. Honekin php fixategi bukaerak instalazioan modifikatu ditezke.
	- [FIX] Instalatzaileak ez zituen hizkuntza fitxategiak ondo erabiltzen.
	- [FIX] Arazo txiki batzuk konpondutak.
	- [FIX] Desenkriptazaileak Md5 hashak ondo desberdintzen ditu.
	- [FIX] Desenkriptatzailea azkenez konponduta.
	- Copyright-a oinarrian jarria.
	- fitxategiak hobetuta.
	- Hizkuntza sistema hobetuta.
	",
	"RC 1" => "<div class=\"changelog-date\">2009/07/14</div>

	- Irudi guztiak arinduak.
	- Estilo grafikoa amaitua.
	- Hizkuntza sistema berria.
	- md5.php fitxategia berreginda eta asko arindua.
	- [FIX] Arazo bat eragin nuen lehengo arazoa konpontzean. (Eskerrik asko, lechiguero)
	- [FIX] Enkriptatzailean edo desenkriptatzailean formularioa zuriz uzten bazen hasiera orrialdera bidaltzen zintuen.
	- [FIX] md5.php fitxategiaren erredirekzinoak ez zuen lengoai konfigurazioa errespetatzen.
	- Desenkriptatzaileak 32 karaktere ez dituen karaktere kate bat sartzen baduzu md5 hasha ez dela esaten dizu.
	- Orain, kontaktu orrialdeak script aldakorra du.
	- Logoa amaituta.
	- [FIX] Desencriptatzaileak arazo bat zuen.
	- [FIX] Hizkuntza sistemak arazo larri bat zuen.
	- Hasiera orrialdeak skin bat dauka.
	",
	"Beta 2" => "<div class=\"changelog-date\">2009/07/02</div>

	- [FIX] Menuak ez zuen ondo funtzionatzen.
	- [FIX] Desenkriptatzaileak ez zuen funtzionatzen.
	- Oina erantsita. Bertan datu basean dauden Md5 Hashen kopurua ikus daiteke.
	- [FIX] Enkriptatzaileak SQL arazo bat zuen.
	- [FIX] Balio bat datu basean ez bazegoen desenkriptatzaileak emaitza zuriz uzten zuen.
	- [FIX] Enkriptatzaileak ez zuen baliorik gordetzen hasha datu basean bazegoen.
	- Desenkriptatzailea ondo funtzionatzen du.
	- [FIX] Enkriptatzaileak ez zituen letra larriak eta xeheak bereizten.
	- [FIX] Enkriptazaileak balio errepikatuak gordetzen zituen datu basean.
	",
	"Beta 1" => "<div class=\"changelog-date\">2009/06/26</div>

	- [FIX] Menuak ez zituen linkak erakusten.
	- Programa %100 euskerara, ingelesera eta erderara itzulita.
	- Orain, hizkuntza aldatzen duzunean, web orriak ez zaitu hasiera orrialdera bidaltzen.
	- Hizkuntza aldaketa %100 funtzionatzen.
	- Hizkuntza aukerak erantsita.
	- Hasiera orrialdea erantsita.
	- Menua amaituta.
	- Kontaktu orrialdea eta aldaketa zerrenda egindak.
	- Tenplateak eratuak.
	- Desenkriptatzailea hasita baina ez dago oraindik amaituta.
	- Enkriptatzaileak Md5 hash-ak datu basean gordetzen ditu.
	- Enkriptatzailea amaitua.
	- Proiektua hasita. Proiektu honen helburua Md5 enkriptatzaile / desenkriptatzaile bat egitea da.
	",
);


/* End of file changelog_lang.php */
/* Location: ./application/language/basque/changelog_lang.php */