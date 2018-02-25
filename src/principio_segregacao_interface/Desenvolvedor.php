<?php 

include_once '../../base_dir.php';
include_once DIR_ISP . 'MembroDeTimeScrum.php';

class Desenvolvedor implements MembroDeTimeScrum
{
    public function priorizarBacklog() { throw new Exception( "Função errada" ); }
    public function blindarTime() { throw new Exception( "Função errada" ); }
 
    public function implementarFuncionalidades()
    {
        return "Implementando Funcionalidades";
    }
}


?>