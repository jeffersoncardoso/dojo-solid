<?php 

include_once '../../base_dir.php';
include_once DIR_LSP . 'Retangulo.php';

class RetanguloTest extends PHPUnit_Framework_TestCase {
    
    
    public function testDeveCalcularAreaRecebendoValorDosLadosPeloConstrutor(){
        $quadrado = new Retangulo(5,10);
        
        $resultado = $quadrado->getArea();
        
        $this->assertEquals(50,$quadrado->getArea());
    }
    
    
    public function testDeveCalcularAreaRecebendoValorLarguraAtravesDeMetodo(){
        $retangulo = new Retangulo(5,10); //Largura 5, Altura 10
        
        $retangulo->setLargura(10);
        
        $resultado = $retangulo->getArea();
        
        $this->assertEquals(100,$resultado);
    }
}


?>