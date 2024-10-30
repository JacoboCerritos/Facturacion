# Sistema de Facturación en PHP y MariaDB

Este proyecto es un sistema de facturación sencillo desarrollado en PHP y MariaDB, que permite gestionar productos, inventarios y facturas. Permite a los usuarios crear facturas a partir de productos y registrar los detalles en la base de datos.

## Tabla de Contenidos

- [Características](#características)
- [Tecnologías Utilizadas](#tecnologías-utilizadas)
- [Instalación](#instalación)
- [Uso](#uso)
- [Estructura de la Base de Datos](#estructura-de-la-base-de-datos)
- [Contribución](#contribución)
- [Licencia](#licencia)

## Características

- CRUD (Crear, Leer, Actualizar, Eliminar) para productos.
- Registro de inventarios.
- Creación y almacenamiento de facturas.
- Cálculo automático del total de la factura basado en la cantidad y precio del producto.
- Interfaz sencilla y fácil de usar.

## Tecnologías Utilizadas

- **PHP**: Lenguaje de programación del lado del servidor.
- **MariaDB**: Sistema de gestión de bases de datos.
- **XAMPP**: Entorno de desarrollo local para ejecutar PHP y MariaDB.
- **HTML/CSS**: Para la estructura y el diseño de la interfaz.

## Instalación

1. **Descarga XAMPP** desde [Apache Friends](https://www.apachefriends.org/index.html) y sigue las instrucciones de instalación.
2. **Clona o descarga este repositorio** a tu máquina local.
3. **Coloca la carpeta del proyecto** en el directorio `htdocs` de XAMPP (usualmente ubicado en `C:\xampp\htdocs`).
4. **Inicia el servidor Apache y MariaDB** desde el panel de control de XAMPP.
5. **Crea la base de datos** utilizando el archivo SQL proporcionado en el proyecto (asegúrate de importar las tablas `productos`, `inventarios` y `facturas`).

## Uso

1. Accede a la aplicación desde tu navegador usando `http://localhost/nombre_del_proyecto/`.
2. Utiliza el menú para navegar entre las diferentes secciones: productos, inventarios y crear facturas.
3. Para crear una factura, selecciona el producto, especifica la cantidad y haz clic en "Crear Factura".
4. Los detalles de la factura se guardarán en la base de datos y se mostrará un mensaje emergente con el total a pagar.

## Estructura de la Base de Datos

Las tablas principales utilizadas en el sistema son:

### Tabla: `productos`

| Campo     | Tipo        | Descripción                |
|-----------|-------------|----------------------------|
| id_producto | INT         | Identificador único del producto |
| nombre    | VARCHAR(100)| Nombre del producto        |
| precio    | DECIMAL(10,2)| Precio del producto       |

### Tabla: `inventarios`

| Campo     | Tipo        | Descripción                |
|-----------|-------------|----------------------------|
| id_inventario | INT     | Identificador único del inventario |
| id_producto | INT       | ID del producto (FK)      |
| cantidad   | INT        | Cantidad disponible        |

### Tabla: `facturas`

| Campo     | Tipo        | Descripción                |
|-----------|-------------|----------------------------|
| id_factura | INT        | Identificador único de la factura |
| fecha      | DATETIME   | Fecha de creación de la factura |

### Tabla: `detalles_factura`

| Campo      | Tipo        | Descripción                |
|------------|-------------|----------------------------|
| id_detalle | INT         | Identificador único del detalle |
| id_factura | INT         | ID de la factura (FK)     |
| id_producto| INT         | ID del producto (FK)      |
| cantidad   | INT         | Cantidad del producto      |
| total      | DECIMAL(10,2)| Total calculado por la cantidad y precio |

## Contribución

Las contribuciones son bienvenidas. Si deseas contribuir, por favor sigue estos pasos:

1. Haz un fork del proyecto.
2. Crea tu rama (`git checkout -b feature/nueva-funcionalidad`).
3. Realiza tus cambios y haz commit (`git commit -m 'Agregué una nueva funcionalidad'`).
4. Envía tu rama (`git push origin feature/nueva-funcionalidad`).
5. Abre un Pull Request.

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Consulta el archivo LICENSE para más información.
