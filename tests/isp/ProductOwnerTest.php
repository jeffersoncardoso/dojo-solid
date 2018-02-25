<?php 

include_once '../../base_dir.php';
include_once DIR_ISP . 'ProductOwner.php';

class ProductOwnerTest extends PHPUnit_Framework_TestCase
{
    public function testDevePriorizarBacklog()
    {
        $productOwner = new ProductOwner();
        
        $resultado = $productOwner->priorizarBacklog();
        
        $this->assertEquals("Priorizando backlog",$resultado);
    }
}




?>