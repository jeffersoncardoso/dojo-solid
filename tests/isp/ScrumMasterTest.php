<?php 

include_once '../../base_dir.php';
include_once DIR_ISP . 'ScrumMaster.php';

class DesenvolvedorTest extends PHPUnit_Framework_TestCase
{
    public function testeDeveBlindarTime()
    {
        $scrumMaster = new ScrumMaster();
        
        $resultado = $scrumMaster->blindarTime();
        
        $this->assertEquals("Blindando Time",$resultado);
    }
}




?>