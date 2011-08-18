<?php

$lang['changelog.version']		= "Versión";
$lang['changelog.description']	= "Descripción";
$lang['changelog.desc_long']	= "La lista de cambios muestra los cambios que ha habido en las últimas versiones de Md5 Project";

$lang['changelog.table']		= array(
	"<div style=\"color: lime;\">1.3</div>" => "<div class=\"changelog-date\">04/04/2011</div>

	- [FIX] Había algunos errores en los textos del instalador.
	- [FIX] Se solucionan varios bugs del desencriptador y encriptador.
	- Se borran diversas funciones en functions.php para ahorrar espacio.
	- Se encriptan los créditos.
	- [FIX] Se traducen correctamente todas las imágenes.
	- [FIX] Se borran imágenes innecesarias.
	",
	"1.2" => "<div class=\"changelog-date\">30/01/2011</div>

	- Borrados archivos residuales de la página de descargas.
	- Se borran líneas en la función parsetemplate() de functions.php gracias a la implantación de UTF-8.
	- [FIX] Se mejoran los comentarios línea a línea de los archivos.
	- [FIX] Se solucionan errores de lenguaje.
	- [FIX] Se soluciona el problema de las variables no declaradas.
	- [FIX] Se implementa el uso de UTF-8.
	",
	"1.1" => "<div class=\"changelog-date\">04/04/2010</div>

	- [FIX] Había algunos errores en la traducción.
	- [FIX] Había un fallo en el instalador.
	- Acabada la traducción.
	- [FIX] Quedaban restos del sistema de creación de actualizaciones y de la página de descargas.
	- Mejorado el instalador.
	- Formateado el código.
	- Comentados todos los archivos.
	- [FIX] Había una falla de seguridad en algunos archivos.
	",
	"1.0" => "<div class=\"changelog-date\">27/09/2009</div>

	- Creado un generador automático de cadenas de caracteres.
	- Cambiado el nombre del proyecto. Pasa a llamarse \"Proyecto Md5\".
	- [FIX] Acabado para siempre con el bug de los dobles hashes del desencriptador.
	- Creado un sistema de creación de actualizaciones.
	- [FIX] Arreglado un problema que no dejaba ver bien los resultados del desencriptador.
	- Programa optimizado al máximo. Se ha cambiado por completo la estructura del programa.
	- Añadido un favicon.
	- Añadido un sistema de actualización de datos.
	- Acabado el instalador.
	- Implementada la seguridad extrema.
	- Reordenados todos los templates.
	- Añadida la función ShowMenu que hace que se les resten líneas a todos los templates.
	- [FIX] Arreglado el instalador.
	- Reconstruido el programa al 100%, menos archivos,más rápido y más estable. Con esto se ha incluido la posibilidad de definir las extensiones de los archivos desde la instalación.
	- [FIX] El instalador no incluía los archivos de lenguaje.
	- [FIX] Arreglados minibugs varios que habían sido provocados al hacer nuevas implementaciones.
	- [FIX] El desencriptador distingue hashes de Md5 correctamente.
	- [FIX] Arreglado definitivamente el desencriptador.
	- Añadido copyright en el footer.
	- Optimizado un poco los archivos.
	- Mejorado el sistema de lenguaje.
	",
	"RC 1" => "<div class=\"changelog-date\">14/07/2009</div>

	- Optimizadas todas las imágenes.
	- Skin acabado.
	- Nuevo sistema de lenguaje.
	- Reestructurado todo el archivo md5.php y optimizado mucho.
	- [FIX] Había creado un gigantesco bug al arreglar el problema anterior. (Gracias a lechiguero)
	- [FIX] Si se dejaban los campos en blanco en el encriptador o en el desencriptador te enviaba al index.
	- [FIX] La redirección del md5.php no respetaba la selección de lenguaje.
	- Ahora el desencriptador te avisa de que no has introducido un hash Md5 válido si la cadena de caracteres no tiene 32 caracteres.
	- La página de contacto tiene un script fácilmente manipulale.
	- Creado el logo.
	- [FIX] El desencriptador tenía un bug.
	- [FIX] El sistema de lenguaje tenía un error grave.
	- Se ha aplicado un skin a la página de inicio.
	",
	"Beta 2" => "<div class=\"changelog-date\">02/07/2009</div>

	- [FIX] El menú no funcionaba correctamente.
	- [FIX] El desencriptador no funcionaba.
	- Añadido el footer. En el se pueden ver el número de entradas de la base de datos.
	- [FIX] El encriptador tenia un error SQL.
	- [FIX] Cuando un valor no estaba en la base de datos el desencriptador dejaba el resultado en blanco.
	- [FIX] El encriptador no almacenaba valores si el hash de md5 era igual a alguno en la base de datos.
	- Desencriptador funcionando.
	- [FIX] El encriptador no distinguía entre mayusculas y minusculas al almacenar valores.
	- [FIX] El encriptador almacenaba valores repetidos.
	",
	"Beta 1" => "<div class=\"changelog-date\">26/06/2009</div>

	- [FIX] El menú no mostraba los links.
	- Programa traducido al 100% a español, vasco y inglés.
	- Ahora, cuando cambias de idioma, no te envía a la página de inicio.
	- Cambio de idioma funcionando al 100%.
	- Agregadas las opciones de idioma.
	- Agregada la página de inicio.
	- Creado el menú.
	- Página de contacto y changelog creados.
	- Templates creados, muy básicos.
	- Se empieza con el desencriptador pero no está todavía disponible.
	- El encriptador ahora guarda los hashes de Md5 en una base de datos.
	- Creado el encriptador.
	- Comienza el proyecto para crear un encriptador / desencriptador de Md5.
	"
);


/* End of file changelog_lang.php */
/* Location: ./application/language/spanish/changelog_lang.php */