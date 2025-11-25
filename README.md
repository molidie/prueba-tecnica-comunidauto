# 🚗 **Autix - Sistema Web de Venta de Vehículos**

![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![JSON](https://img.shields.io/badge/Data-JSON-000000?style=for-the-badge&logo=json&logoColor=white)

Una aplicación web moderna desarrollada en **PHP**, enfocada en la
compra y venta de vehículos, con catálogo dinámico, filtros avanzados y
conversión automática de moneda utilizando la cotización del **dólar
blue**.

------------------------------------------------------------------------

## 📌 **Índice**

1.  Descripción General
2.  Características Principales
3.  Tecnologías Utilizadas
4.  Estructura del Proyecto
5.  Instalación
6.  Configuración
7.  Gestión de Datos
8.  Arquitectura de Funcionalidades
9.  Navegación del Sitio
10. Responsive Design
11. Extras Implementados
12. Decisiones Técnicas

------------------------------------------------------------------------

## 📝 **Descripción General**

**Autix** es una plataforma web que permite visualizar, filtrar y
consultar vehículos disponibles para la venta.
Incluye funcionalidades avanzadas como:

-   Conversión automática de moneda (USD ↔ ARS).
-   Cache inteligente de cotización.
-   Filtros dinámicos.
-   Componentes reutilizables.
-   Autenticación básica.
-   Interfaz moderna con **Tailwind CSS**.

------------------------------------------------------------------------

## ✨ **Características Principales**

-   Catálogo completo de vehículos (marca, modelo, precio, año,
    imágenes, etc.).
-   Filtros avanzados por:
    -   Marca
    -   Año
    -   Precio
    -   Kilometraje
    -   Combustible
    -   Estado (0km/usado)
    -   Categoría
-   Conversión automática a ARS usando dólar blue.
-   Vista detallada para cada vehículo.
-   Búsqueda inteligente por marca y modelo.
-   Paginación de resultados.
-   Interfaz responsive y moderna.
-   Formularios validados para contacto.
-   Componentes modulares reutilizables.

### 📊 **Panel Administrativo (MySQL Integration)**
-   **Dashboard en Tiempo Real:** KPIs de ingresos, ventas y stock calculados con SQL (`SUM`, `COUNT`).
-   **Gestión de Ventas:** Listado detallado con relaciones (Clientes, Vehículos, Pagos).
-   **Búsqueda Instantánea:** Filtrado de tablas mediante JavaScript sin recargar la página.

------------------------------------------------------------------------

## 🛠️ **Tecnologías Utilizadas**

-   **Backend:** PHP 7.4+
-   **Frontend:** HTML5, Tailwind CSS, JavaScript
-   **Base de datos:** Híbrida (JSON para Frontend / MySQL para dashboard de gestión)
-   **API externa:** Cotización del dólar vía *Bluelytics*
-   **Iconografía:** Heroicons (SVG)

------------------------------------------------------------------------

## 📁 **Estructura del Proyecto**

    prueba-tecnica-comunidauto/
    ├── index.php                  # Página principal
    ├── login.php / logout.php     # Autenticación básica
    │
    ├── admin/
    │   ├── logica_admin_panel.php # Datos calculados a partir de la BD
    │   └── panel.php              # Dashboard de Gestión (Privado - MySQL)
    │ 
    ├── config/
    │   └── db.php                 # Conexión PDO a MySQL
    │
    ├── pages/
    │   ├── detalle.php            # Vista detallada del vehículo
    │   ├── contacto.php           # Formulario de contacto
    │   └── ayuda.php              # Preguntas frecuentes
    │
    ├── data/
    │   ├── autos.json             # Base de datos de vehículos
    │   └── dolar_cache.json       # Cache de cotización del dólar
    │
    ├── includes/
    │   ├── header.php             # Encabezado
    │   ├── footer.php             # Pie de página
    │   ├── funciones.php          # Funciones de obtención de datos
    │   ├── moneda.php             # Conversión de moneda
    │   └── logica_resultados.php  # Lógica de filtros y búsqueda
    │    
    │
    └── components/
        ├── card_auto.php          # Renderiza la tarjeta individual de cada vehículo.
        ├── sidebar_filtros.php    # Contiene el formulario de filtros
        ├── resultados_autos.php   # Muestra todos los autos encontrados
        ├── paginacion.php         # Genera dinámicamente los controles de navegación
        ├── home_categorias.php    # Renderiza categorias (Sedán, SUV, Pick-up)
        ├── hub_estado.php         # Permite elegir entre vehículos "0km" o "Usados"
        └── como_funciona.php      # Sección informativa con pasos que explica el proceso de compra/venta en la plataforma.

------------------------------------------------------------------------

## 🚀 **Instalación**

### **Opción A --- Servidor PHP Integrado**

1.  Abrir terminal en la carpeta del proyecto

2.  Ejecutar:

        php -S localhost:8000

3.  Abrir en navegador:
    **http://localhost:8000**

------------------------------------------------------------------------

### **Opción B --- XAMPP / WAMP**

1.  Mover el proyecto a `htdocs/` (XAMPP) o `www/` (WAMP)
2.  Iniciar Apache
3.  Ingresar en el navegador:
    **http://localhost/nombre-carpeta/**

------------------------------------------------------------------------

## 🔧 **Configuración**

### Acceso administrativo (demo)

-   **Email:** admin@autix.com
-   **Contraseña:** admin123

### Parámetros editables

-   Teléfono de WhatsApp en `detalle.php` y `contacto.php`
-   Email de contacto en `contacto.php`

------------------------------------------------------------------------

## 🚗 **Gestión de Datos**

Los vehículos se administran desde `data/autos.json` con la siguiente
estructura:

    {
      "id": 1,
      "marca": "Toyota",
      "modelo": "Corolla",
      "precio": 32000,
      "anio": 2023,
      "color": "Blanco",
      "combustible": "Híbrido",
      "kilometraje": 12000,
      "provincia": "Buenos Aires",
      "segmento": "Sedán",
      "puertas": 4,
      "estado": "usado",
      "descripcion": "Descripción del vehículo...",
      "imagen": "URL_de_la_imagen"
    }

------------------------------------------------------------------------

## 🔍 **Arquitectura de Funcionalidades**

### ✔ Sistema de Filtros Avanzados

Incluye filtros por categoría, marca, precio, año, kilometraje,
combustible y estado.

### ✔ Moneda Inteligente

-   Precios en USD
-   Conversión automática a ARS según dólar blue
-   Cache de 1 hora para evitar sobrecarga de API
-   Fallback automático si la API falla

### ✔ Optimizaciones

-   Lazy Loading de imágenes
-   Cache de API
-   Código dividido en componentes reutilizables
-   Paginación optimizada

------------------------------------------------------------------------

## 🌐 **Navegación del Sitio**

-   **index.php** → Catálogo y filtros
-   **detalle.php** → Información del vehículo + relacionados
-   **contacto.php** → Formulario de contacto
-   **ayuda.php** → FAQs

------------------------------------------------------------------------

## 📱 **Responsive Design**
Optimo para: 
- Móviles
- Tablets
- Escritorio

------------------------------------------------------------------------

## 🚀 **Extras Implementados**

-   Estructura ordenada y modular
-   Sistema de autenticación básico
-   Cache inteligente
-   Diseño moderno y limpio con Tailwind CSS

------------------------------------------------------------------------
## 🧠 Decisiones Técnicas

Para el desarrollo de este proyecto se tomaron las siguientes decisiones de arquitectura y diseño:

1.  **Persistencia Ligera:**
    * Se optó por utilizar archivos JSON como fuente de datos para garantizar la **máxima portabilidad** del entregable. Esto permite ejecutar el proyecto en cualquier servidor PHP sin necesidad de importar scripts SQL ni configurar credenciales de base de datos.
    * *Nota:* El acceso a datos está abstraído en funciones (`obtenerAutos`), lo que permitiría migrar a una base de datos relacional (MySQL) modificando únicamente la capa de datos, sin alterar la lógica de negocio ni las vistas.

2.  **Optimización de API**
    * Para obtener la cotización del Dólar Blue, se implementó un sistema de **caché local en archivo** con un tiempo de vida de 1 hora.
    * **Objetivo:** Reducir la latencia de carga, evitar bloqueos por *rate-limiting* de la API externa y garantizar que la web siga funcionando aunque el servicio de cotización esté caído.

3.  **Autenticación:**
    * De implementó un sistema de autenticación con credenciales estáticas para priorizar el desarrollo de las funcionalidades core (filtros y búsqueda).
    * Sin embargo, la seguridad se maneja utilizando **Sesiones PHP Nativas (`$_SESSION`)**, protección de rutas y regeneración de IDs, simulando el flujo real de una aplicación segura.

4.  **Arquitectura Sin Frameworks:**
    * Se decidió utilizar **PHP Nativo** en lugar de un framework (como Laravel) para administrar la manipulación de arrays y la estructuración lógica del código sin depender de "magia" externa.
    
5.  **Componentización y Descomposición de Vistas:**
    * **Reutilización:** Se crearon componentes como `card_auto.php`, `header.php` y `footer.php` para elementos repetitivos, asegurando consistencia visual y facilitando cambios globales.
    * **Descomposición:** Se extrajeron bloques lógicos complejos (como `sidebar_filtros.php` o `paginacion.php`) en archivos independientes, incluso si se utilizan en una sola vista.
    * **Objetivo:** Mantener los controladores principales (`index.php`, `resultados_autos.php`) legibles y enfocados en el flujo de la aplicación, evitando archivos monolíticos difíciles de mantener ("Spaghetti Code").

6.  **Persistencia Híbrida (JSON + MySQL):**
    * Se implementó una arquitectura de doble fuente de datos para demostrar versatilidad técnica:
        * **Frontend (JSON):** Garantiza máxima velocidad de lectura para el usuario final y portabilidad del catálogo público.
        * **Backend Admin (MySQL):** Utiliza una base de datos relacional para manejar la integridad de datos complejos (Ventas, Clientes, Pagos) y generar reportes analíticos precisos mediante consultas SQL avanzadas.
