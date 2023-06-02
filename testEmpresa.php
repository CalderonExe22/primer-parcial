<?php

include_once("cliente.php");
include_once("moto.php");
include_once("venta.php");
include_once("empresa.php");

/***************************************************************************************** */

$objCliente1 = new cliente("pedro","fernandes","no","dni",555);//instancia clase cliente

$objCliente2 = new cliente("ramon","lopez","no","dni",111);//instancia clase cliente

$clientes = [$objCliente1,$objCliente2];// coleccion de clientes creadas anteriormente

/***************************************************************************************** */
 
$moto1 = new moto (11,2230000,2022,"benelli imperiable 400", 85, true );//instancia clase moto

$moto2 = new moto (12,584000,2021,"Zanella Zr 150 Ohc", 70, true );//instancia clase moto

$moto3 = new moto (13,999900,2023,"Zanella Patagonian Eagle 250", 55, false );//instancia clase moto

$motos = [$moto1,$moto2,$moto3];//coleccion de motos creadas anteriormente

/***************************************************************************************** */

$ventas = [];//coleccion de ventas vacio

/***************************************************************************************** */

$empresa = new empresa("Alta Gama", "Av Argenetina 123",$clientes,$motos,$ventas );//instancia de la clase empresa

/***************************************************************************************** */

$colCodigosMoto = [11,12,13];
$colCodigosMoto2=[11];
$colCodigosMoto3 = [13];

/***************************************************************************************** */

echo "\n".$empresa->registrarVenta($colCodigosMoto,$objCliente2)."\n";

echo $empresa->registrarVenta($colCodigosMoto2,$objCliente2)."\n";

echo $empresa->registrarVenta($colCodigosMoto3,$objCliente2)."\n";

echo "\n"."************************************RETORNAR VENTAS DE UN CLIENTE EN PARTICULAR*****************************************************"."\n";

$ventasCliente = $empresa->retornarVentasXCliente("dni",111);

for ( $i = 0; $i < count($ventasCliente); $i++){
   echo $ventasCliente[$i];
}

$ventasCliente2 = $empresa->retornarVentasXCliente("dni",555);

for ( $i = 0; $i < count($ventasCliente2); $i++){
    echo $ventasCliente2[$i];
}

echo "\n"."************************************FIN RETORNAR VENTAS DE UN CLIENTE EN PARTICULAR*****************************************************"."\n";

echo "\n"."************************************MOSTRAR RESULTADOS*****************************************************"."\n";

echo $empresa;

echo "************************************FIN MOSTRAR RESULTADOS*****************************************************"."\n";