<?php 

include_once DIR_LSP . 'Retangulo.php';

class Quadrado extends Retangulo {
    public function __construct($lado) {
        $this->setLargura($lado);
        $this->setAltura($lado);
    }
}




?>