# JamithM Dev

Sitio web personal y portfolio de **Jamith Mercado**, desarrollado con WordPress y desplegado mediante Docker con un proxy reverso Caddy.

**Dominios:**
- Producción: [jamithm.online](https://jamithmdev.com)
- Desarrollo: [jamithmdev.com](https://jamithmdev.test)

---

## Stack Tecnológico

| Componente | Tecnología |
|---|---|
| CMS | WordPress (latest) |
| Base de datos | MariaDB 11.4 |
| Tema | Custom (basado en Underscores `_s`) |
| Campos personalizados | Secure Custom Fields (ACF fork) |
| Contenedor | Docker Compose |
| Proxy reverso | Caddy (red externa `caddy_net`) |
| Locale | Español (Colombia) `es_CO` |

## Estructura del Proyecto

```
jamithmdev/
├── docker-compose.yml          # Stack Docker (MariaDB + WordPress + phpMyAdmin)
├── .env / .env.example         # Variables de entorno (credenciales DB)
├── wp-config.php               # Configuración WP (lee de .env)
├── backup.sql                  # Backup de base de datos
└── wp-content/
    ├── plugins/                # Plugins (gitignored)
    │   ├── secure-custom-fields/
    │   ├── wck-custom-fields/
    │   └── gotmls/
    └── themes/
        └── jamithm/            # Tema custom
            ├── functions.php   # Funciones + API AJAX + seguridad
            ├── services-app.php# Endpoints API para app externa
            ├── assets/         # CSS, JS, imágenes, SCSS
            ├── inc/            # Includes del tema
            ├── template-parts/ # Partes reutilizables
            └── package.json    # Dependencias Node.js
```

## Custom Post Types

- **portafolios** — Con taxonomías `categoria-portafolio` y `tecnologia-portafolio`
- **product** — Integrado con WooCommerce

## Instalación y Desarrollo

### Requisitos

- [Docker](https://www.docker.com/) y Docker Compose
- [Node.js](https://nodejs.org/) (para compilar assets del tema)
- [Composer](https://getcomposer.org/) (para herramientas de desarrollo PHP)

### Iniciar el entorno

```bash
# Copiar variables de entorno
cp .env.example .env

# Levantar servicios
docker-compose up -d
```

Esto levanta:
- **WordPress** en el puerto 8080
- **phpMyAdmin** en el puerto 8081
- **MariaDB** en el puerto 3306

### Desarrollo del tema

```bash
cd wp-content/themes/jamithm

# Instalar dependencias
npm install

# Observar y compilar SCSS en tiempo real
npm run watch

# Compilar CSS manualmente
npm run compile:css

# Generar hoja RTL
npm run compile:rtl

# Linting
npm run lint:scss
npm run lint:js

# Empaquetar tema en .zip
npm run bundle
```

### Herramientas PHP (Composer)

```bash
cd wp-content/themes/jamithm

composer lint:php       # Verificar sintaxis PHP
composer lint:wpcs      # Verificar estándares WordPress
composer make-pot       # Generar archivo de traducción .pot
```

## Seguridad

El sitio implementa las siguientes medidas de seguridad en `functions.php`:

- **reCAPTCHA v2** en formulario de contacto
- **Rate limiting** por IP (contacto: 3 envíos/10min, login: 5 intentos/15min)
- **XML-RPC** desactivado
- **Comentarios** desactivados en todo el sitio
- **Edición de archivos** desactivada desde el admin
- **Cabeceras de seguridad** (X-Frame-Options, X-XSS-Protection, etc.)
- **Ocultación de versión** de WordPress
- **Redirección de feeds** de comentarios y páginas de autor (anti enumeración)

## API Custom (Headless)

El tema funciona en modo headless, redirigiendo el frontend a `jamithmdev.com` (excepto admin, AJAX y WP REST API). Expone una API vía AJAX con el parámetro `?objAjax=functionName`:

- `getBlogs()` — Lista de publicaciones
- `getPortafolios()` — Portfolio de proyectos
- `getServicios()` — Servicios ofrecidos
- `getProductos()` — Productos de la tienda
- `getCategories()` / `getPortfolioCategories()` — Taxonomías

## Variables de Entorno

Copiar `.env.example` a `.env` y configurar:

```env
DB_NAME=wordpress
DB_USER=wp_user
DB_PASSWORD=your_password
DB_ROOT=root_password
```

## Git

```bash
# Solo 1 commit inicial
git log --oneline
# e14d297 first commit
```

El `.gitignore` excluye: `.env`, `wp-config.php`, `plugins/`, `uploads/`, `vendor/`, `node_modules/` y backups SQL.

## Licencia

Licencia estándar de WordPress ([GPL v2](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)).
