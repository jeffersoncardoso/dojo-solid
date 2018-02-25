<?php 

include_once DIR_ISP . 'MembroDeTimeScrum.php';

class ProductOwner implements MembroDeTimeScrum
{
    public function priorizarBacklog()
    {
        return "Priorizando backlog";
    }
 
    public function blindarTime() { throw new Exception( "Função errada" ); }
    public function implementarFuncionalidades() { throw new Exception( "Função errada" ); }
}


?>