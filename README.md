# NODAXIS web · proyecto local

Sitio comercial de NODAXIS en Laravel 12. Conserva la identidad del manual de marca y amplía la experiencia de WordPress con interacciones propias. Se desarrolla en el Escritorio y **no cambia el sitio público de WordPress**.

## Arranque con Docker

Requiere Docker Desktop con el motor Linux activo. En esta carpeta:

```powershell
docker compose up --build
```

Abre `http://localhost:8080`. Vite corre en `http://localhost:5173` para recarga durante el desarrollo. En el primer arranque, Compose instala dependencias, genera la clave local si falta y ejecuta migraciones SQLite. Para detener: `Ctrl+C` o `docker compose down`.

El panel comercial está en `http://localhost:8080/admin/login`. No hay credenciales predeterminadas. Crea una cuenta desde otra terminal:

```powershell
docker compose exec app php artisan admin:create
```

El comando pide nombre, correo y contraseña de al menos 12 caracteres. La cuenta solo puede crearse desde la terminal local; no existe registro público.

## Funciones incluidas

- Portada panorámica con video real de cableado, contraste para lectura y dos accesos a la cotización y al explorador. El video se pausa al salir de la vista o al solicitar movimiento reducido.
- Navegación fija con indicador de sección, progreso de lectura y menú móvil que puede cerrarse con Escape.
- Explorador de soluciones con cambio automático, pestañas, teclado, gesto lateral en móvil y pausa cuando el usuario interactúa o sale de la vista.
- Topología de red interactiva: Sede, Wi-Fi, Equipos y Router/firewall resaltan su conexión y llevan a la cotización correspondiente.
- Esquema de red directo: internet → router/firewall → switch → Wi-Fi y equipos. Las pestañas resaltan cada conexión.
- Catálogo con ocho familias, selector horizontal, imágenes conceptuales, filtro, búsqueda y armado de una solicitud.
- Servicios en una fila horizontal, con desplazamiento lateral por tarjetas en móvil.
- Programa de afiliados anunciado al 10%; las condiciones de cálculo y pago se confirman por escrito antes de registrar cada referencia.
- Boletín Pulso de red con consentimiento explícito, almacenamiento de suscripciones y baja. El panel privado permite revisar correos activos y descargarlos en CSV.
- Página pública de términos y aviso de privacidad, con enlaces a las fuentes legales oficiales.
- Catálogo por categorías con filtro, búsqueda, acceso a la escena de cada familia y selección de intereses guardada en el navegador. No se presentan marcas, modelos, precios ni existencias sin confirmar.
- Ficha visual de cada familia con preguntas para dimensionar el proyecto, navegación entre equipos y enlace a cotización con la familia precargada.
- Formulario de cotización guiado en tres pasos con revisión del proyecto, categorías e intereses precargados, validación, protección básica contra spam y persistencia en SQLite. Si JavaScript no carga, todos los campos siguen disponibles y el servidor valida la solicitud.
- Panel comercial privado para consultar solicitudes, filtrar y cambiar su estado.

## Alcance y datos

Esta es una versión local. Las solicitudes y suscripciones se guardan en `database/database.sqlite`; **no se envían correos automáticamente** ni se sincronizan con WordPress. La lista del boletín se puede descargar desde el panel privado. Antes de publicar, configura un proveedor de correo para campañas y confirma las condiciones finales del programa de afiliados. Contactos proporcionados: `ac23014@ues.edu.sv`, `rh23015@ues.edu.sv`, `rg22023@ues.edu.sv` y WhatsApp `+503 7231 1719`.

La identidad usa el logotipo publicado por NODAXIS, IBM Plex Sans y IBM Plex Mono autoalojadas y los colores confirmados `#146FE0`, `#102439` y blanco. Las tipografías se distribuyen bajo SIL Open Font License 1.1; la licencia se conserva en `public/assets/fonts/OFL-IBM-Plex.txt`. El archivo `public/assets/brand/nodaxis-logo.png` proviene del sitio WordPress existente. Los ocho recortes conceptuales de equipos se generaron para este proyecto y se guardan en `public/assets/catalog/` en formato WebP. Son imágenes orientativas, no fotografías de inventario. Las ilustraciones SVG previas están en `public/assets/illustrations/`.

El video de portada `public/assets/motion/network-cables.mp4` es el clip [Network, internet, data](https://pixabay.com/videos/network-internet-data-switch-14906/) de cipnt, descargado de Pixabay bajo su [Content License](https://pixabay.com/service/license-summary/). El SVG de la topología fue dibujado para NODAXIS; no se reutilizaron videos, marcas ni interfaces de UniFi.

## Desarrollo sin Docker

PHP 8.2+, Composer y Node 20+ están instalados en este equipo. Como el PHP global tiene SQLite desactivado, se incluye `dev/php.ini` para uso local:

```powershell
$env:PHPRC=(Resolve-Path .\dev\php.ini).Path
php artisan serve --host=127.0.0.1 --port=8000
```

El CSS y JavaScript compilados ya están en `public/build`. Para reconstruirlos: `npm ci` y `npm run build`.

## Verificación

```powershell
docker compose exec app php artisan test
docker compose exec vite npm run build
```

La estructura principal está en `config/catalog.php`, `resources/views/`, `resources/css/cinematic.css`, `resources/css/catalog.css`, `resources/css/site.css`, `resources/js/app.js`, `app/Http/Controllers/` y `database/migrations/`.
# GitHub Pages

The Laravel application keeps its quote and newsletter handling when run with Docker or PHP. GitHub Pages only serves static files, so the Pages workflow exports the home, quote, and terms screens and changes quote/newsletter actions to WhatsApp or email. It does not save submissions or send newsletters.

The site is exported by `scripts/export_pages.py` after the Laravel server and Vite production build are ready. `.github/workflows/pages.yml` runs this export and deploys it on pushes to `main`.
