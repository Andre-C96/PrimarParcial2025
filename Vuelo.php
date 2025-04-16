<?php
class Vuelo{
    private $numVuelo;
    private $importe_Vuelo;
    private $fecha_vuelo;
    private $destino_Vuelo;
    private $hora_Arribo;
    private $hora_Partida;
    private $cantAsientos_Totales;
    private $cantAsientos_Dispo;
    private $responsable_Vuelo;

    /** CONSTRUCTOR
     * @param int $numVuelo
     * @param float $importe_Vuelo
     * @param string $fecha_Vuelo
     * @param string $destino_Vuelo
     * @param string $hora_Arribo
     * @param string $hora_Partida
     * @param int $cantAsientos_Totales
     * @param int $cantAsientos_Dispo
     * @param Persona $responsable_Vuelo
     */
    public function __construct($numVuelo, $importe_Vuelo, $fecha_vuelo, $destino_Vuelo, $hora_Arribo, $hora_Partida, $cantAsientos_Totales, $cantAsientos_Dispo, Persona $responsable_Vuelo) {
        $this->numVuelo = $numVuelo;
        $this->importe_Vuelo = $importe_Vuelo;
        $this->fecha_vuelo = $fecha_vuelo;
        $this->destino_Vuelo = $destino_Vuelo;
        $this->hora_Arribo = $hora_Arribo;
        $this->hora_Partida = $hora_Partida;
        $this->cantAsientos_Totales = $cantAsientos_Totales;
        $this->cantAsientos_Dispo = $cantAsientos_Dispo;
        $this->responsable_Vuelo = $responsable_Vuelo;
    }


    //GETTERS
    public function getNumVuelo() {
        return $this->numVuelo;
    }

    public function getImporteVuelo() {
        return $this->importe_Vuelo;
    }

    public function getFechaVuelo() {
        return $this->fecha_vuelo;
    }

    public function getDestinoVuelo() {
        return $this->destino_Vuelo;
    }

    public function getHoraArribo() {
        return $this->hora_Arribo;
    }

    public function getHoraPartida() {
        return $this->hora_Partida;
    }

    public function getCantAsientosTotales() {
        return $this->cantAsientos_Totales;
    }

    public function getCantAsientosDispo() {
        return $this->cantAsientos_Dispo;
    }

    public function getResponsableVuelo() {
        return $this->responsable_Vuelo;
    }

    //SETTERS
    public function setNumVuelo($numVuelo) {
        $this->numVuelo = $numVuelo;
    }

    public function setImporteVuelo($importe_Vuelo) {
        $this->importe_Vuelo = $importe_Vuelo;
    }

    public function setFechaVuelo($fecha_vuelo) {
        $this->fecha_vuelo = $fecha_vuelo;
    }

    public function setDestinoVuelo($destino_Vuelo) {
        $this->destino_Vuelo = $destino_Vuelo;
    }

    public function setHoraArribo($hora_Arribo) {
        $this->hora_Arribo = $hora_Arribo;
    }

    public function setHoraPartida($hora_Partida) {
        $this->hora_Partida = $hora_Partida;
    }

    public function setCantAsientosTotales($cantAsientos_Totales) {
        $this->cantAsientos_Totales = $cantAsientos_Totales;
    }

    public function setCantAsientosDispo($cantAsientos_Dispo) {
        $this->cantAsientos_Dispo = $cantAsientos_Dispo;
    }

    public function setResponsableVuelo(Persona $responsable_Vuelo) {
        $this->responsable_Vuelo = $responsable_Vuelo;
    }

    //Asignar Asientos Disponibles
    public function asignarAsientosDisponibles($cantAsignar) {
        $puede_asig = false;
        $asientosDisponibles = $this->getCantAsientosDispo();
    
        if ($cantAsignar <= $asientosDisponibles) {
            $nuevosDispo = ($asientosDisponibles - $cantAsignar);
            $this->setCantAsientosDispo($nuevosDispo);
            $puede_asig = true;
        }
    
        return $puede_asig;
    }

}
?>
  