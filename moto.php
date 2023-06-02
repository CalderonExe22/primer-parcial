<?php


class moto { 

    private $cod;
    private $costo;
    private $anioFabr;
    private $descr;
    private $porcIncrAnual;
    private $activa;

    public function __construct($cod,$costo,$anioFabr,$descr,$porcIncrAnual,$activa)
    {
        $this->cod = $cod;
        $this->costo = $costo;
        $this->anioFabr = $anioFabr;
        $this->descr = $descr;
        $this->porcIncrAnual = $porcIncrAnual;
        $this->activa = $activa;
    }

/**************************************************************************************************** */

    public function get_cod(){
        return $this->cod;
    }

    public function get_costo(){
        return $this->costo;
    }

    public function get_anioFabr(){
        return $this->anioFabr;
    }

    public function get_descr(){
        return $this->descr;
    }

    public function get_porcIncrAnual(){
        return $this->porcIncrAnual;
    }

    public function get_activa(){
        return $this->activa;
    }

/**************************************************************************************************** */

    public function set_cod($cod){
        $this->cod = $cod;
    }
    
    public function set_costo($costo){
        $this->costo = $costo;
    }

    public function set_anioFabr($anioFabr){
        $this->anioFabr = $anioFabr;
    }

    public function set_descr($descr){
        $this->descr = $descr;
    }

    public function set_porcIncrAnual($porcIncrAnual){
        $this->porcIncrAnual = $porcIncrAnual;
    }

    public function set_activa($activa){
        $this->activa = $activa;
    }

/**************************************************************************************************** */

    public function __toString()
    {
        if ( $this->get_activa()){
            $activa = "esta disponible";
        }else{
            $activa = "no esta disponible";
        }

        return
        "codigo Moto: ". $this->get_cod()."\n".
        "Costo de la moto: ". $this->get_costo()."\n".
        "Año de fabricacion: ". $this->get_anioFabr()."\n".
        "Descripcion: ". $this->get_descr()."\n".
        "Porcentaje de incremento anual: ". $this->get_porcIncrAnual()."\n".
        "moto disponible para la venta?: ". $activa."\n";
    }

/**************************************************************************************************** */

    public function darPrecioVenta(){

        $_compra = $this->get_costo();
        
        $anio = 2023 - $this->get_anioFabr();

        $por_inc_anual = $this->get_porcIncrAnual() / 100;

        if ( $this->get_activa() ){

            $_venta = $_compra + $_compra * ($anio * $por_inc_anual);

        }else{

            $_venta = -1;

        }

        return $_venta;

    }

/**************************************************************************************************** */

}