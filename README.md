# Sistema de Autenticación con Alertas por Correo en Laravel

Aplicación en Laravel que implementa un sistema de registro y login. Está diseñada para servir como un **sistema base (boilerplate)** que puede ser integrado y reutilizado fácilmente en otros proyectos más grandes.

Su característica principal es la integración de notificaciones por correo electrónico, enviando alertas de seguridad automatizadas cuando un usuario interactúa con el sistema.

## Características Principales
* **Registro seguro:** Validación de datos y encriptación de contraseñas.
* **Control de Acceso:** Inicio y cierre de sesión manejados por el sistema de autenticación nativo de Laravel.
* **Notificaciones por Correo:** * Envío de un correo de bienvenida al registrar una nueva cuenta.
  * Envío de una alerta de seguridad al correo del usuario cada vez que se detecta un inicio de sesión exitoso.
* **Código escalable:** Estructura limpia lista para usarse como punto de partida para aplicaciones más complejas.
