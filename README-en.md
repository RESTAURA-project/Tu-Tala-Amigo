<p align="center">
  <img src="assets/Banner-github2.png">
</p>

# RESTAURA  

[![DOI](assets/zenodo.18200027.svg)](https://doi.org/10.5281/zenodo.18200027)

<p align="center">
  <strong>Restaura: open web platform for participatory phenological monitoring of native trees in Argentina</strong><br>
  <em>Open web platform for participatory phenological monitoring of native trees in Argentina</em>
</p>

---

## 🌱 What is Restaura?

**Restaura** is an open-source web application designed to collect, organize, and visualize phenological data of native species through citizen science projects.  
Its main goal is to facilitate the generation of key information for ecological restoration by integrating social participation with open, reproducible digital infrastructures.

The platform allows people without technical training to record phenological observations of native trees (budburst, flowering, fruiting, and senescence), generating data that are useful for seed supply, ecological monitoring, and decision-making in restoration processes.

---

## 🌎 Motivation

Native forest restoration faces multiple challenges, including the lack of information about **when and where to collect seeds**.  
Plant phenology is key to addressing this problem, but it requires simultaneous observations across large geographic areas.

Restaura was developed in response to this need, combining:
- citizen science,
- free and open-source software,
- data sovereignty,
- and technological accessibility.

---

## 🔍 What does Restaura enable?

- User registration and role management  
- Registration of georeferenced tree specimens  
- Recording of standardized phenological events  
- Optional association of photographs  
- Data visualization through interactive maps and charts  
- Export of data in open formats (CSV, Excel)  

The platform is designed to be **adaptable to different species and projects** by modifying forms, variables, and monitoring protocols.

---

## 🌳 Use case: *Tu Tala Amigo*

The first implementation of Restaura was **Tu Tala Amigo**, a citizen science project focused on the phenological monitoring of *Celtis spp.* (tala), a native tree species from Argentina present in threatened forest ecosystems.

Between 2023 and 2024:
- 233 participants were involved,
- 140 individual trees were registered,
- observations were collected across 8 Argentine provinces.

This use case validated the usability, stability, and potential of the platform as an open digital infrastructure.

---

## 🧱 System architecture

RESTAURA follows a classical three-tier web architecture (frontend, backend, and database), prioritizing simplicity, reproducibility, and low maintenance costs.  
The system is designed for **LAMP environments (Linux, Apache, MySQL, PHP)** and does not rely on external services.

📄 A detailed technical description of the architecture and data model is provided in [`DATA_MODEL.md`](DATA_MODEL.md).

---

## ⚙️ Installation

RESTAURA requires a **LAMP (Linux, Apache, MySQL, PHP)** environment.

📄 Complete installation and configuration instructions are available in [`INSTALL.md`](INSTALL.md).

---

## 📍 Geographical scope

RESTAURA was initially designed for projects developed in **Argentina**, and therefore the database includes catalogs of national provinces and localities.

The system architecture allows adaptation to other countries by modifying or extending the geographic tables.

---

## 📊 Data, ethics, and privacy

Following open science principles:
- informed consent is requested from participants,
- locations and photographs are shared in aggregated or anonymized form,
- complete datasets are securely stored on the project server.

This approach balances openness, traceability, and participant privacy.

---

## 👤 User roles

RESTAURA implements a role-based system to ensure open participation while protecting sensitive information.

- **Administrator**
  - User and role management  
  - Full access to data  
  - Export of tables (users, login records, trees, and events)  
  - Access to detailed statistics  

- **Phenology**
  - Registration of trees and phenological events  
  - Access only to general statistics  
  - No access to sensitive data from other participants  

This scheme aims to balance open participation, privacy protection, and best practices in citizen science projects.

---

## 🚧 Project status

Restaura is an **active and evolving** project.  
Planned developments include:
- expansion to additional native species,
- strengthening of the user community,
- improvements in security and technical documentation.

---

## 🖥️ Platform screenshots

Below are screenshots of the Restaura interface during its use in the *Tu Tala Amigo* project.

### Tree registration
![Tree registration](assets/screenshots/registro_arbol.png)

### Phenological event recording
![Phenological events](assets/screenshots/eventos_fenologicos.png)

### Data visualization
![Data visualization](assets/screenshots/dashboard.png)

### Mobile device usage
![Mobile view](assets/screenshots/mobile_views.png)

---

## 📖 How to cite

### Software

If you use the **RESTAURA** software in academic work, please cite the software version as follows:

Figueroa Schibber, E., et al. (2026). *RESTAURA: Open web infrastructure for participatory phenological monitoring of native trees in Argentina* (v1.0.3) [Software]. Zenodo. https://doi.org/10.5281/zenodo.18200027

---

### Academic work

To cite the **conceptual framework, project design, or methodological context**, please refer to the conference paper:

Figueroa Schibber, E., et al. (2025). *Tu Tala Amigo: plataforma web abierta para el seguimiento fenológico participativo de árboles nativos de Argentina* (Version v1). 2nd Ibero-American Conference on Open Science (CIbCA2025), Quito, Ecuador. Zenodo. https://doi.org/10.5281/zenodo.17476863

---

## 📄 License

This project is distributed under the **GNU General Public License v3.0 or later (GPL-3.0-or-later)**.  
See the `LICENSE` file for details.

---

## 👥 Team and contact

Project developed by an interdisciplinary team of researchers in ecology, citizen science, and open technologies.

🌐 Website: https://www.restaura.com.ar  
📧 Contact: eschibber@agro.uba.ar  
🔗 Repository: https://github.com/RESTAURA-project
