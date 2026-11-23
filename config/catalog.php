<?php

return [
    'switches' => [
        'name' => 'Switches', 'group' => 'conectividad', 'group_label' => 'Conectividad',
        'summary' => 'Conecta por cable computadoras, impresoras y puntos de acceso.',
        'image' => 'switch.webp', 'search' => 'switches redes ethernet puertos conectividad',
        'questions' => [
            '¿Cuántos dispositivos necesitan una conexión por cable?',
            '¿Algún dispositivo necesita alimentación PoE?',
            '¿Hay enlaces de fibra o crecimiento previsto?',
        ],
    ],
    'access-points' => [
        'name' => 'Puntos de acceso Wi-Fi', 'group' => 'conectividad', 'group_label' => 'Conectividad',
        'summary' => 'Conecta laptops y teléfonos por Wi-Fi en las áreas de trabajo.',
        'image' => 'wifi.webp', 'search' => 'wifi inalámbrico acceso cobertura conectividad',
        'questions' => [
            '¿Qué espacios necesitan cobertura y cuentas con planos?',
            '¿Cuántas personas se conectan simultáneamente?',
            '¿Hay áreas exteriores o paredes que dificulten la señal?',
        ],
    ],
    'routers-firewalls' => [
        'name' => 'Routers y firewalls', 'group' => 'seguridad', 'group_label' => 'Seguridad',
        'summary' => 'Dirige el tráfico de internet y permite administrar el acceso a la red.',
        'image' => 'firewall.webp', 'search' => 'routers firewalls gateway seguridad perimetral',
        'questions' => [
            '¿Cuántos enlaces a internet utiliza la organización?',
            '¿Necesitas separar áreas, usuarios o servicios de la red?',
            '¿Requieres conexión remota o entre sedes?',
        ],
    ],
    'enlaces-inalambricos' => [
        'name' => 'Enlaces inalámbricos', 'group' => 'conectividad', 'group_label' => 'Conectividad',
        'summary' => 'Comunica dos ubicaciones cuando no hay cable entre ellas.',
        'image' => 'bridge.webp', 'search' => 'enlaces inalámbricos puente radio conectividad',
        'questions' => [
            '¿Qué distancia separa los dos puntos?',
            '¿Existe línea de vista entre las ubicaciones?',
            '¿Qué servicios o cantidad de datos deben circular?',
        ],
    ],
    'racks-gabinetes' => [
        'name' => 'Racks y gabinetes', 'group' => 'infraestructura', 'group_label' => 'Infraestructura',
        'summary' => 'Aloja y organiza switches, paneles y otros equipos.',
        'image' => 'rack.webp', 'search' => 'racks gabinetes armarios infraestructura',
        'questions' => [
            '¿Qué equipos deben instalarse en el gabinete?',
            '¿Cuánto espacio disponible tiene el sitio?',
            '¿Se requiere ventilación, organización o crecimiento adicional?',
        ],
    ],
    'cableado' => [
        'name' => 'Cableado y paneles', 'group' => 'infraestructura', 'group_label' => 'Infraestructura',
        'summary' => 'Lleva conexiones de red desde el gabinete hasta cada puesto.',
        'image' => 'patch-panel.webp', 'search' => 'cableado paneles patch cables conectores infraestructura',
        'questions' => [
            '¿Cuántos puntos de red se necesitan y dónde estarán?',
            '¿Hay canalización o cableado existente que debamos revisar?',
            '¿El trabajo se realizará en un espacio ocupado o en obra?',
        ],
    ],
    'energia-ups' => [
        'name' => 'Respaldo de energía', 'group' => 'infraestructura', 'group_label' => 'Infraestructura',
        'summary' => 'Mantiene los equipos conectados durante un corte de energía.',
        'image' => 'ups.webp', 'search' => 'ups energía respaldo eléctrico infraestructura',
        'questions' => [
            '¿Qué equipos deben permanecer encendidos ante un corte?',
            '¿Cuánto tiempo de respaldo necesita la operación?',
            '¿Qué condiciones eléctricas tiene el lugar?',
        ],
    ],
    'fibra-optica' => [
        'name' => 'Fibra óptica y módulos', 'group' => 'conectividad', 'group_label' => 'Conectividad',
        'summary' => 'Conecta equipos o edificios mediante enlaces de fibra óptica.',
        'image' => 'fiber.webp', 'search' => 'fibra óptica transceptores sfp módulos conectividad',
        'questions' => [
            '¿Qué distancia separa los equipos o edificios?',
            '¿Existe una ruta de fibra instalada o se necesita una nueva?',
            '¿Qué equipos y capacidad de enlace se utilizarán?',
        ],
    ],
];
