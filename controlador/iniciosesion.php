<?php
session_start();
 require_once '../modelo/conexion.php';
 class InicioSesion {
    private $id;
    private $nombre;
    private $descripcion;
    const TABLA = 'personaje';
    public function __construct($nombre, $descipcion, $id=null) {
       $this->nombre = $nombre;
       $this->descripcion = $descipcion;
       $this->id = $id;
    }
 }
?>