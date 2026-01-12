# Modelo de Datos de RESTAURA

Este documento describe el modelo de datos implementado en **RESTAURA**, basado en la estructura real de la base de datos utilizada por la aplicación.

El diseño prioriza simplicidad, replicabilidad y facilidad de instalación, en línea con los objetivos de una infraestructura abierta para ciencia ciudadana.

---

## 🧱 Enfoque general del modelo

- Base de datos relacional (MySQL / MariaDB)
- Tablas simples con identificadores numéricos
- **Sin claves foráneas explícitas**
- Las relaciones entre entidades se gestionan a nivel de aplicación

Esta decisión de diseño permite:
- facilitar la instalación en entornos LAMP
- reducir dependencias técnicas
- adaptar el sistema a distintos proyectos y contextos

---

## 👤 Usuarios (`users`)

Almacena la información de las personas que utilizan la plataforma.

Campos relevantes:
- `id`
- nombre y correo electrónico
- `type` (rol del usuario)
- estado de la cuenta
- fecha de creación

### Campo `type` (rol del usuario)

El campo `type` define el rol del usuario dentro del sistema y puede tomar los siguientes valores:

- `1` → **Administrador/a**
- `2` → **Fenología**

El rol **Fenología** corresponde a las personas participantes del proyecto de ciencia ciudadana, responsables de cargar árboles y registrar eventos fenológicos.

Los permisos asociados a cada rol se controlan desde la lógica de la aplicación.

---

## 🔐 Roles y permisos

RESTAURA implementa un sistema de roles definido directamente en la tabla `users` mediante el campo `type`.

Los roles disponibles son:

- **Administrador/a (`type = 1`)**
  - gestión de usuarios
  - acceso completo a los datos
  - exportación de tablas
  - visualización de estadísticas detalladas

- **Fenología (`type = 2`)**
  - carga de árboles y eventos fenológicos
  - acceso únicamente a estadísticas generales
  - sin acceso a información sensible de otros participantes


---

## ➕ Extensibilidad del sistema de roles

El sistema de roles de RESTAURA fue diseñado para ser **simple y fácilmente extensible**.

Actualmente, los roles se definen mediante el campo `type` de la tabla `users`, utilizando valores numéricos.  
La incorporación de nuevos roles no requiere modificar la estructura de la base de datos.

Para agregar un nuevo rol es suficiente con:

1. Definir un nuevo valor numérico para el campo `type`
2. Agregar la opción correspondiente en el formulario de alta de usuarios ("nuevo_usuario.php")
3. Implementar la lógica de permisos asociada en la aplicación

Por ejemplo, en otros proyectos derivados de RESTAURA se ha incorporado un rol adicional:

- **Germinación**: orientado a experimentos colaborativos de seguimiento de procesos de germinación

Este enfoque permite adaptar la plataforma a distintos tipos de proyectos (fenología, germinación, monitoreo, etc.) manteniendo una base de datos simple y estable.

---

## 🔐 Sesiones de usuario (`sesiones`)

La tabla `sesiones` registra cada inicio de sesión realizado por los usuarios de la plataforma.

Campos relevantes:
- identificador de la sesión
- usuario asociado (relación lógica con `users`)
- fecha y hora de inicio de sesión

---

### Uso de la información de sesiones

Esta información se utiliza con fines de:
- seguimiento de participación
- evaluación del uso de la plataforma
- identificación de usuarios inactivos

El objetivo principal es apoyar estrategias de **difusión y reactivación de la participación**, por ejemplo, identificar personas que nunca iniciaron sesión o que no lo hacen desde hace períodos prolongados.

---

## 🌳 Estructura por especie

En la implementación actual de RESTAURA, los datos se organizan **por especie**, utilizando tablas específicas para cada una.

Por ejemplo, para el seguimiento fenológico de *Celtis spp.* (tala), se utilizan las tablas:

- `fenologia_tala`: información de los ejemplares (árboles)
- `eventos_tala`: registros de eventos fenológicos asociados

Ambas tablas comparten una estructura común, pero se mantienen separadas por especie.

---
## 🌳 Árboles (`fenologia_tala`)

La tabla `fenologia_tala` almacena la información de los ejemplares monitoreados de *Celtis spp.* (tala).

Campos relevantes:
- identificador del árbol
- **nombre del árbol**
- provincia
- localidad
- tipo de vivero (si corresponde)
- usuario que registró el ejemplar
- fecha de carga

### Campo `Nombre_individuo`

El campo `Nombre_individuo` cumple un rol central dentro del proyecto.

Durante la implementación inicial, la estrategia de comunicación y participación se basó en el mensaje  
**“Hacete amigo de un tala”**, que invitaba a cada participante a:

- elegir un ejemplar
- asignarle un nombre
- registrarlo en la plataforma
- y realizar su seguimiento fenológico a lo largo del tiempo

Este enfoque favoreció la apropiación del proyecto por parte de las personas participantes y fortaleció el vínculo con los árboles monitoreados.

Cada usuario puede registrar **uno o varios árboles**, y cada uno de ellos puede tener un nombre propio.

Cada registro representa un árbol individual y funciona como unidad base para los eventos fenológicos asociados.

---

## ➕ Incorporación de nuevas especies

Para incorporar una nueva especie al sistema, se propone:

- crear nuevas tablas con la **misma estructura**, utilizando un nombre específico por especie  
  - por ejemplo:  
    - `fenologia_espinillo`  
    - `eventos_espinillo`
- adaptar los formularios y consultas PHP correspondientes

Este enfoque permite que cada proyecto adopte RESTAURA de forma independiente para una especie particular, sin necesidad de administrar múltiples especies dentro de una misma instancia.

---

## 🧠 Decisión de diseño y alternativas

Una alternativa posible habría sido utilizar:
- una única tabla de árboles
- una única tabla de eventos
- una tabla adicional de especies
- y un campo que indique la especie en cada registro

Sin embargo, el diseño actual responde a decisiones tomadas durante el desarrollo inicial del proyecto y prioriza:

- simplicidad de implementación
- claridad en la gestión de datos
- menor carga administrativa
- facilidad para que distintos equipos adopten la plataforma para una especie específica

---

## 🔭 Escalabilidad futura

El modelo de datos puede ser reestructurado en el futuro para soportar múltiples especies dentro de una misma instancia de RESTAURA.

No obstante, el enfoque actual asume que:
- cada proyecto utilizará la plataforma para una especie determinada
- la administración de múltiples especies en una sola instalación no es un objetivo inmediato

Esta decisión reduce la complejidad operativa y favorece la adopción del software por distintos equipos y proyectos.


---

## 🌸 Eventos fenológicos (`eventos_tala`)

La tabla `eventos_tala` almacena los registros de eventos fenológicos asociados a los ejemplares de *Celtis spp.* (tala).

Campos relevantes:
- identificador del evento
- árbol asociado (relación lógica con `fenologia_tala`)
- tipo de evento fenológico
- fecha de observación
- usuario que realizó el registro
- observaciones opcionales

Un mismo árbol puede tener múltiples eventos fenológicos registrados a lo largo del tiempo.


---

## 📋 Tipos de eventos (`eventos`)

Tabla de referencia que define los eventos fenológicos posibles, por ejemplo:
- hojas brotando
- hojas desplegadas
- presencia de pimpollos

Esta tabla permite estandarizar las observaciones.

---

## 📍 Entidades geográficas

### 🗺 Provincias (`provincias`)
### 🏘 Localidades (`localidades`)

La base de datos incluye un catálogo cerrado de provincias y localidades correspondientes exclusivamente a **Argentina**.

Las localidades se asocian lógicamente a una provincia mediante identificadores, sin restricciones de clave foránea.

Esta configuración responde al alcance territorial del proyecto.

---

## 🌱 Viveros (`viveros`)
## 🏡 Tipo de vivero (`tipo_vivero`)

RESTAURA contempla información asociada a viveros como parte del **perfil de algunos usuarios**.

Esta funcionalidad fue incorporada considerando que una proporción de las personas participantes del proyecto son **viveristas** o están vinculadas a la producción de plantines para restauración.

---

## 🌱 Viveros y perfiles productivos

RESTAURA contempla información asociada a viveros como parte del perfil de algunos usuarios.

Esta información es **opcional** y está pensada para caracterizar a personas y organizaciones vinculadas a la producción de plantines, restauración ecológica y educación ambiental.

---

### 🏡 Tipo de vivero (`tipo_vivero`)

La tabla `tipo_vivero` define el **tipo de vivero** y se utiliza como tabla de referencia para un menú desplegable en el formulario de alta de usuarios.

Ejemplos de categorías incluidas:
- Comercial
- Áreas protegidas
- Gubernamental / Municipal
- ONG
- Investigación / Divulgación
- Escuelas / Institutos
- Paisajista

Para agregar nuevos tipos de vivero:
- basta con incorporar nuevos registros en la tabla `tipo_vivero`
- no es necesario modificar la estructura de la base de datos

---

### 🎯 Objetivos del vivero (`objetivos_vivero`)

La tabla `objetivos_vivero` define los **objetivos principales del vivero** y también se presenta como un menú desplegable en el alta de usuarios.

Ejemplos de categorías:
- Educativo
- Conservación
- Restauración
- Comercial
- Otros

Al igual que con `tipo_vivero`, los objetivos pueden ampliarse simplemente agregando registros a la tabla correspondiente.

---

### 🌿 Uso opcional y extensibilidad

La información sobre tipo y objetivos de vivero es completamente opcional:

- los usuarios que no gestionan viveros pueden omitirla
- los proyectos que no requieran esta información pueden deshabilitarla o modificarla directamente en el código PHP

Este enfoque permite adaptar RESTAURA a distintos contextos sin comprometer la simplicidad del modelo de datos.


---

## 🔗 Relaciones lógicas (no forzadas)

Aunque no existen claves foráneas en la base de datos, el modelo contempla las siguientes relaciones a nivel conceptual:

- usuarios ↔ árboles
- árboles ↔ registros fenológicos
- registros ↔ tipos de evento
- árboles ↔ provincias y localidades

La integridad de estas relaciones se asegura mediante la lógica de la aplicación.

---

## 📋 Resumen de tablas de la base de datos

A continuación se presenta un resumen de todas las tablas que componen la base de datos, con sus nombres y usos principales.

| Tabla | Descripción | Uso en la aplicación |
|------|-------------|----------------------|
| `users` | Usuarios del sistema | Incluye el campo `type` que define el rol (`1 = administrador`, `2 = fenología`) |
| `fenologia_tala` | Ejemplares de *Celtis spp.* registrados | Cada árbol tiene nombre propio; se carga desde el formulario de alta de árboles |
| `eventos_tala` | Eventos fenológicos asociados a los ejemplares | Relación lógica con `fenologia_tala` |
| `eventos` | Catálogo de eventos fenológicos | Se utiliza para estandarizar los eventos registrados |
| `provincias` | Provincias de Argentina | Catálogo cerrado utilizado en formularios |
| `localidades` | Localidades de Argentina | Asociadas lógicamente a provincias |
| `especies` | Especies dentro del género *Celtis* | Tabla de referencia utilizada en el alta de árboles |
| `tipo` | Tipo de individuo | Define si el ejemplar es árbol o arbusto |
| `espinas` | Tipo de espina | Tabla de referencia utilizada en el alta de árboles |
| `viveros` | Información de viveros asociados a usuarios | Parte del perfil de algunos usuarios |
| `tipo_vivero` | Tipo de vivero | Menú desplegable en el alta de usuarios |
| `objetivos_vivero` | Objetivos del vivero | Menú desplegable en el alta de usuarios |
| `origen` | Origen del árbol | Define si el árbol es cultivado, natural o se desconoce origen |
| `sesiones` | Registro de inicios de sesión de usuarios | Usada para seguimiento de participación y campañas de difusión |

---


## 🔒 Ética, privacidad y datos

El modelo de datos fue diseñado considerando:
- protección de la información personal
- acceso diferenciado según roles
- visualización agregada de la información

Este enfoque es coherente con proyectos de ciencia ciudadana y restauración ecológica.
La información de sesiones se utiliza exclusivamente con fines de análisis de participación y no se comparte de manera individualizada.

---

Este modelo de datos refleja la estructura actual de la base utilizada en RESTAURA y fue diseñado para apoyar proyectos de ciencia ciudadana en el contexto de la restauración ecológica en Argentina, priorizando simplicidad, transparencia y facilidad de adaptación.  
Su estructura permite que otros equipos adopten, modifiquen y extiendan la plataforma según sus propias especies, objetivos y contextos de trabajo.


---

## 📌 Nota final

El modelo de datos de RESTAURA puede ser adaptado a otros países o proyectos mediante la modificación de las tablas geográficas y de referencia, sin necesidad de reestructurar completamente la base de datos.


