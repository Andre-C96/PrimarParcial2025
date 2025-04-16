<?php
include_once "Aerolineas.php";
include_once "Aeropuerto.php";
include_once "Persona.php";
include_once "Vuelo.php";

//Instancias areolineas
$aerolinea1 = new Aerolineas(1, "Gran Aire");
$aerolinea2 = new Aerolineas(2, "Vuelos");

//Instancias vuelos
$vuelo1 = new Vuelo(101, 500.00, "14/03/2025", "Madrid", "10:00", "12:00", 100, 100, new Persona("Juan", "Perez", "Av Argentina 222", "mail@mail.com", 2995645231));
$vuelo2 = new Vuelo(102, 400.00, "16/04/2025", "Barcelona", "15:00", "17:00", 120, 120, new Persona("Carlos", "Gomez", "La pampa 544", "mail_M@mail.com", 2994986579));
$vuelo3 = new Vuelo(103, 450.00, "16/04/2025", "Roma", "18:00", "20:00", 80, 80, new Persona("Lucia", "Martinez", "Mazzoni 725", "mail_mail@mail.com", 2995987456));
$vuelo4 = new Vuelo(104, 600.00, "10/05/2025", "Paris", "22:00", "00:00", 150, 150, new Persona("Ana", "Lopez", "Entre Rios 256", "mail..@mail.com", 2996324156));

// Incorporar los vuelos a las aerolíneas
$aerolinea1->incorporarVuelo($vuelo1); 
$aerolinea1->incorporarVuelo($vuelo2);
$aerolinea2->incorporarVuelo($vuelo3); 
$aerolinea2->incorporarVuelo($vuelo4);

//Intancia aeropuerto
$aeropuerto = new Aeropuerto("Jose Morales", "Juan B. Justo 654");
$colecAerolineas = [$aerolinea1, $aerolinea2];
$aeropuerto->setColeccionAerolineas($colecAerolineas);

//Venta Automatica
$resultadoVenta = $aeropuerto->ventaAutomatica(3, "14/03/2025", "Madrid");

if ($resultadoVenta) {
    echo "Venta realizada exitosamente.";
} else {
    echo "No se pudo realizar la venta.";
}

//Recaudado por aerolinea
$promedioRecaudado = $aeropuerto->promedioRecaudadoXAerolinea(1);
echo "Promedio recaudado por la Aerolínea Gran Aire: " . $promedioRecaudado;

?>








