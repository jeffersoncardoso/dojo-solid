<?php 

interface FuncaoDeScrumMaster{

    function blindarTime();    
}

interface FuncaoDeProductOwner{
    
    function priorizarBacklog();    
}

interface FuncaoDeDesenvolvedor{
    
    function implementarFuncionalidades();    
}

class ScrumMaster implements FuncaoDeScrumMaster
{ 
    public function blindarTime(){
        return "Blindando Time";
    }
}

class Desenvolvedor implements FuncaoDeDesenvolvedor
{ 
    public function implementarFuncionalidades() {
        return "Implementando Funcionalidades";
    }
}

class ProductOwner implements FuncaoDeProductOwner
{ 
    public function priorizarBacklog() {
        return "Priorizando Backlog";
    }
}

?>