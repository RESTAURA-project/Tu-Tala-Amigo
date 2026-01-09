# Uso de RESTAURA

Este documento describe el uso general de la plataforma RESTAURA según los distintos roles de usuario.

---

## 🌱 Flujo general de uso

1. La persona usuaria se registra o recibe credenciales
2. Inicia sesión en la plataforma
3. Según su rol, accede a distintas funcionalidades
4. Se cargan árboles y eventos fenológicos
5. Los datos se almacenan y visualizan de forma agregada

---

## 👤 Roles y permisos

### 🔑 Administrador/a

El rol **Administrador/a** está destinado a personas responsables de la coordinación y gestión del proyecto.

Puede:

- Crear, modificar y eliminar usuarios
- Asignar roles
- Visualizar información completa del sistema
- Exportar datos en formatos abiertos, incluyendo:
  - usuarios
  - inicios de sesión
  - árboles cargados
  - eventos fenológicos
- Acceder a estadísticas generales y detalladas
- Supervisar el funcionamiento general de la plataforma

---

### 🌿 Fenología

El rol **Fenología** está pensado para participantes de proyectos de ciencia ciudadana.

Puede:

- Cargar árboles georreferenciados
- Registrar eventos fenológicos
- Visualizar estadísticas generales en la pantalla de inicio

No puede:

- Acceder a datos personales de otros participantes
- Exportar bases de datos
- Modificar usuarios o configuraciones del sistema

---

## 🌳 Carga de árboles

Las personas con rol Fenología o Administrador/a pueden:

- Registrar un nuevo ejemplar
- Asociar ubicación geográfica
- Vincular el árbol a una especie
- (Opcionalmente) adjuntar fotografías

Cada árbol funciona como unidad base para los registros fenológicos.

---
## 📍 Consideraciones geográficas

Actualmente, RESTAURA está configurada para su uso en **Argentina**.

Durante la carga de árboles y eventos:
- las provincias disponibles corresponden exclusivamente a Argentina
- las localidades están asociadas a dichas provincias

Esta configuración no es una limitación técnica, sino una **decisión de diseño alineada con el alcance del proyecto**.

En caso de utilizar RESTAURA en otros países, es posible:
- reemplazar o ampliar las tablas de provincias y localidades
- adaptar la base de datos a nuevos contextos territoriales

---

## 🌼 Registro de eventos fenológicos

Los eventos se cargan asociados a un árbol previamente registrado.

Ejemplos de eventos:
- brotación
- floración
- fructificación
- senescencia

Los eventos siguen criterios estandarizados definidos por el proyecto.

---

## 📊 Visualización y estadísticas

La plataforma permite visualizar:

- Cantidad total de árboles registrados
- Número de eventos fenológicos cargados
- Distribución espacial de los registros

Las personas administradoras acceden a información más detallada para análisis y exportación.

---

## 🔒 Ética y privacidad

RESTAURA fue diseñada siguiendo principios de ciencia abierta y protección de datos:

- consentimiento informado de participantes
- acceso restringido a información sensible
- visualización pública o compartida solo en forma agregada

Este enfoque permite compatibilizar participación ciudadana, trazabilidad científica y cuidado de la privacidad.

---

## 📌 Notas finales

RESTAURA es una plataforma flexible y adaptable a distintos proyectos, especies y contextos de restauración ecológica.

Para detalles técnicos de instalación, ver `INSTALL.md`.
