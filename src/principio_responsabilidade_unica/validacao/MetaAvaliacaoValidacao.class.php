<?php

include_once DIR_VALIDACAO . 'DefaultValidacao.class.php';


class MetaAvaliacaoValidacao extends DefaultValidacao{
   
   protected $metaAvaliacaoVO;
   private $metaAvaliacaoValidacao;
   
   const MSG_ERROPADRAO = "Ocorreu um erro, tente novamente!";
   const MSG_ERROPORCENTAGEM = "Ocorreu um erro, a porcentagem não confere com a quantidade atingida!";
   const MSG_ERROFORMULARIO = "Ocorreu um erro, preencha corretamente os campos em vermelho!";
   
   function __construct(MetaAvaliacaoVO $metaAvaliacaoVO){
       $this->metaAvaliacaoVO = $metaAvaliacaoVO;
   }
   
   public function validar(){
       $this->buildTipoValidacao();
       
       if($this->metaAvaliacaoValidacao){
           if($this->metaAvaliacaoValidacao->validar()){
                return true;
           }
           else{
                $this->erros = $this->metaAvaliacaoValidacao->getErros();
                $this->msgErro = $this->metaAvaliacaoValidacao->getMsgErro();
                return false;
           }
       }else 
           return false;
       
   }
   
   public function buildTipoValidacao(){
       switch($this->metaAvaliacaoVO->tp_avaliacao){
           case "I" : $this->metaAvaliacaoValidacao = new MetaAvaliacaoIndividualValidacao($this->metaAvaliacaoVO); break;
           case "C" : $this->metaAvaliacaoValidacao = new MetaAvaliacaoColetivaValidacao($this->metaAvaliacaoVO); break;
       }
       return $this->metaAvaliacaoValidacao;
   }
   
   protected function validarQuantidadeAtingida(){
       return(is_numeric($this->metaAvaliacaoVO->nr_quantidadeatingida) 
                && (float)$this->metaAvaliacaoVO->nr_quantidadeatingida >= 0
                && strlen($this->metaAvaliacaoVO->nr_quantidadeatingida) <= 10) ? true : false;
   }
   
   protected function validarPorcentagemAtingida(){
       $porcentagem = (float)$this->metaAvaliacaoVO->nr_porcentagem;
       return( $porcentagem >= 0 && strlen($porcentagem) <= 10 ) ? true : false;
   }

   public function validarFormulaPorcentagem(){
       if(@$this->metaAvaliacaoVO->nr_quantidademes == 0) return false;
       
       $porcentagem = round($this->metaAvaliacaoVO->nr_quantidadeatingida * 100 / $this->metaAvaliacaoVO->nr_quantidademes,2);
       return($porcentagem == (float)$this->metaAvaliacaoVO->nr_porcentagem) ? true : false;
   }
   
}
?>