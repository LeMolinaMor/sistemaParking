<?php
session_start();

// Verificar AMBOS arrays antes de inicializar
if (!isset($_SESSION['plazas_peq']) || !isset($_SESSION['plazas_gde'])) {
    $_SESSION['plazas_peq'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $_SESSION['plazas_gde'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Parking</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
    <div class="container">
        <h1>Sistema de Gestión de Parking</h1>
    </header>
    <main>
        
        <?php
        // Mostrar el formulario según la operación
        if (isset($_GET['operacion'])) {
            $operacion = $_GET['operacion'];
            
            switch($operacion) {
                case 'aparcar':
                    include 'includes/form_aparcar_coche.html';
                    break;
                    
                case 'retirar':
                    include 'includes/form_retirar_coche.html';
                    break;
                    
                case 'visualizar':
                    include 'utils/functions.php';
                    echo "<h2>Estado del Parking</h2>";
                    echo estado_parking($_SESSION['plazas_peq'], $_SESSION['plazas_gde']);
                    
                    // Botón de reinicialización
                    echo '<div class="boton-reiniciar-container">';
                    echo '<button type="button" class="boton-reiniciar" onclick="confirmarReinicio()">';
                    echo 'Reinicializar Parking';
                    echo '</button>';
                    echo '</div>';
                    
                    // JavaScript para la confirmación
                    echo '
                    <script>
                    function confirmarReinicio() {
                        if (confirm("⚠️ ¿ESTÁS SEGURO DE QUE QUIERES REINICIALIZAR EL PARKING?\n\nEsta acción eliminará todos los coches aparcados y no se puede deshacer.")) {
                            window.location.href = "index.php?operacion=reiniciar";
                        }
                    }
                    </script>
                    ';
                    
                    echo '<div class="boton-volver">';
                    echo '<a href="index.php" class="btn">Volver al Menú Principal</a>';
                    echo '</div>';
                    break;
                    
                case 'reiniciar':
                    // Reinicializar los arrays del parking
                    $_SESSION['plazas_peq'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                    $_SESSION['plazas_gde'] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
                    
                    // Mensaje de confirmación
                    echo '<div class="mensaje-confirmacion">';
                    echo '✅ Parking reinicializado correctamente. Todas las plazas están ahora libres.';
                    echo '</div>';
                    
                    // Mostrar el estado actualizado
                    include 'utils/functions.php';
                    echo "<h2>Estado del Parking (Reinicializado)</h2>";
                    echo estado_parking($_SESSION['plazas_peq'], $_SESSION['plazas_gde']);
                    
                    echo '<div class="boton-volver">';
                    echo '<a href="index.php" class="btn">Volver al Menú Principal</a>';
                    echo '</div>';
                    break;
                    
                default:
                    include 'includes/form_inicio.html';
                    break;
            }
        } else {
            include 'includes/form_inicio.html';
        }
        ?>
        </div>
    </main>
    <footer class="footer-premium">
    <div class="footer-content">
        <div class="footer-text">
            Hecho con <span class="footer-heart">💚</span> por <strong>Luis Enrique Molina Moreno</strong>
        </div>
        <a href="mailto:le.molina87@outlook.com?subject=Parking App - Comentarios" class="footer-email">
            📧 Preguntas? Comentarios? Contáctame!
        </a>
        <div class="footer-copyright">
            🆓 2025 Sistema de Gestión de Parking - Úsalo y compártelo
        </div>
    </div>
</footer>
</body>
</html>