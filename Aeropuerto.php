<?php
class Aeropuerto{
    private $denominacion;
    private $direccion;
    private $colecAerolineas;

    /** CONSTRUCTOR
     * @param STRING $denominacion
     * @param STRING $direccion
     * @param ARRAY $colecAerolineas
     */
    public function __construct($denominacion, $direccion) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colecAerolineas = [];
    }

    // GETTERS
    public function getColeccionAerolineas() {
        return $this->colecAerolineas;
    }

    //SETTERS
    public function setColeccionAerolineas($coleccionAerolineas){
        $this->colecAerolineas = $coleccionAerolineas;
    }

    //TOSTRING
    public function __toString() {
    $infoAerolineas = "";
    foreach ($this->getColeccionAerolineas() as $aerolinea) {
        $infoAerolineas .= $aerolinea . "\n--------------------n";
    }

    return "Denominación: " . $this->getDenominacion() .
           "\nDirección: " . $this->getDireccion() .
           "\nAerolineas:\n" . $infoAerolineas;
    }


    //Vuelos de una Aerolinea
    public function retornarVuelosAerolinea($aero_Buscada) {
        $vuelosAerolinea = [];
        $coleccion = $this->getColeccionAerolineas();
        $i = 0;
        $encontrada = false;
    
        while ($i < count($coleccion) && !$encontrada) {
            $aerolinea = $coleccion[$i];
            if ($aerolinea == $aero_Buscada) {
                $vuelosAerolinea = $aerolinea->getColeccionVuelos();
                $encontrada = true;
            }
            $i++;
        }
    
        return $vuelosAerolinea;
    }


    //Venta Automatica
    public function ventaAutomatica($cantAsientos, $fecha, $destino) {
        $hayVuelo = null;
        $coleccionAerolineas = $this->getColeccionAerolineas();
        $encontrado = false;
        $i = 0;

        while ($i < count($coleccionAerolineas) && !$encontrado) {
            $aerolinea = $coleccionAerolineas[$i];
            $coleccionVuelos = $aerolinea->getColeccionVuelos();
    
            $j = 0;

            while ($j < count($coleccionVuelos) && !$encontrado) {
                $vuelo = $coleccionVuelos[$j];
    
                if ($vuelo->getDestinoVuelo() == $destino &&
                    $vuelo->getFechaVuelo() == $fecha &&
                    $vuelo->getCantAsientosDispo() >= $cantAsientos) {
    
                    $puedeAsignar = $vuelo->asignarAsientosDisponibles($cantAsientos);
    
                    if ($puedeAsignar) {
                        $hayVuelo = $vuelo;
                        $encontrado = true;
                    }
                }
    
                $j++;
            }
    
            $i++;
        }
    
        return $hayVuelo;
    }

    public function promedioRecaudadoXAerolinea($idAerolinea) {
        $totalRecaudado = 0;
        $cantidadVuelos = 0;
        $i = 0;
        $encontrada = false;


        while ($i < count($this->getColeccionAerolineas()) && !$encontrada) {
            $aerolinea = $this->getColeccionAerolineas()[$i];
            
            if ($aerolinea->getIdentificacion() == $idAerolinea) {
                $encontrada = true;
                
                foreach ($aerolinea->getColeccionVuelos() as $vuelo) {
                    $totalRecaudado += $vuelo->getImporteVuelo();  
                    $cantidadVuelos++;  
                }
            }
            $i++;
        }
        
        if ($cantidadVuelos == 0) {
            $promedio = 0;
        } else{
            $promedio = ($totalRecaudado / $cantidadVuelos);
        }
        
        return $promedio;
    }
}

?>