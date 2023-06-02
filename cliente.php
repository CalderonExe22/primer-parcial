<?php

class cliente {

    private $nombre;
    private $apellido;
    private $dadoBaja;//Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja.
    private $tipoDoc;
    private $nroDoc;

    public function __construct($nombre,$apellido,$dadoBaja,$tipoDoc,$nroDoc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoBaja = $dadoBaja;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;
    }

/******************************************************************************************************************** */

    public function get_nombC(){
        return $this->nombre;
    }

    public function get_apellC(){
        return $this->apellido;
    }

    public function get_dado_baja(){
        return $this->dadoBaja;
    }

    public function get_nro_doc(){
        return $this->nroDoc;
    }

    public function get_tipo_doc(){
        return $this->tipoDoc;
    }

/******************************************************************************************************************** */

    public function set_nombrC($nombre){
        $this->nombre = $nombre;
    }

    public function set_apellC($apellido){
        $this->apellido = $apellido;
    }

    public function set_dado_baja($dadoBaja){
        $this->dadoBaja = $dadoBaja;
    }

    public function set_nro_doc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    public function set_tipo_doc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }

/******************************************************************************************************************** */

    public function __toString()
    {
        return
        "Nombre: ". $this->get_nombC()."\n".
        "Apellido: ". $this->get_apellC()."\n".
        "dado de baja?: ". $this->get_dado_baja()."\n".
        "Numero de documento: ". $this->get_nro_doc()."\n".
        "Tipo de documento: ". $this->get_tipo_doc()."\n";
    }

}