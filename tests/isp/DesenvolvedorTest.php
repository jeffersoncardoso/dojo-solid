<?php 

include_once '../../base_dir.php';
include_once DIR_ISP . 'Desenvolvedor.php';

class DesenvolvedorTest extends PHPUnit_Framework_TestCase
{
    public function testDeveImplementarFuncionalidades()
    {
        $desenvolvedor = new Desenvolvedor();
        
        $resultado = $desenvolvedor->implementarFuncionalidades();
        
        $this->assertEquals("Implementando Funcionalidades",$resultado);
    }
}


?>