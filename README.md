# sistemaParking
Sistema web de gestión de parking con PHP y sesiones. Controla 10 plazas pequeñas y 14 grandes mediante arrays. Permite aparcar/retirar vehículos con lógica específica (coches grandes solo en plazas grandes, pequeños priorizan plazas pequeñas). Muestra estado visual, validaciones en tiempo real y opción de reinicio completo. Interfaz intuitiva.

SISTEMA DE GESTION DE PARKING - PHP CON SESIONES Y ARRAYS

Aplicacion web completa desarrollada en PHP para gestionar un parking con dos zonas diferenciadas, implementando logica de negocio compleja mediante arrays y sesiones para mantener el estado. Proyecto que demuestra habilidades en manipulacion de datos, gestion de estado y desarrollo de interfaces funcionales.

ESTRUCTURA DEL PROYECTO

PARKING_APP/
├── index.php - Pagina principal con menu de operaciones
├── parking_page.php - Procesamiento de operaciones y resultados
├── assets/css/style.css - Estilos CSS modernos y responsivos
├── includes/ - Componentes HTML y formularios
│ ├── form_inicio.html - Menu principal de operaciones
│ ├── form_aparcar_coche.html - Formulario para aparcar
│ ├── form_retirar_coche.html - Formulario para retirar
│ └── (otros componentes)
└── utils/functions.php - Funciones de logica del parking

ARQUITECTURA DEL SISTEMA

ESTRUCTURA DE DATOS:

$_SESSION['plazas_peq']: Array de 10 elementos (0=libre, 1=ocupado)

$_SESSION['plazas_gde']: Array de 14 elementos (0=libre, 1=ocupado)

LOGICA DE NEGOCIO:

Coches grandes: Solo pueden aparcar en plazas grandes

Coches pequeños: Priorizan plazas pequeñas, si no hay -> plazas grandes

Sistema busca siempre la primera plaza disponible

Validacion de plazas existentes y estado

FUNCIONALIDADES PRINCIPALES

OPERACIONES DISPONIBLES:

Aparcar coche: Seleccion tipo (pequeño/grande) y asignacion automatica

Retirar coche: Seleccion tipo de plaza y numero especifico

Visualizar estado: Vista completa del parking con colores

Reinicializar: Reset completo de todas las plazas

SISTEMA DE APARCAMIENTO:

Busqueda automatica de primera plaza libre

Priorizacion inteligente segun tipo de vehiculo

Validacion de disponibilidad

Mensajes informativos de exito/error

GESTION DE ESTADO:

Persistencia mediante sesiones PHP

Arrays que mantienen estado entre solicitudes

Reinicio controlado con confirmacion

INTERFAZ DE USUERIO:

Menu principal con tarjetas interactivas

Formularios intuitivos y bien estructurados

Visualizacion clara del estado del parking

Feedback inmediato de operaciones

CARACTERISTICAS TECNICAS

Gestion de estado con sesiones PHP

Manipulacion avanzada de arrays

Logica condicional compleja

Validacion en cliente y servidor

Interfaz responsiva y moderna

Confirmaciones JavaScript para acciones criticas

Separacion de logica y presentacion

FUNCIONES PHP IMPLEMENTADAS

estado_parking($plazas_peq, $plazas_gde)

Genera vista HTML del estado completo

Muestra plazas con colores diferenciados (libre/ocupado)

Incluye contadores por zona

aparcar_coche($plazas_gde, $plazas_peq, $tipo_coche)

Implementa logica de asignacion segun tipo

Retorna array con resultado y detalles

Maneja casos de parking lleno

retirar_coche(&$plazas, $numero_plaza)

Libera plaza especifica

Validacion de existencia y estado

Retorna mensaje de confirmacion

FLUJO DE OPERACIONES

APARCAR COCHE:

Usuario selecciona "Aparcar Coche"

Elige tipo de vehiculo (pequeño/grande)

Sistema busca plaza disponible segun reglas

Si encuentra: ocupa plaza y confirma

Si no encuentra: informa "Parking completo"

RETIRAR COCHE:

Usuario selecciona "Retirar Coche"

Elige tipo de plaza y numero especifico

Sistema valida que la plaza existe y esta ocupada

Libera la plaza y confirma operacion

VISUALIZAR ESTADO:

Muestra cuadricula completa de plazas

Colores diferenciados: verde (libre), rojo (ocupado)

Contadores por zona

Opcion de reiniciar todo el parking

VALIDACIONES IMPLEMENTADAS

Campos obligatorios en formularios

Rango valido de numeros de plaza (0-9 pequeñas, 0-13 grandes)

Verificacion de que plaza esta ocupada antes de retirar

Confirmacion JavaScript para reinicializacion

Prevencion de acceso directo a scripts

Sanitizacion de entradas de usuario

INTERFAZ Y EXPERIENCIA DE USUARIO

Diseño moderno con gradientes y sombras

Tarjetas interactivas para operaciones

Formularios visualmente atractivos

Mensajes de exito/error bien destacados

Navegacion intuitiva entre secciones

Botones de accion claramente diferenciados

Responsive design para diferentes dispositivos

CASOS DE USO EJEMPLO

CASO 1: Aparcar coche pequeño

Plazas pequeñas: [0,0,1,0,1,1,0,1,0,1]

Asignacion: Plaza pequeña numero 1 (indice 0)

CASO 2: Aparcar coche grande con plazas pequeñas llenas

Plazas pequeñas: todas ocupadas

Plazas grandes: [0,1,0,0,1,0,1,1,0,0,1,0,1,0]

Asignacion: Plaza grande numero 1 (indice 0)

CASO 3: Parking completo

Todas las plazas relevantes ocupadas

Mensaje: "No hay plazas disponibles para este tipo de coche"

HABILIDADES DEMOSTRADAS

Gestion avanzada de arrays en PHP

Implementacion de logica de negocio compleja

Uso de sesiones para persistencia de estado

Desarrollo de interfaces web interactivas

Validacion robusta de datos de entrada

Manejo de estados y transiciones

Creacion de sistemas de simulacion realistas

Organizacion de codigo modular y mantenible

Implementacion de confirmaciones de seguridad

Diseño de flujos de usuario intuitivos

INSTALACION Y CONFIGURACION

Requisitos:

PHP 7.0 o superior

Sesiones habilitadas en PHP

Servidor web (Apache, Nginx, etc.)

Navegador web moderno

Instalacion:

Subir todos los archivos al servidor

Asegurar permisos de escritura para sesiones

Acceder a index.php desde el navegador

Configuracion inicial:

El sistema se inicializa automaticamente

Todas las plazas comienzan libres (valor 0)

El estado se mantiene durante la sesion

EXTENSIONES Y MEJORAS POSIBLES

Base de datos:

Almacenamiento permanente del estado

Historial de operaciones

Reportes y estadisticas

Funcionalidades adicionales:

Reserva de plazas

Sistema de tarifas

Control de tiempo de estacionamiento

Multiples parkings simultaneos

Interfaz avanzada:

Vista en tiempo real

Notificaciones push

API REST para integracion

Aplicacion movil

APLICACIONES PRACTICAS

Sistema de gestion para parkings reales

Herramienta educativa para aprender PHP

Simulador para planificacion de espacios

Base para sistemas mas complejos de logistica

Demo tecnica para procesos de seleccion

PUNTOS DESTACADOS DEL PROYECTO

Logica Inteligente:

Priorizacion automatica segun tipo de vehiculo

Busqueda eficiente de plazas disponibles

Manejo elegante de casos limite

Experiencia de Usuario:

Interfaz visualmente atractiva

Feedback inmediato de acciones

Navegacion intuitiva y fluida

Robustez:

Validacion exhaustiva de datos

Manejo de errores y casos excepcionales

Persistencia confiable del estado

Codigo Limpio:

Funciones bien documentadas

Separacion de responsabilidades

Estructura clara y mantenible

NOTAS DEL DESARROLLADOR

Este proyecto demuestra habilidades esenciales para desarrollo web backend:

Capacidad para implementar logica de negocio compleja

Habilidad para gestionar estado en aplicaciones web

Competencia en manipulacion de estructuras de datos

Experiencia en desarrollo de interfaces funcionales

Comprension de patrones de diseño web

El sistema esta diseñado para ser escalable y adaptable a requerimientos mas complejos, sirviendo como base solida para sistemas de gestion mas avanzados.

AUTOR: Luis Enrique Molina Moreno
CONTACTO: le.molina87@outlook.com
LICENCIA: MIT
VERSION: 1.0
FECHA: 2025
