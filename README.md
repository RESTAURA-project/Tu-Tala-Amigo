<p align="center">
  <img src="assets/Banner-github2.png">
</p>

# RESTAURA  

[![DOI](https://zenodo.org/badge/DOI/10.5281/zenodo.18200027.svg)](https://doi.org/10.5281/zenodo.18200027)
<p align="center">
  <strong>Restaura: plataforma web abierta para el seguimiento fenológico participativo de árboles nativos de Argentina</strong><br>
  <em>Open web platform for participatory phenological monitoring of native trees in Argentina</em>
</p>

---

## 🌱 ¿Qué es Restaura?

**Restaura** es una aplicación web de código abierto diseñada para recolectar, organizar y visualizar datos fenológicos de especies nativas mediante proyectos de ciencia ciudadana.  
Su objetivo es facilitar la generación de información clave para la restauración ecológica, integrando la participación social con infraestructuras digitales abiertas y reproducibles.

La plataforma permite que personas sin formación técnica registren observaciones fenológicas de árboles nativos (brotación, floración, fructificación y senescencia), generando datos útiles para la provisión de semillas, el monitoreo ecológico y la toma de decisiones en restauración.

---

## 🌎 Motivación

La restauración de bosques nativos enfrenta múltiples desafíos, entre ellos la falta de información sobre **cuándo y dónde recolectar semillas**.  
La fenología vegetal es clave para resolver este problema, pero requiere observaciones simultáneas en amplias áreas geográficas.

Restaura surge como respuesta a esta necesidad, combinando:
- ciencia ciudadana,
- software libre,
- soberanía de datos,
- y accesibilidad tecnológica.

---

## 🔍 ¿Qué permite hacer Restaura?

- Registro de usuarios y gestión de roles  
- Carga de ejemplares georreferenciados  
- Registro de eventos fenológicos estandarizados  
- Asociación opcional de fotografías  
- Visualización de datos mediante mapas y gráficos interactivos  
- Exportación de datos en formatos abiertos (CSV, Excel)  

La plataforma está pensada para ser **adaptable a distintas especies y proyectos**, modificando formularios, variables y protocolos.

---

## 🌳 Caso de uso: *Tu Tala Amigo*

La primera implementación de Restaura fue **Tu Tala Amigo**, un proyecto de ciencia ciudadana enfocado en el seguimiento fenológico de *Celtis spp.* (tala), una especie nativa de Argentina presente en bosques en peligro.

Entre 2023 y 2024:
- participaron 233 personas,
- se registraron 140 ejemplares,
- se recolectaron observaciones con cobertura en 8 provincias argentinas.

Este caso permitió validar la usabilidad, estabilidad y potencial de la plataforma como infraestructura abierta.

---

## 🧱 Arquitectura del sistema

Restaura utiliza una arquitectura clásica de tres capas:

- **Frontend:** HTML, CSS, JavaScript, Bootstrap, jQuery  
- **Backend:** PHP  
- **Base de datos:** MySQL  

El sistema está diseñado para entornos **LAMP (Linux, Apache, MySQL, PHP)** y no depende de servicios externos.
La arquitectura fue diseñada priorizando simplicidad, reproducibilidad y bajo costo de mantenimiento.

---

## ⚙️ Instalación

1. Clonar el repositorio
2. Copiar los archivos al directorio raíz de Apache
3. Importar la base de datos desde `EstructuraDB.sql`
4. Configurar la conexión en `db_connect.php`

Una vez completados estos pasos, la aplicación queda operativa.

*(Un manual de instalación detallado será publicado próximamente.)*

---
## 📍 Alcance geográfico

RESTAURA fue diseñada inicialmente para proyectos desarrollados en **Argentina**.

Por este motivo, la base de datos incluye:
- un catálogo de **provincias argentinas**
- localidades correspondientes al territorio nacional

Esta decisión responde al contexto del proyecto y a las necesidades específicas de los proyectos de restauración de bosques nativos en Argentina.

La arquitectura del sistema permite, no obstante, su adaptación a otros países mediante la modificación o ampliación de las tablas geográficas.

---


## 📊 Datos, ética y privacidad

Siguiendo principios de ciencia abierta:
- se solicita consentimiento informado,
- las ubicaciones y fotografías se comparten de forma agregada o anonimizada,
- los datos completos se resguardan en el servidor del proyecto.

Este enfoque equilibra apertura, trazabilidad y protección de la privacidad de los participantes.

---
## 👤 Roles de usuario

RESTAURA utiliza un sistema de roles para garantizar la participación abierta y proteger la información sensible.

- **Administrador/a**
  - Gestión de usuarios y roles  
  - Acceso completo a los datos  
  - Exportación de tablas (usuarios, inicios de sesión, árboles y eventos)  
  - Visualización de estadísticas detalladas  

- **Fenología**
  - Carga de árboles y eventos fenológicos  
  - Acceso únicamente a estadísticas generales  
  - Sin acceso a datos sensibles de otros participantes  

Este esquema sigue buenas prácticas de **ética, privacidad y ciencia ciudadana**.

## 🚧 Estado del proyecto

Restaura es un proyecto **activo y en evolución**.  
Se prevé:
- ampliar el sistema a nuevas especies nativas,
- fortalecer la comunidad de usuarios,
- mejorar la seguridad y documentación técnica.

---

## 🖥️ Capturas de la plataforma

A continuación se muestran algunas capturas de la interfaz de Restaura durante su uso en el proyecto *Tu Tala Amigo*.

### Registro de árboles
![Registro de árboles](assets/screenshots/registro_arbol.png)

### Carga de eventos fenológicos
![Carga de eventos](assets/screenshots/eventos_fenologicos.png)

### Visualización de datos
![Visualización](assets/screenshots/dashboard.png)

### Uso en dispositivos móviles
![Vista móvil](assets/screenshots/mobile_views.png)

---

## 📖 Cómo citar

### Software

Si utilizás el software **RESTAURA** en un trabajo académico, citá la versión del software:

Figueroa Schibber, E., et al. (2026). RESTAURA: Open web infrastructure for native forest restoration through citizen science (v1.0.2) [Software]. Zenodo. https://doi.org/10.5281/zenodo.18200027

---

### Trabajo académico

Si querés citar el **marco conceptual, el diseño del proyecto o el contexto metodológico**, podés citar el trabajo presentado en congreso:

Figueroa Schibber, E., et al. (2025). *Tu Tala Amigo: plataforma web abierta para el seguimiento fenológico participativo de árboles nativos de Argentina* (Versión v1). 2do Congreso Iberoamericano de Ciencia Abierta (CIbCA2025), Quito, Ecuador. Zenodo. https://doi.org/10.5281/zenodo.17476863


---

## 📄 Licencia

Este proyecto se distribuye bajo licencia **GNU GPL v3.0 o posterior (GPL-3.0-or-later)**.  
Ver archivo `LICENSE` para más detalles.

---

## 👥 Equipo y contacto

Proyecto desarrollado por un equipo interdisciplinario de investigadores/as en ecología, ciencia ciudadana y tecnologías abiertas.

🌐 Sitio web: https://www.restaura.com.ar  
📧 Contacto: eschibber@agro.uba.ar  
🔗 Repositorio: https://github.com/RESTAURA-project

