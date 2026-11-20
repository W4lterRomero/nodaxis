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

- Portada responsiva con explorador de soluciones: cambio automático, pestañas, teclado, gesto lateral en móvil y pausa cuando el usuario interactúa o sale de la vista.
- Animaciones de entrada y diagrama de red; respeta la preferencia de movimiento reducido.
- Ilustraciones SVG dibujadas para este proyecto. Son categorías orientativas, sin marcas, modelos, precios o existencias inventados.
- Catálogo por categorías con filtro, búsqueda y selección de intereses guardada en el navegador.
- Formulario de cotización con categorías e intereses precargados, validación, protección básica contra spam y persistencia en SQLite.
- Panel comercial privado para consultar solicitudes, filtrar y cambiar su estado.

## Alcance y datos

Esta es una versión local. Las solicitudes se guardan en `database/database.sqlite`; **no se envían correos** ni se sincronizan con WordPress. Antes de publicar se deben confirmar servicios, inventario, cobertura, condiciones comerciales, aviso de privacidad, correo receptor y dominio. El contacto mostrado es `ac23015@ues.edu.sv`, proporcionado para el proyecto.

La identidad usa el logotipo publicado por NODAXIS, DejaVu Sans y los colores `#146FE0`, `#102439`, `#3CD5CF` y blanco. El archivo `public/assets/brand/nodaxis-logo.png` proviene del sitio WordPress existente. Las ilustraciones de equipo están en `public/assets/illustrations/`.

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

La estructura principal está en `resources/views/`, `resources/css/site.css`, `resources/js/app.js`, `app/Http/Controllers/` y `database/migrations/`.
