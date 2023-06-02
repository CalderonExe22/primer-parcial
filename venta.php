<?php


class venta {

    private $nro;
    private $fecha;
    private $cliente;
    private $colMotos;
    private $precioFinal;

    public function __construct($nro,$fecha,$cliente,$colMotos,$precioFinal)
    {
        $this->nro = $nro;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->colMotos = $colMotos;
        $this->precioFinal = $precioFinal;
    }

/***************************************************************************************************** */

    public function get_nro(){
        return $this->nro;
    }

    public function get_fecha(){
        return $this->fecha;
    }

    public function get_cliente(){
        return $this->cliente;
    }

    public function get_colMotos(){
        return $this->colMotos;
    }

    public function get_precio_final(){
        return $this->precioFinal;
    }

/***************************************************************************************************** */

    public function set_nro($nro){
        $this->nro = $nro;
    }

    public function set_fecha($fecha){
        $this->fecha = $fecha;
    }

    public function set_cliente($cliente){
        $this->cliente = $cliente;
    }

    public function set_col_motos($colMotos){
        $this->colMotos = $colMotos;
    }

    public function set_precio_final($precioFinal){
        $this->precioFinal = $precioFinal;
    }

/***************************************************************************************************** */

    public function mostrarMotos(){
        $colMotos = $this->get_colMotos();
        $cadena = "";
        for ( $i = 0;$i < count($colMotos); $i++){
            $cadena = $cadena . $colMotos[$i];
        }
        return $cadena;
    }

/***************************************************************************************************** */

    public function __toString()
    {
        return 
        "----------------------------------------------------------"."\n".
        "Nro de venta: ". $this->get_nro()."\n".
        "fecha de venta: ". $this->get_fecha()."\n".
        "precio final de venta: ". $this->get_precio_final()."\n".
        $this->get_cliente()."\n".
        $this->mostrarMotos()."\n";
    }

/***************************************************************************************************** */

    public function incorporarMoto($objMoto){

        $precioFinal = $this->get_precio_final();

        $colMotos = $this->get_colMotos();

        if ( $objMoto->darPrecioVenta() >= 0 ){

            $nuevoPrecioFinal = $precioFinal + $objMoto->darPrecioVenta();

            $this->set_precio_final($nuevoPrecioFinal);

            $colMotos[] = $objMoto;

            $this->set_col_motos($colMotos);

        }

    }


}