<?php 

class Retangulo {
    private $largura;
    private $altura;

    public function __construct($largura, $altura) {
        $this->setLargura($largura);
        $this->setAltura($altura);
    }

    public function setLargura($largura) {
        $this->largura = (int) $largura;
    }

    public function setAltura($largura) {
        $this->altura = (int) $largura;
    }

    public function getLargura() {
        return $this->largura;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getArea() {
        return $this->altura * $this->largura;
    }
}
