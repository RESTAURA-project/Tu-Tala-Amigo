# Instalación de RESTAURA

Esta guía describe cómo instalar y ejecutar la aplicación web **RESTAURA** en un entorno local o en un servidor.

RESTAURA está pensada para funcionar en infraestructuras simples y no depende de servicios externos.

---

## 🧾 Requisitos del sistema

- Servidor web **Apache**
- **PHP ≥ 7.4**
- **MySQL** o **MariaDB**
- Navegador web moderno

Entorno recomendado: **LAMP (Linux, Apache, MySQL, PHP)**

---

## ⚙️ Pasos de instalación

### 1️⃣ Clonar el repositorio

Clonar el repositorio desde GitHub:

```bash
git clone https://github.com/RESTAURA-project/restaura.git
```
Alternativamente, se puede descargar el repositorio como archivo ZIP y descomprimirlo.


2️⃣ Copiar los archivos al servidor web
Copiar el contenido del repositorio al directorio raíz del servidor Apache, por ejemplo:

```bash
/var/www/html/restaura
```
El directorio final debe ser accesible desde el navegador.

3️⃣ Crear la base de datos
Crear una base de datos MySQL vacía (por ejemplo: restaura_db)

Importar el archivo de estructura de la base de datos:

EstructuraDB.sql

Esto puede hacerse mediante phpMyAdmin o desde la línea de comandos:

```bash

mysql -u usuario -p restaura_db < EstructuraDB.sql

```
> 📌 Nota:
> La estructura de la base de datos incluye tablas de provincias y localidades correspondientes a Argentina.
> Para utilizar la plataforma en otros países, estas tablas deben ser modificadas o ampliadas manualmente.

4️⃣ Configurar la conexión a la base de datos
Editar el archivo:

```bash
db_connect.php
```

y completar los datos de conexión correspondientes:

```bash
$servername = "localhost";
$username = "usuario";
$password = "password";
$dbname = "restaura_db";
```
Guardar los cambios antes de continuar.



5️⃣ Acceder a la aplicación
Abrir un navegador web y acceder a:

```bash
http://localhost/restaura
```

Si la instalación fue correcta, la aplicación debería cargarse normalmente.

## 👤 Roles de usuario y permisos

RESTAURA utiliza un sistema de roles para garantizar un uso adecuado de la plataforma y proteger la información sensible de los participantes.

Actualmente se definen los siguientes roles:

---

### 🔑 Administrador/a

El rol **Administrador/a** tiene acceso completo al sistema y a las funciones de gestión.

Permisos principales:

- Crear, modificar y eliminar usuarios
- Asignar roles a los usuarios
- Acceder a información completa del sistema
- Exportar tablas y registros, incluyendo:
  - usuarios
  - inicios de sesión
  - árboles cargados
  - eventos fenológicos registrados
- Visualizar estadísticas generales y detalladas
- Supervisar el correcto funcionamiento de la plataforma

Este rol está pensado para personas responsables de la coordinación del proyecto, gestión de datos y administración técnica.

---

### 🌿 Fenología

El rol **Fenología** está orientado a personas participantes del proyecto de ciencia ciudadana.

Permisos principales:

- Cargar árboles georreferenciados
- Registrar eventos fenológicos asociados a los ejemplares
- Visualizar estadísticas generales en la pantalla de inicio (por ejemplo, cantidad total de árboles cargados y eventos registrados)

Restricciones:

- No puede acceder a información sensible de otros participantes
- No puede ver ni exportar bases de datos completas
- No puede modificar usuarios ni configuraciones del sistema

Este diseño garantiza la **privacidad de los datos personales**, promoviendo al mismo tiempo la participación activa en la recolección de información fenológica.

---

La separación de roles permite un equilibrio entre **apertura, trazabilidad y protección de la información**, siguiendo buenas prácticas en proyectos de ciencia ciudadana y ciencia abierta.


🔐 Notas de seguridad y despliegue
En entornos productivos se recomienda:

usar HTTPS

proteger correctamente los archivos de configuración

El sistema no envía datos a servicios externos.

Las ubicaciones y datos sensibles deben gestionarse siguiendo criterios éticos y de privacidad.

🧪 Estado de la instalación
Esta guía describe una instalación básica funcional.
Documentación más detallada y guías de uso serán incorporadas en futuras versiones del proyecto.

---
