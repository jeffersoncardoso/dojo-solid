<?php
include_once DIR_UTIL . 'Define.php';
class Validacao{
        
    public static function validarGenerico($exp, $valor){
        if(preg_match($exp,$valor)){
            return true;
        }else{
            return false;
        }
    }

    public static function validarMascaraCpf($cpf){
        $exp = '/^[0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2}$/';
        if(preg_match($exp,$cpf)){
            return true;
        }else{
            return false;
        }
    }

    public static function validarCpf($cpf){
        
        
        if(empty($cpf)) {
            return false;
        }
        $agulha = array('.','-','/');
        $cpf = str_replace($agulha, '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11) {
            return false;
        }
        else if ($cpf == '00000000000' || 
            $cpf == '11111111111' || 
            $cpf == '22222222222' || 
            $cpf == '33333333333' || 
            $cpf == '44444444444' || 
            $cpf == '55555555555' || 
            $cpf == '66666666666' || 
            $cpf == '77777777777' || 
            $cpf == '88888888888' || 
            $cpf == '99999999999') {
            return false;
         } else {   

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }
    
    
    public static function validarEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }
    
    
    public static function validarData($data){
        if(empty($data)){
            return false;
        }
        $arrayData = array();
        $arrayData = explode("/", $data);
        
        $mes = $arrayData[1];
        $dia = $arrayData[0];
        $ano = $arrayData[2];
        
        if(checkdate($mes, $dia, $ano)){
            return true;
        }else{
            return false;
        }
    }
    
    
    public static function validarHora($hora){
        $exp = '/^([0-1][0-9]|[2][0-3])(:([0-5][0-9])){1,2}$/';
        if(preg_match($exp,$hora)){
            return true;
        }else{
            return false;
        }
    }
 
    public static function validarSexo($sexo){
        if($sexo == 'M' || $sexo == 'F'){
            return true;
        }else{
            return false;
        }
    }
    
  
    public static function validarSenha($senha){
        $exp = '/^[0-9a-zA-Z]{6,12}$/';        
        if(preg_match($exp,$senha)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function explodirData($data, $flag=false){
        if(empty($data)){
            return 'null';
        }
        $arrayData = array();
        $arrayData = explode("/", $data);
        $d = array($arrayData[2], $arrayData[1], $arrayData[0]);
        $nData = implode("-", $d);
        
        if(!$flag){
            $nData = "'".$nData."'";
        }
        return $nData;
    }
        
    public static function explodirDataMySql($data, $flag=false, $hora=false){
        
        if($data == null || $data == 'null'){
            return null;
        }
        
        $arrayData = array();
        
        if($flag){
            $arrayData = explode(" ", $data);
            $data = $arrayData[0];
            $hora = $arrayData[1];
        }
        
        $arrayData = explode("-", $data);
        
        $d = array($arrayData[2], $arrayData[1], $arrayData[0]);
        $nData = implode("/", $d);
        
        $nData = str_replace("'", '', $nData);
        
        if(!$hora) return $nData;
        else return $nData." ".$hora;
    }
    
    public static function criptografar($valor){
        return md5($valor);
    }
    
    public static function gerarSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false){        
        // Caracteres de cada tipo
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        // Vari�veis internas
        $retorno = '';
        $caracteres = '';
        // Agrupamos todos os caracteres que poder�o ser utilizados
        $caracteres .= $lmin;
        if ($maiusculas) $caracteres .= $lmai;
        if ($numeros) $caracteres .= $num;
        if ($simbolos) $caracteres .= $simb;
          // Calculamos o total de caracteres poss�veis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
          // Criamos um n�mero aleat�rio de 1 at� $len para pegar um dos caracteres
          $rand = mt_rand(1, $len);
          // Concatenamos um dos caracteres na vari�vel $retorno
          $retorno .= $caracteres[$rand-1];
        }
        return $retorno;
    }
    
    public static function validarCnpj($cnpj) {
        //checa a mascara
        $exp = '/^([0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/';
        if(!preg_match($exp, $cnpj)){
            return false;
        }
        
        // Elimina possivel mascara
        $agulha = array('.','-','/');
        $cnpj = str_replace($agulha, '', $cnpj);
        
        // Verifica se o numero de digitos informados � igual a 11 
        if (strlen($cnpj) != 14) {
            return false;
        }
        
        $soma1 = ($cnpj[0] * 5) + 
                ($cnpj[1] * 4) + 
                ($cnpj[2] * 3) + 
                ($cnpj[3] * 2) + 
                ($cnpj[4] * 9) + 
                ($cnpj[5] * 8) + 
                ($cnpj[6] * 7) + 
                ($cnpj[7] * 6) + 
                ($cnpj[8] * 5) + 
                ($cnpj[9] * 4) + 
                ($cnpj[10] * 3) + 
                ($cnpj[11] * 2);
        
        $resto = $soma1 % 11;
        $digito1 = $resto < 2 ? 0 : 11 - $resto; 
        
        $soma2 = ($cnpj[0] * 6) + 
                ($cnpj[1] * 5) + 
                ($cnpj[2] * 4) + 
                ($cnpj[3] * 3) + 
                ($cnpj[4] * 2) + 
                ($cnpj[5] * 9) + 
                ($cnpj[6] * 8) + 
                ($cnpj[7] * 7) + 
                ($cnpj[8] * 6) + 
                ($cnpj[9] * 5) + 
                ($cnpj[10] * 4) + 
                ($cnpj[11] * 3) + 
                ($cnpj[12] * 2);
        
        $resto = $soma2 % 11; 
        $digito2 = $resto < 2 ? 0 : 11 - $resto;
        
        if(($cnpj[12] == $digito1) && ($cnpj[13] == $digito2)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validarCep($cep){
        $exp = '/^[0-9]{5}-[0-9]{3}$/';
        if(preg_match($exp,$cep)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validarStatus($status){
        $exp = '/^[SN]$/';
        if(preg_match($exp, $status)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validarPermissao($id_acesso){
        if(ControleLoginUsuario::verificarAcesso()){
            if(in_array($id_acesso, ControleSessao::buscarObjeto('privateUser')->permissaoperfil->permissoes)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public static function validarMenu($menu){
        //menus             //permissoes das abas de cada menu
        $avaliacao = array(A_LISTAR_METAS_AVALIACAO);
        $pesquisa = array(A_PESQUISA_USUARIO, A_PESQUISA_PERFIL);
        $meta = array(A_PESQUISA_META);
        $relatorio = array(A_RELATORIO_ANALITICO, A_RELATORIO_SINTETICO);
        $comissao = array(A_CADASTRO_COMISSAO, A_PESQUISA_COMISSAO, A_ALTERACAO_COMISSAO);
        $aprovacao = array(A_APROVAR_META);
        $diretriz = array(A_CADASTRO_DIRETRIZ);
       
        foreach (ControleSessao::buscarObjeto('privateUser')->permissaoperfil->permissoes as $a) {
            if($menu == A_PESQUISA && in_array($a, $pesquisa)) return true;
            else if($menu == A_META && in_array($a, $meta)) return true;
            else if($menu == A_RELATORIO && in_array($a, $relatorio)) return true;
            else if($menu == A_COMISSAO && in_array($a, $comissao)) return true;
            else if($menu == A_APROVACAO && in_array($a, $aprovacao)) return true;
            else if($menu == A_DIRETRIZ && in_array($a, $diretriz)) return true; 
            else if($menu == A_AVALIACAO && in_array($a, $avaliacao)) return true;
        }
        return false;
    }
    
    public static function testarNull($valor){
        if($valor == null || $valor == 'null'){
            return null;
        }else{
            return $valor;
        }
    }
    
    public static function removerCaracter($array, $string, $substituir=null){
        if(is_null($substituir)) return str_replace($array, "", $string);
        else return str_replace($array, $substituir, $string);
    }
    
    public static function montarMascara($mascara,$string){
        if(!is_null($string) && $string != '' && $string != 'null'){
            $string = str_replace(" ","",$string);
            for($i=0;$i<strlen($string);$i++)
            {
               $mascara[strpos($mascara,"#")] = $string[$i];
            }
            return $mascara;
        }else{
            return null;
        }
    }
    
    public static function converterMoedaMysql($valor){
        $recebeValor = $valor;
        $converterValor = str_replace('.', '', $recebeValor);
        $converterValor = str_replace(',', '.', $converterValor);
        return $converterValor;
        
    } 
    public static function converterMoedaPhp($valor){
        if(!is_null($valor) && !empty($valor)) return number_format($valor,2,',','.');
        else return '';
    }

    public static function validarMoedaReal($real){
        $exp = '/^\d{1,4}(\.\d{3})*\,\d{2}$/';
        if(preg_match($exp,$real)){
            return true;
        }else{
            return false;
        }
    }
    
    public static function validarNumeroTelefoneNaoObg($telefone){
        $exp = '/^(\(?\d{2}\)?[\s-]?\d{4}-?\d{4})?$/';
        $exp2 = '/^(\d{4}-?\d{4})?$/';
        
        if(preg_match($exp,$telefone) || preg_match($exp2,$telefone)){
            return true;
        }else{
            return false;
        }
    }
    
}
?>
