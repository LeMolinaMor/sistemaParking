<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Sistema de Parking</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="pagina-resultados">
    <header class="header-resultados">
        <h1>🅿️ Sistema de Gestión de Parking</h1>
    </header>
    
    <main class="main-resultados">
        <div class="contenedor-resultado">
            <?php
            session_start();
            include 'utils/functions.php';

            // Procesar operaciones POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $operacion = $_POST['operacion'];
                
                switch($operacion) {
                    case 'aparcar':
                        echo "<h2>Resultado: Aparcar Coche</h2>";
                        if (isset($_POST['tipo_coche'])) {
                            $tipo_coche = $_POST['tipo_coche'];
                            $resultado = aparcar_coche($_SESSION['plazas_gde'], $_SESSION['plazas_peq'], $tipo_coche);
                            
                            if ($resultado['exito']) {
                                echo "<div class='mensaje exito'>";
                                echo "Coche aparcado exitosamente en plaza " . $resultado['tipo_plaza'] . " número " . $resultado['numero_plaza'];
                                echo "</div>";
                            } else {
                                echo "<div class='mensaje error'>";
                                echo $resultado['mensaje'];
                                echo "</div>";
                            }
                        }
                        break;
                        
                    case 'retirar':
                        echo "<h2>Resultado: Retirar Coche</h2>";
                        if (isset($_POST['tipo_plaza']) && isset($_POST['numero_plaza'])) {
                            $tipo_plaza = $_POST['tipo_plaza'];
                            $numero_plaza = $_POST['numero_plaza'];
                            
                            // Validar número de plaza
                            if ($tipo_plaza == 'pequena' && $numero_plaza >= 0 && $numero_plaza < 10) {
                                $resultado = retirar_coche($_SESSION['plazas_peq'], $numero_plaza);
                            } elseif ($tipo_plaza == 'grande' && $numero_plaza >= 0 && $numero_plaza < 14) {
                                $resultado = retirar_coche($_SESSION['plazas_gde'], $numero_plaza);
                            } else {
                                $resultado = ['exito' => false, 'mensaje' => 'Número de plaza no válido para este tipo de parking'];
                            }
                            
                            if ($resultado['exito']) {
                                echo "<div class='mensaje exito'>";
                                echo $resultado['mensaje'];
                                echo "</div>";
                            } else {
                                echo "<div class='mensaje error'>";
                                echo $resultado['mensaje'];
                                echo "</div>";
                            }
                        }
                        break;
                }
                
                // Mostrar botón para volver al inicio
                echo '<div class="boton-volver">';
                echo '<a href="index.php" class="btn">Volver al Inicio</a>';
                echo '</div>';
                
            } else {
                // Si alguien accede directamente a parking_page.php sin POST
                echo "<div class='mensaje error'>";
                echo "<h2>Acceso no válido</h2>";
                echo "<p>Debe seleccionar una operación desde la página principal.</p>";
                echo "</div>";
                echo '<div class="boton-volver">';
                echo '<a href="index.php" class="btn">Volver al Inicio</a>';
                echo '</div>';
            }
            ?>
        </div>
    </main>
    
    <footer class="footer-resultados">
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