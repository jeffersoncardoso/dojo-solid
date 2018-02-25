<?php

include_once DIR_VALIDACAO . 'MetaAvaliacaoValidacao.class.php';

class MetaAvaliacaoIndividualValidacao extends MetaAvaliacaoValidacao{
    
   function __construct(MetaAvaliacaoVO $metaAvaliacaoVO){
       $this->metaAvaliacaoVO = $metaAvaliacaoVO;
   }
   
   public function validar(){
       
        if( !$this->validarQuantidadeAtingida() ) {
           $this->msgErro = self::MSG_ERROFORMULARIO; $this->erros[] = 'quantidade';
           return false;
        }
        if( !$this->validarPorcentagemAtingida()) {
           $this->msgErro = self::MSG_ERROFORMULARIO;  $this->erros[] = 'porcentagem';
           return false;
        }
        if( !$this->validarFormulaPorcentagem() ) {
           $this->msgErro = self::MSG_ERROPORCENTAGEM;  $this->erros[] = 'porcentagem'; 
           return false;
        }
       
        return true;       
   }
     
}
?>