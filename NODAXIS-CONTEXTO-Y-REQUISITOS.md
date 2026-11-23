# NODAXIS: contexto, requisitos y estado del proyecto web

**Actualizado:** 22 de noviembre de 2026
**Propósito:** reunir en un solo archivo la información del manual de marca, las solicitudes hechas en esta conversación y el estado comprobable del proyecto local. Este documento sirve como referencia de producto y desarrollo; no convierte ejemplos del manual ni ideas de catálogo en afirmaciones comerciales verificadas.

## 1. Qué es NODAXIS

Según el [manual de marca](../DOC-20261026-WA0026.pdf), NODAXIS es una empresa de ingeniería de redes dedicada al desarrollo de redes, diseño de infraestructura, conectividad corporativa, seguridad perimetral y optimización de comunicaciones. El manual indica que nació en **2018**. Explica el nombre como la unión de **NODO**, punto donde nace o se distribuye la información, y **AXIS**, eje que articula la operación. Su eslogan recomendado es **«Conectamos el futuro.»**

El manual presenta como misión diseñar, implementar y optimizar redes de comunicación seguras, eficientes y escalables. Su visión es ser un referente en ingeniería y desarrollo de redes. Declara cinco valores: **confianza, seguridad, innovación, claridad y compromiso**. La propuesta de valor combina criterio técnico, orden y explicaciones comprensibles con acompañamiento profesional. El tono debe ser claro, seguro, profesional, cercano y actual. Estas declaraciones proceden del manual; los años de operación, resultados y capacidades específicas aún requieren validación comercial antes de usarse como pruebas de venta.

**Mercado previsto para el sitio:** empresas e instituciones en El Salvador. El objetivo comercial definido en la conversación es captar solicitudes de cotización de proyectos de redes y equipos. La acción principal es **«Solicitar cotización»**. WhatsApp fue confirmado como canal alternativo: **+503 7231 1719**.

**Contactos proporcionados para el proyecto:** `ac23014@ues.edu.sv`, `rh23015@ues.edu.sv`, `rg22023@ues.edu.sv` y WhatsApp **+503 7231 1719**. Las solicitudes de cotización se guardan en SQLite y el panel local permite revisarlas; no se envían automáticamente por correo. El manual contiene `contacto@nodaxis.com`, `www.nodaxis.com` y el nombre «Alex Rivera» como ejemplos de aplicaciones de marca. **No se han confirmado como datos reales de la empresa ni deben publicarse como contacto, dominio o integrante del equipo.**

## 2. Identidad visual obligatoria

Fuente: manual de marca, edición 01 de 2026, especialmente páginas 5 a 12 y 15.

| Elemento | Criterio |
|---|---|
| Logotipo | Usar una versión aprobada: principal en fondo claro, negativa en fondo oscuro, monocromática o símbolo reducido. No recomponerlo, deformarlo, rotarlo, recolorearlo ni añadir sombras o brillos. |
| Tamaño y espacio | El logo completo tiene un ancho mínimo digital propuesto de **160 px**. Conservar el área de respeto descrita en el manual y evitar fondos que reduzcan el contraste. |
| Tipografía | **DejaVu Sans Bold** para títulos y datos clave; **DejaVu Sans Regular** para textos e interfaz. Evitar fuentes decorativas. |
| Azul NODAXIS | `#146FE0`: color principal. |
| Azul profundo | `#102439`: fondos y titulares. |
| Cian conexión | `#3CD5CF`: acentos, nodos y llamadas. |
| Blanco técnico | `#FFFFFF`: limpieza y respiración visual. |
| Balance cromático | Referencia del manual: 60 % blanco, 25 % azul profundo, 10 % azul principal y 5 % cian. Es una guía, no una regla matemática por pantalla. |
| Gráficos | Puntos y líneas de red modulares, trazo simple, esquinas suavizadas, alto contraste y espacio amplio. Las tramas deben acompañar al contenido. |
| Recursos digitales | Usar el símbolo reducido como favicon o avatar; mantener contraste sobre fotos o fondos oscuros y evitar la saturación visual. |

El manual desaconseja efectos tridimensionales decorativos innecesarios. Las escenas animadas solicitadas para la web deben conservar la claridad, el contraste y la lectura; el movimiento debe aportar contexto al producto o a la arquitectura de red.

## 3. Lo que has pedido, en orden de evolución

1. **WordPress y planificación comercial.** Se pidió buscar e instalar un MCP de WordPress, elaborar e implementar un sitio de venta basado en el manual, con UX/UI, desarrollo y enfoque de ventas. El plan inicial contemplaba Inicio, Servicios, Equipos, Nosotros y Contacto/Cotización, en WordPress.com, con SEO local y posibilidad futura de WooCommerce. El sitio nuevo debía estar separado de `roomlabs.wordpress.com`. Durante la conexión indicaste que autorizaste WordPress.com; este documento no comprueba el estado actual de esa conexión ni identifica una URL pública de NODAXIS.
2. **Veracidad y contacto.** Pediste que todo estuviera bien diseñado y fuera cierto. Confirmaste los correos `ac23014@ues.edu.sv`, `rh23015@ues.edu.sv`, `rg22023@ues.edu.sv` y el WhatsApp `+503 7231 1719`. Indicaste que NODAXIS vende equipos buscados y cotizados del nicho, sin entregar aún marcas, modelos, lista de inventario, precios, garantías ni zonas exactas. Por eso el catálogo debe tratar esas categorías como oferta por confirmar, sin afirmar existencias.
3. **Catálogo e imágenes.** Pediste agregar catálogos de productos y hacer la web más vistosa con imágenes.
4. **Referencias.** Tras comparar sitios del sector, descartaste estilos que parecían «hechos por IA» y preferiste **UI.com / UniFi**, en especial su pantalla desplegable de inicio, los botones interactivos y el catálogo interactivo.
5. **Más movimiento.** Señalaste que el resultado seguía demasiado estático. Pediste una experiencia más móvil y visual, minimalista en composición pero intensa en imágenes que se muevan, incluidas imágenes originales o generadas para NODAXIS.
6. **Proyecto local.** Cambiaste el foco de WordPress a una app local en el Escritorio, con herramientas de desarrollo web y posibilidad de Docker. Mencionaste Graphify y Laravel. La referencia WordPress quedó para la facilidad de lectura y navegación, mientras las interacciones deberían superar las limitaciones de un tema gratuito.
7. **Interacciones concretas de UI.com.** Pediste una sección inspirada en el holograma de red, mejoras del navbar y héroes cinematográficos como los videos citados de UI.com. La referencia es de comportamiento y calidad visual; los videos, marcas y elementos protegidos de UniFi no son activos de NODAXIS.
8. **Venta funcional.** Reiteraste que el foco debe estar en funcionalidades, ventas y claridad, además del aspecto visual. La cotización y la exploración de soluciones deben servir para convertir visitantes en prospectos útiles.
9. **Continuación de la app.** Se añadió un formulario guiado de cotización en tres pasos y se solicitó seguir desarrollando el proyecto.

## 4. Objetivos y experiencia deseada

- En pocos segundos, el visitante debe entender qué hace NODAXIS, a quién atiende y cómo pedir una propuesta.
- Navegación clara, responsive y con microinteracciones; portada con movimiento intencional, sin depender de animación para entender el contenido.
- Exploración interactiva de soluciones, arquitectura y equipos; controles evidentes por clic, teclado y gesto cuando corresponda.
- Imágenes grandes y cuidadas, fondos limpios y elementos de red en dosis moderadas. Evitar la estética genérica de generadores y las fichas densas sin jerarquía.
- Catálogo que ayude a elegir una familia de equipos y a preparar una solicitud. No presentar imágenes conceptuales como productos reales ni prometer disponibilidad.
- Camino de conversión corto: desde solución o familia de equipos hasta formulario con intereses precargados, resumen y envío.
- SEO centrado en términos y necesidades reales de El Salvador, con títulos, encabezados, enlaces internos y texto alternativo. Las palabras clave específicas deben corresponder a servicios confirmados.
- Accesibilidad: contraste, controles etiquetados, uso con teclado, estados de foco, alternativa estática y respeto por `prefers-reduced-motion`.

## 5. Arquitectura de contenido planteada

El plan original de WordPress proponía cinco páginas: **Inicio, Servicios, Equipos, Nosotros y Contacto/Cotización**. La app local actual reúne Inicio, Soluciones, Arquitectura, Equipos, Servicios y Nosotros en una página principal, con **Cotizar** como ruta separada. Esto conserva la intención comercial, pero todavía no equivale a cinco páginas independientes ni a una estructura SEO completa.

Las líneas de servicio descritas en el manual o planteadas para validación son:

- Diseño, arquitectura e implementación de redes.
- Conectividad corporativa y cobertura Wi-Fi.
- Seguridad perimetral y control de acceso a la red.
- Soporte técnico, monitoreo, mantenimiento y optimización.
- Infraestructura física y equipos asociados, según alcance confirmado.

Evitar afirmaciones sobre clientes, certificaciones, tiempos de respuesta, cobertura nacional, precios, garantías, marcas distribuidas o resultados medibles mientras no exista respaldo.

## 6. Catálogo de familias del prototipo

El catálogo del proyecto local contiene estas **ocho familias orientativas**, agrupadas en conectividad, seguridad e infraestructura. No son un inventario ni una lista de modelos disponibles.

| Familia | Uso en la experiencia de cotización |
|---|---|
| Switches | Dimensionar puertos, PoE, enlaces y crecimiento. |
| Puntos de acceso Wi-Fi | Entender espacios, usuarios simultáneos y condiciones de cobertura. |
| Routers y firewalls | Consultar enlaces, segmentación y conexión entre sedes. |
| Enlaces inalámbricos | Consultar distancia, línea de vista y capacidad necesaria. |
| Racks y gabinetes | Conocer equipos, espacio, ventilación y expansión. |
| Cableado y paneles | Conocer puntos, rutas existentes y condiciones de instalación. |
| Respaldo de energía | Identificar equipos críticos y autonomía requerida. |
| Fibra óptica y módulos | Definir distancia, ruta y capacidad del enlace. |

Cada familia debe aportar criterios de selección y preguntas útiles para cotizar. La prioridad es ayudar al comprador a describir su proyecto, no llenar la página de referencias comerciales sin verificar.

## 7. Estado comprobado de la app local

**Ubicación:** `C:\Users\RYZEN 7\Desktop\NODAXIS-web`
**Base:** Laravel 12, Blade, CSS y JavaScript con Vite y GSAP; SQLite para solicitudes; Docker Compose disponible. Rama Git: `codex/nodaxis-local`.

En el historial confirmado hasta `53918cd` están:

- Portada con video de cableado, póster de respaldo y pausa al salir de la vista o ante movimiento reducido.
- Navbar fijo con progreso de lectura, indicación de sección y menú móvil.
- Explorador visual de soluciones con pestañas, avance automático, teclado y gesto lateral.
- Topología de red SVG animada e interactiva con nodos de Sede, Wi-Fi, Equipos y Control.
- Escena de catálogo con transiciones, tarjetas de ocho familias, filtros, búsqueda y selección de intereses guardada localmente.
- Fichas ampliadas de cada familia con imagen conceptual, preguntas para dimensionar la solicitud y enlace a cotización.
- Formulario de cotización en tres pasos: organización, proyecto y contacto; revisión antes de registrar. Recoge empresa, ubicación, categorías, intereses, descripción, nombre, correo y teléfono opcional. El servidor valida y guarda en SQLite.
- Panel comercial privado con acceso de administrador, filtros y cambios de estado de solicitudes.
- Recursos originales o autorizados: recortes conceptuales WebP de equipos; video de portada de [Pixabay](https://pixabay.com/videos/network-internet-data-switch-14906/) bajo su [licencia de contenido](https://pixabay.com/service/license-summary/); topología SVG propia. No se copiaron los videos ni la interfaz de UI.com.

Las fichas ampliadas quedaron registradas en el commit `53918cd`. Su código y estilos están en el proyecto; este documento no sustituye una revisión visual de su comportamiento en móvil, teclado y distintos tamaños de pantalla.

El README del proyecto incluye el arranque. Con Docker Desktop y el motor Linux disponibles: `docker compose up --build`, luego abrir `http://localhost:8080`. Para desarrollo sin Docker, configurar `PHPRC` con `dev/php.ini` y ejecutar `php artisan serve --host=127.0.0.1 --port=8000`. La URL `http://127.0.0.1:8000` solo funciona mientras ese servidor local esté encendido; **no es un sitio público**.

La última verificación detallada en esta conversación antes de este archivo fue una compilación Vite, 13 pruebas de Laravel con 65 aserciones, caché de vistas y respuesta HTTP 200 de `/cotizar`. La revisión visual automatizada de esa mejora no pudo abrirse, por lo que la comprobación de acabado móvil del formulario sigue pendiente. El commit posterior del catálogo ampliado debe comprobarse en el navegador.

## 8. Lo que sigue pendiente

### Datos de negocio

- Confirmar el nombre y cargo del responsable comercial, correo definitivo de recepción y número de WhatsApp con código de país.
- Confirmar zonas atendidas, servicios realmente prestados, marcas y modelos ofrecidos, inventario, precios, condiciones de entrega, garantías y plazos de respuesta.
- Confirmar si el año 2018 y otros datos institucionales del manual representan hechos actuales verificables.
- Definir dominio, política de privacidad y condiciones de tratamiento de los datos de prospectos.

### Producto y lanzamiento

- Probar visualmente las fichas ampliadas del catálogo y revisar interacción por teclado, móvil y movimiento reducido.
- Comprobar visualmente portada, navbar, catálogo y formulario en anchos móviles y de escritorio; corregir desbordamientos y legibilidad.
- Conectar las solicitudes con un canal real de notificación y establecer responsable y plazo de seguimiento. En la versión local solo se guardan en SQLite.
- Preparar contenido SEO verificable, metadatos por página, sitemap e indexación cuando exista una versión pública.
- Resolver el destino de publicación. El proyecto Laravel local y el WordPress.com inicial son dos líneas distintas; no hay sincronización automática entre ellas.
- Dejar WooCommerce, carrito y pago en línea para una fase posterior con catálogo, existencias, precios, método de pago y plan de alojamiento confirmados.

## 9. Reglas editoriales y de diseño para próximas iteraciones

1. Priorizar una función útil por interacción: mostrar, comparar, orientar o solicitar datos para una propuesta.
2. Mantener una composición minimalista y usar el movimiento en héroes, escenas de producto y topologías sin saturar cada sección.
3. Inspirarse en la calidad de UI.com/UniFi sin reproducir su marca, archivos multimedia ni textos.
4. Diferenciar en la interfaz una imagen conceptual de una fotografía de un artículo disponible.
5. Vincular cada solución y familia a la cotización correspondiente; medir después qué rutas producen solicitudes de calidad.
6. No publicar datos comerciales que procedan solo de ejemplos del manual o de hipótesis de diseño.

## 10. Fuentes y archivos clave

- [Manual de marca NODAXIS](../DOC-20261026-WA0026.pdf), edición 01, 2026. Las páginas 3 a 5 definen empresa y posicionamiento; 6 a 12, identidad; 15, aplicaciones digitales.
- [README del proyecto](README.md): instalación, funciones y límites de la versión local.
- [Catálogo configurable](config/catalog.php): familias y preguntas de dimensionamiento.
- [Portada](resources/views/home.blade.php), [cotización](resources/views/quote.blade.php) y [layout](resources/views/layouts/site.blade.php).
- [Controlador de cotizaciones](app/Http/Controllers/QuoteRequestController.php) y [rutas](routes/web.php).
- Historial de solicitudes y decisiones expresadas por el usuario en esta conversación. Las referencias a UI.com son criterios de inspiración, no fuentes de datos de producto de NODAXIS.
