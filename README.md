# Sistema Helpdesk

Este sistema de Helpdesk está desarrollado en Laravel y utiliza MySQL como base de datos. Proporciona funcionalidades de inicio de sesión, roles de usuarios, y gestión de tickets.

## Características

-   **Inicio de Sesión**: Los usuarios pueden iniciar sesión con sus credenciales.
-   **Roles de Usuario**: Se utilizó la librería spatie/laravel-permission para gestionar roles de admin y técnico.
-   **Generación de Tickets**: Los usuarios pueden crear tickets para reportar problemas o solicitar asistencia.
-   **Visualización de Tickets**: Los administradores o encargados pueden ver la lista de tickets existentes.
-   **Asignación de Tickets**: Los administradores tienen la capacidad de asignar un ticket a un encargado para su resolución.

## Tecnologías

-   **Laravel**: Framework PHP utilizado para el desarrollo del backend.
-   **MySQL**: Base de datos relacional para el almacenamiento persistente de datos.
-   **spatie/laravel-permission**: Librería para la gestión de roles y permisos en Laravel.
