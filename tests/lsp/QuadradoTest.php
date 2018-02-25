<?php 

include_once '../../base_dir.php';
include_once DIR_LSP . 'Quadrado.php';

class QuadradoTest extends PHPUnit_Framework_TestCase {
    
    
    public function testDeveCalcularAreaRecebendoValorDosLadosPeloConstrutor(){
        $quadrado = new Quadrado(5);
        
        $resultado = $quadrado->getArea();
        
        $this->assertEquals(25,$quadrado->getArea());
    }
    
    
    public function testDeveCalcularAreaRecebendoValorLarguraAtravesDeMetodo(){
        $quadrado = new Quadrado(5); // 5 * 5 = 25
        
        $quadrado->setLargura(10); // 10 * 10 = 100
        
        $resultado = $quadrado->getArea();
        
        $this->assertEquals(100,$quadrado->getArea());
    }
}


?>