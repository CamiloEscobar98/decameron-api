# Proyecto Hoteles Decameron - API REST

Este proyecto es una API REST desarrollada en Laravel para gestionar los hoteles de la cadena Decameron en Colombia. El sistema permite el registro de hoteles, incluyendo datos tributarios y la asignación de tipos y configuraciones de habitaciones.

## Requisitos del Proyecto

La API proporciona funcionalidades para:
1. Registrar hoteles con datos básicos (nombre, dirección, ciudad, NIT, número de habitaciones).
2. Asignar tipos de habitaciones (Estándar, Junior y Suite) con restricciones en las acomodaciones:
   - **Estándar**: Sencilla o Doble.
   - **Junior**: Triple o Cuádruple.
   - **Suite**: Sencilla, Doble o Triple.
3. Validar las siguientes condiciones:
   - La cantidad de habitaciones no puede superar el límite por hotel.
   - No se permiten hoteles duplicados.
   - Evitar duplicación en tipos y acomodaciones de habitaciones en un mismo hotel.

## Tecnologías y Requisitos Técnicos

- **Backend**: Laravel (PHP 8.x)
- **Base de Datos**: PostgreSQL
- **Despliegue**: Preparado para entorno en la nube.
- **API**: Totalmente RESTful, pensada para usarse desde un front desacoplado.
- **Navegadores Soportados**: Firefox y Chrome.

## Instalación

1. **Clona el repositorio**:
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   cd nombre_del_proyecto

2. **Instala las dependencias**:
   ```bash
   composer install
3. **Configura el archivo .env**:
   ```bash
   cp .env.example .env
   ```
   **Configura la conexión a la base de datos PostgreSQL en .env**:
   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=nombre_de_tu_bd
   DB_USERNAME=usuario_bd
   DB_PASSWORD=contraseña_bd
   ```
4. **Genera la clave de la aplicación**:
   ```bash
   php artisan key:generate
5. **Realiza las migraciones**:
   ```bash
   php artisan migrate
6. **Carga datos de ejemplo**:
   ```bash
   php artisan db:seed

## Endpoints Principales

### Hoteles:

- `POST /api/hotels`: Registrar un nuevo hotel.
- `GET /api/hotels`: Listar todos los hoteles.
- `GET /api/hotels/{id}`: Ver detalles de un hotel específico.
- `PUT /api/hotels/{id}`: Actualizar información de un hotel.
- `DELETE /api/hotels/{id}`: Eliminar un hotel.

### Habitaciones:

- `POST /api/hotels/{hotel_id}/rooms`: Asignar una habitación a un hotel.
- `GET /api/hotels/{hotel_id}/rooms`: Listar las habitaciones de un hotel.
- `PUT /api/hotels/{hotel_id}/rooms/{id}`: Actualizar una habitación específica.
- `DELETE /api/hotels/{hotel_id}/rooms/{id}`: Eliminar una habitación de un hotel.

## Requisitos y Buenas Prácticas

- **Patrones de diseño**: Siguiendo principios SOLID y patrones de diseño para código modular y mantenible.
- **Documentación**: Incluye diagramas UML y comentarios en el código para facilitar la comprensión.
- **Dump de la Base de Datos**: Proporcionar un archivo `db.sql` listo para restaurar en PostgreSQL.

## Nota para el Despliegue

Asegúrate de seguir los pasos de instalación y configuración de forma cuidadosa para un despliegue correcto. Si surge alguna duda, revisa el código y la documentación, o contacta al desarrollador.

## Licencia

Este proyecto es propiedad de Hoteles Decameron de Colombia. No se permite su uso fuera del contexto de la empresa sin autorización.




