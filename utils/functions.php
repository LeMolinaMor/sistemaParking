<?php


function contar_plazas_libres($aparcamiento,$valor_buscado){
    $contador=0;
    foreach($aparcamiento as $plaza){
        if($plaza == $valor_buscado){
            $contador++;
        }
    }
       return $contador;
}


function aparcar_coche(&$plazas_gde,&$plazas_peq,$tipo_coche){

    
    if ($tipo_coche == "grande"){
        $indice = array_search(0,$plazas_gde);
        if ($indice !== false){
            $plazas_gde[$indice] = 1;
            return ['exito' => true, 'tipo_plaza' => 'grande', 'numero_plaza' => $indice];

        }else{
            return ['exito' => false, 'mensaje' => 'Parking completo'];
        }
    }elseif($tipo_coche == "pequeno"){
        $indice = array_search(0,$plazas_peq);
        if($indice !== false){
            $plazas_peq[$indice]=1;
            return ['exito' => true, 'tipo_plaza' => 'pequena', 'numero_plaza' => $indice];
        }else{
            $indice = array_search(0,$plazas_gde);
            if($indice !== false){
                $plazas_gde[$indice] = 1;
                return ['exito' => true, 'tipo_plaza' => 'grande', 'numero_plaza' => $indice];
            }else{
                return ['exito' => false, 'mensaje' => 'Parking completo'];
            }
        }
    } else {
    return ['exito' => false, 'mensaje' => 'Tipo de coche no válido'];
    }
}


function retirar_coche(&$aparcamiento, $indice_plaza){
    if ($aparcamiento[$indice_plaza] == 0){
        return ['exito' => false, 'mensaje' => 'No hay ningún coche aparcado en esa plaza'];   
    }else{
        $aparcamiento[$indice_plaza] = 0;
        return ['exito' => true, 'mensaje' => 'El coche ha sido retirado de la plaza ' . $indice_plaza]; 
    }

}


function estado_parking($plazas_peq, $plazas_gde) {
    $html = "<h2>Estado Completo del Parking</h2>";
    
    // Zona Pequeña
    $html .= "<h3>🟡 Zona Pequeña (" . count($plazas_peq) . " plazas)</h3>";
    $html .= "<div class='plazas'>";
    foreach($plazas_peq as $indice => $estado) {
        $clase = ($estado == 0) ? 'libre' : 'ocupada';
        $texto = ($estado == 0) ? 'Libre' : 'Ocupada';
        $html .= "<div class='plaza-$clase'>" . ($indice + 1) . " ($texto)</div>";
    }
    $html .= "</div>";
    
    // Zona Grande  
    $html .= "<h3>🔵 Zona Grande (" . count($plazas_gde) . " plazas)</h3>";
    $html .= "<div class='plazas'>";
    foreach($plazas_gde as $indice => $estado) {
        $clase = ($estado == 0) ? 'libre' : 'ocupada';
        $texto = ($estado == 0) ? 'Libre' : 'Ocupada';
        $html .= "<div class='plaza-$clase'>" . ($indice + 1) . " ($texto)</div>";
    }
    $html .= "</div><br>";
    
    return $html;
}


?>
