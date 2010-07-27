<?php
 
$lang['changelog.title']		= "Lista de cambios";
$lang['changelog.version']		= "Versi�n";
$lang['changelog.description']	= "Descripci�n";

$lang['changelog.table']		= array(
	"<font color='lime'>1.1</font>" => " 04/04/2010

	- [FIX] Hab�a algunos errores en la traducci�n.
	- [FIX] Hab�a un fallo en el instalador.
	- Acabada la traducci�n.
	- [FIX] Quedaban restos del sistema de creaci�n de actualizaciones y de la p�gina de descargas.
	- Mejorado el instalador.
	- Formateado el c�digo.
	- Comentados todos los archivos.
	- [FIX] Hab�a una falla de seguridad en algunos archivos.
	",
	"1.0" => " 27/09/2009

	- Creado un generador autom�tico de cadenas de caracteres.
	- Cambiado el nombre del proyecto. Pasa a llamarse \"Proyecto Md5\".
	- [FIX] Acabado para siempre con el bug de los dobles hashes del desencriptador.
	- Creado un sistema de creaci�n de actualizaciones.
	- [FIX] Arreglado un problema que no dejaba ver bien los resultados del desencriptador.
	- Programa optimizado al m�ximo. Se ha cambiado por completo la estructura del programa.
	- A�adido un favicon.
	- A�adido un sistema de actualizaci�n de datos.
	- Acabado el instalador.
	- Implementada la seguridad extrema.
	- Reordenados todos los templates.
	- A�adida la funci�n ShowMenu que hace que se les resten l�neas a todos los templates.
	- [FIX] Arreglado el instalador.
	- Reconstruido el programa al 100%, menos archivos,m�s r�pido y m�s estable. Con esto se ha incluido la posibilidad de definir las extensiones de los archivos desde la instalaci�n.
	- [FIX] El instalador no inclu�a los archivos de lenguaje.
	- [FIX] Arreglados minibugs varios que hab�an sido provocados al hacer nuevas implementaciones.
	- [FIX] El desencriptador distingue hashes de Md5 correctamente.
	- [FIX] Arreglado definitivamente el desencriptador.
	- A�adido copyright en el footer.
	- Optimizado un poco los archivos.
	- Mejorado el sistema de lenguaje.
	",
	"RC 1" => " 14/07/2009

	- Optimizadas todas las im�genes.
	- Skin acabado.
	- Nuevo sistema de lenguaje.
	- Reestructurado todo el archivo md5.php y optimizado mucho.
	- [FIX] Hab�a creado un gigantesco bug al arreglar el problema anterior. (Gracias a lechiguero)
	- [FIX] Si se dejaban los campos en blanco en el encriptador o en el desencriptador te enviaba al index.
	- [FIX] La redirecci�n del md5.php no respetaba la selecci�n de lenguaje.
	- Ahora el desencriptador te avisa de que no has introducido un hash Md5 v�lido si la cadena de caracteres no tiene 32 caracteres.
	- La p�gina de contacto tiene un script f�cilmente manipulale.
	- Creado el logo.
	- [FIX] El desencriptador ten�a un bug.
	- [FIX] El sistema de lenguaje ten�a un error grave.
	- Se ha aplicado un skin a la p�gina de inicio.
	",
	"Beta 2" => " 02/07/2009

	- [FIX] El men� no funcionaba correctamente.
	- [FIX] El desencriptador no funcionaba.
	- A�adido el footer. En el se pueden ver el n�mero de entradas de la base de datos.
	- [FIX] El encriptador tenia un error SQL.
	- [FIX] Cuando un valor no estaba en la base de datos el desencriptador dejaba el resultado en blanco.
	- [FIX] El encriptador no almacenaba valores si el hash de md5 era igual a alguno en la base de datos.
	- Desencriptador funcionando.
	- [FIX] El encriptador no distingu�a entre mayusculas y minusculas al almacenar valores.
	- [FIX] El encriptador almacenaba valores repetidos.
	",
	"Beta 1" => " 26/06/2009 'El comienzo'

	- [FIX] El men� no mostraba los links.
	- Programa traducido al 100% a espa�ol, vasco y ingl�s.
	- Ahora, cuando cambias de idioma, no te env�a a la p�gina de inicio.
	- Cambio de idioma funcionando al 100%.
	- Agregadas las opciones de idioma.
	- Agregada la p�gina de inicio.
	- Creado el men�.
	- P�gina de contacto y changelog creados.
	- Templates creados, muy b�sicos.
	- Se empieza con el desencriptador pero no est� todav�a disponible.
	- El encriptador ahora guarda los hashes de Md5 en una base de datos.
	- Creado el encriptador.
	- Comienza el proyecto para crear un encriptador / desencriptador de Md5.
	"
);
 
/* End of file changelog_lang.php */
/* Location: ./system/application/language/spanish/changelog_lang.php */