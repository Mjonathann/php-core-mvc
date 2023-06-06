# php_core_mvc
Ejemplo simple de patrón mvc / Simple mvc pattern example

El proyecto utiliza un controlador frontal(es decir todas las peticiones las maneja index.php en el directorio /public) empleando modRewrite de Apache.

Para que funcione correctamente se debe crear un Host Virtual que apunte a la carpeta public dentro del proyecto.

- Los controladores deben seguir la convencion UpperCamelCase - seguido de la palabra 'Controller' Eje. 'HomeController' y deben extender a core\Controller 
- Las vistas deben colocarse en carpeta con el mismo nombre del controlador utilizando lowerCamelCase Eje. para 'HomeController' sera: 'home'

- core\Controller contiene los metodos para renderizar las vistas
  - renderView recibe el nombre de la vista y la envia incluyendo el menu(nav) y el footer
  - renderPartial recibe el nombre de la vista y la envia solo su contenido, sin el menu y footer
  - sendJeson recibe un objeto o array y lo envia en formato Json
