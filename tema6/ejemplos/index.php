<?php

class Freelance { 
    //Propiedades
    public $nombre; 
    protected $ocupado; 
    private $precioHora = 10; 
    private $comienzoTrabajo; 

    //Métodos

    //Constructor
    function __construct($nombre="", $precioHora=1) {
        $this->nombre = $nombre;
        $this->ocupado = false;
        $this->precioHora = $precioHora;
    }

    //Trabajar
    public function desarrollar(){ 
        echo "<br>Soy ". $this->nombre . " y comienzo a trabajar<br>"; 
        $this->ocupado = true; 
        $this->comienzoTrabajo = time(); 
    } 

    //Parar
    public function parar(){ 
        $this->ocupado = false; 
        $horas_trabajadas = ceil((time() - $this->comienzoTrabajo) / 3600); 
        echo "Terminé de trabajar. Facturo " . ($horas_trabajadas * $this->precioHora); 
    } 

    public function __destruct() {
        echo "Adiós, que descanses";
    }

    public function __toString() {
        return $this->nombre."<br>".$this->ocupado."<br>";
    }
}


    $trabajador = new Freelance();
    $trabajador->desarrollar();
    sleep(2);
    $trabajador->parar();
    $trabajador->mola = "Si";
    $trabajador->mola = true;

    //Dos referencias al mismo objeto
    $trabajador2 = $trabajador;
    $trabajador2->nombre = "Pepe";
    echo $trabajador;

    //Dos objetos diferentes
    $trabajador3 = clone $trabajador;
    $trabajador3->nombre = "Jacinto";
    echo "3." . $trabajador3;
    echo "1." . $trabajador;





    exit();



?>