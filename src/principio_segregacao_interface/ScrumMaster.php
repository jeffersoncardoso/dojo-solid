<?php 

include_once DIR_ISP . 'MembroDeTimeScrum.php';

class ScrumMaster implements MembroDeTimeScrum
{
    public function priorizarBacklog() {  throw new Exception( "Função errada" );  }
 
    public function blindarTime()
    {
        return "Blindando Time";
    }
 
    public function implementarFuncionalidades() {  throw new Exception( "Função errada" );  }
}


?>