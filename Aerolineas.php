<?php
class Aerolineas{
    private $id_Aero;
    private $nombre_Aerolinea;
    private $colecVuelos;


    /** CONSTRUCTOR
     * @param INT $id_Aero
     * @param STRING $nombre_Aerolinea
     */
    public function __construct($id_Aero, $nombre_Aerolinea){
        $this->id_Aero = $id_Aero;
        $this->nombre_Aerolinea = $nombre_Aerolinea;
        $this->colecVuelos = [];
    }

    // GETTERS
    public function getId_Aero() {
        return $this->id_Aero;
    }

    public function getNombre_Aerolinea() {
        return $this->nombre_Aerolinea;
    }

    public function getColecVuelos() {
        return $this->colecVuelos;
    }

    // SETTERS
    public function setId_Aero($id_Aero) {
        $this->id_Aero = $id_Aero;
    }

    public function setNombre_Aerolinea($nombre_Aerolinea) {
        $this->nombre_Aerolinea = $nombre_Aerolinea;
    }

    public function setColecVuelos($colecVuelos) {
        $this->colecVuelos = $colecVuelos;
    }

    //TOSTRING
    public function __toString(){
        $vuelosInfo = "";
        foreach ($this->getColecVuelos() as $vuelo) {
            $vuelosInfo .= $vuelo ."\n---------------\n" ;
        }

        return "Identificación: ". $this->getId_Aero().
        "\nNombre: ". $this->getNombre_Aerolinea().
        "\nVuelos Programados: " . $vuelosInfo;
    }

    //Dar Vuelo Destino
    public function darVueloADestino($destino, $asientosLibres) {
        $vuelosDisponibles = [];
        foreach ($this->getColecVuelos() as $objVuelo) {
            if ($objVuelo->getDestinoVuelo() == $destino && $objVuelo->getCantAsientosDispo() >= $asientosLibres) {
                $vuelosDisponibles[] = $objVuelo;
            }
        }
    }

    //INCORPORAR VUELO
    public function incorporarVuelo($vuelo) {
        $incorporado = true;
        $i= 0;
        $encontrado = false;
        while ($i < count($this->getColecVuelos()) && !$encontrado) {
            $objVuelo = $this->getColecVuelos()[$i];
            if ($objVuelo->getDestinoVuelo() == $vuelo->getDestinoVuelo() && $objVuelo->getFechaVuelo() == $vuelo->getFechaVuelo() &&
            $objVuelo->getHoraPartida() == $vuelo->getHoraPartida()){
                $incorporado = false;
                $encontrado = true;
            }
            $i++;
        }

        if($incorporado){
            $this->colecVuelos[] = $vuelo;
        }

        return $incorporado;
    }

    //VENDER VUELO A DESTINO
    public function venderVueloADestino($cantAsientos, $destino, $fecha) {
        $vueloAsignado = null;
        $i = 0;
        $existeVenta = false;

        while ($i < count($this->getColecVuelos()) && !$existeVenta) {
            $vuelo = $this->getColecVuelos()[$i];
            if ($vuelo->getDestinoVuelo() == $destino && $vuelo->getFechaVuelo() == $fecha) {
                if ($vuelo->asignarAsientosDisponibles($cantAsientos)) {
                    $vueloAsignado = $vuelo;
                    $existeVenta = true;
                }
            }
            $i++;
        }
        return $vueloAsignado;
    }
}
?>