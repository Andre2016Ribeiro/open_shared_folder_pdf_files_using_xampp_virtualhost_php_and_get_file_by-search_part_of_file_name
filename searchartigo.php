<?php
include "../config/config.php";
/*
    $key=$_GET['key'];
    $array = array();
	
$sql = "select  * from Artigo where Artigo LIKE '%{$key}%' or Descricao LIKE '%{$key}%'";
$executar=sqlsrv_query($conn, $sql);
while( $exibir = sqlsrv_fetch_array($executar)){
	      $array[] = $exibir['Artigo'];

}
    echo json_encode($array);
	*/
	if($_POST)
{
$q=$_POST['search'];

$sql="select TOP 100  * from Artigo where Artigo LIKE '".$q."%'";


$executar=sqlsrv_query($conn, $sql);



if (sqlsrv_has_rows($executar) === false){
    $sql="select TOP 10  * from Artigo where Artigo LIKE '%".$q."%' or Descricao LIKE '%".$q."%'";
    $executar=sqlsrv_query($conn, $sql);

}



while( $exibir = sqlsrv_fetch_array($executar)){
	
$username=$exibir['Artigo'];
$email=$exibir['Descricao'];
$versao=$exibir['CDU_Versao'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$b_versao='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);

$final_email = str_ireplace($q, $b_email, $email);
$final_versao = str_ireplace($q, $b_versao, $versao);
?>






        <div class="show" align="left">
               <span class="name"><?php echo $final_username; ?></span>&nbsp;<br/><span class ="descricao"><?php echo $final_email; ?></span><span class ="versao"><?php echo $final_versao; ?></span><br/>
            </div>

         <?php
}

    
}
?>
