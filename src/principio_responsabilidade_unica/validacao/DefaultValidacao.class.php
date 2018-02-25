<?php

include_once DIR_VALIDACAO . 'iValidacao.interface.php';

abstract class DefaultValidacao implements iValidacao{
   
   protected $erros;
   protected $msgErro;
   
   public function getErros(){
       return (array)$this->erros;
   }
   
   public function getMsgErro(){
       return $this->msgErro;
   }
}
?>