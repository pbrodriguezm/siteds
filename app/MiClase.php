<?php 
namespace App;
class MiClase {

    public $nombre;
    function __construct() { 
        $this->nombre = "Carlos";
    }

    function getNombre()
    {
        $miNombre = 'Carlos Luis';
        return $miNombre;
    }
}