<?php
/* Configuração da classe.smtp.php */ 
 //  $host = "mx1.hostinger.com"; /*host do servidor SMTP */ 
 //  $smtp = new Smtp($host);
 //  $smtp->user = $email; /*usuario do servidor SMTP */ 
  // $smtp->pass = "xxx"; /* senha do usuario do servidor SMTP*/ 
  // $smtp->debug =true; /* ativar a autenticação SMTP*/
	
if (isset($_POST['submit'])){
	$email=$_POST['email'];
/* envia uma mensagem */ 
    $from= "contacto@unirent.online";
    $to = $email;
    $subject = "Newsletter UniRent"; /* assunto da mensagem */ 
    $msg = "Obrigado por subscreveres. Em breve, enviaremos-te novidades sobre a plataforma. Cumprimentos, Equipa UniRent<br>";
   // $smtp->Send($to, $from, $subject, $msg);/* faz o envio da mensagem */
	
	//$sql2="UPDATE tb_faturas SET aviso='S' where cod_cliente='$cod_cliente' and cod_fatura='$cod_fatura'";
    //$result=mysql_query($sql2);

    /*$msg='Enviada com sucesso!';*/
        // echo "<script> alert(\" Aviso de Vencimento fatura  $cod_fatura enviada com sucesso!\")</script>";
        // echo "<meta http-equiv='refresh' content='0;URL=../../main.php?act=./modulos/modCobranca/cob_avisos.php'>";
}
    ?>