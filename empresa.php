<?php

include_once("cliente.php");
include_once("moto.php");
include_once("venta.php");
include_once("empresa.php");

class empresa{

    private $denom;
    private $direc;
    private $colClientes;
    private $colMotos;
    private $colVentas;

    public function __construct($denom,$direc,$colClientes,$colMotos,$colVentas)
    {
        $this->denom = $denom;
        $this->direc = $direc;
        $this->colClientes = $colClientes;
        $this->colMotos = $colMotos;
        $this->colVentas = $colVentas;
    }

/************************************************************************************************************** */

    public function get_denom(){
        return $this->denom;
    }

    public function get_direc(){
        return $this->direc;
    }

    public function get_col_clientes(){
        return $this->colClientes;
    }

    public function get_col_motos(){
        return $this->colMotos;
    }

    public function get_col_ventas(){
        return $this->colVentas;
    }

/************************************************************************************************************** */

    public function set_denom($denom){
        $this->denom = $denom;
    }

    public function set_direc($direc){
        $this->direc = $direc;
    }

    public function set_col_clientes($colClientes){
        $this->colClientes = $colClientes;
    }

    public function set_col_motos($colMotos){
        $this->colMotos = $colMotos;
    }

    public function set_col_ventas($colVentas){
        $this->colVentas = $colVentas;
    }

/************************************************************************************************************** */

    public function mostrarMotos(){
        $colMotos = $this->get_col_motos();
        $cadena = "";
        for ( $i = 0; $i < count($colMotos); $i++){
            $cadena = $cadena . $colMotos[$i];
        }
        return $cadena;
    }

/************************************************************************************************************** */

    public function mostrarClientes(){
        $colClientes = $this->get_col_clientes();
        $cadena = "";
        for( $i = 0; $i < count($colClientes); $i++){
            $cadena = $cadena . $colClientes[$i];
        }
        return $cadena;
    }

/************************************************************************************************************** */

    public function mostrarVentas(){
        $colVentas = $this->get_col_ventas();
        $cadena = "";
        for ( $i = 0; $i < count($colVentas); $i++){
            $cadena = $cadena . $colVentas[$i];
        }
        return $cadena;
    }

/************************************************************************************************************** */

    public function __toString()
    {
        return
        "denominacion de la empresa: ". $this->get_denom()."\n".
        "direccion de la empresa: ". $this->get_direc()."\n".
        $this->mostrarClientes()."\n".
        $this->mostrarMotos()."\n".
        $this->mostrarVentas()."\n";
    }

/************************************************************************************************************** */

    public function retornarMoto($codigoMoto){

        $colMotos = $this->get_col_motos();

        $i = 0;

        $seEncontro = false;

        $motoEncontrada = null;

        while ( $i < count($colMotos) && !$seEncontro ){

            if ( $colMotos[$i]->get_cod() == $codigoMoto ){

                $motoEncontrada = $colMotos[$i];

                $seEncontro = true;

            }

            $i++;

        }

        return $motoEncontrada;

    }

/************************************************************************************************************** */

    public function registrarVenta($colCodigosMoto, $objCliente){

        $colVentas = $this->get_col_ventas();

        $precioFinal = 0;

        $nroVenta = rand(1,20);

        $venta = new venta($nroVenta,"xx/xx/xxxx",$objCliente,[],0);

        for ( $i = 0; $i < count($colCodigosMoto); $i++){

            $motoEncontrada = $this->retornarMoto($colCodigosMoto[$i]);

            if ( $motoEncontrada != null && $objCliente->get_dado_baja() == "no" ){
                
                if ( $motoEncontrada->darPrecioVenta() >= 0){   

                    $venta->incorporarMoto($motoEncontrada); 

                }

            }

        }

        if ( count($venta->get_colMotos()) > 0){
            
            $colVentas[] = $venta;

            $this->set_col_ventas($colVentas);

            $precioFinal = $precioFinal + $venta->get_precio_final();

        }

        return $precioFinal;

    }

/********************************************************************************************************************** */

    public function retornarVentasXCliente($tipo,$numDoc){

        $colVentas = $this->get_col_ventas();

        $ventasEncontradas = [];

        for ( $i = 0; $i < count($colVentas); $i++){

            $objVenta = $colVentas[$i];

            $objCliente = $objVenta->get_cliente();

            if ( $objCliente->get_nro_doc() == $numDoc && $objCliente->get_tipo_doc() == $tipo ){

                $ventasEncontradas[] = $colVentas[$i];

            }

        }

        if ( count($ventasEncontradas) == 0){
            $ventasEncontradas = ["no se encontro ninguna venta a este cliente en particular"."\n"];
        }

        return $ventasEncontradas;

    }

/********************************************************************************************************************** */

}


