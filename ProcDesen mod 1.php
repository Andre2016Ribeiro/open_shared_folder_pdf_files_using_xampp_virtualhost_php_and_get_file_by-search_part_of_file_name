<?php header('Content-type: text/html; charset=UTF-8');
  include "../config/config.php";
// The location of the PDF file 
// on the server 


echo "<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  </head>";
    
    $artigo=$_GET['artigo'];
    $Pasta="";
    $Ar=substr($artigo, 0, 2);
    $sql1 = "SELECT * FROM Artigo where Artigo='" . $artigo . "'";
    $executar1 = sqlsrv_query($conn, $sql1);
    $exibir1 = sqlsrv_fetch_array($executar1);
    $versao=$exibir1['CDU_Versao'] ;
    if ($versao=="") {
        $versao="1";
        
    }
   

    $position = strpos($artigo, '.');
    if ($position !== false) {
        $artigosp = substr($artigo, 0, $position);
        
        $sql2 = "SELECT * FROM Artigo where Artigo='" . $artigosp . "'";
    $executar2 = sqlsrv_query($conn, $sql2);
    $exibir2 = sqlsrv_fetch_array($executar2);
    $descricao2=$exibir2['Descricao'];
    $descricao2 = substr_replace($descricao2,'',-1);
    $descricao2 = str_replace("/"," ",$descricao2);
    }
    else{$artigosp=$artigo;$descricao2=$exibir1['Descricao'];$descricao2 = str_replace("/"," ",$descricao2);}




    if ($executar1 <= 0) {
    } else {
    switch ($Ar) {
              case "01":
                  $Pasta="Producao/Nivel 0 - Tubos Maquinados/Linha 1/". $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                  $filename = "//10.0.0.241/orthos/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/" . $Pasta;
                  $ara=glob($filename);
                  if(count($ara)>0){}
                  else {//$descricao2=$exibir1['Descricao'];$descricao2 = str_replace("/"," ",$descricao2);
                    $Pasta="Producao/Nivel 0 - Tubos Maquinados/Linha 1/". $artigosp . "*/" . $artigosp . "_00" . $versao . "_N01*.PDF";
                    }


                  break;
              case "02":
                $Pasta="Producao/Nivel 0 - Tubos Maquinados/Linha 2/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                  break;
              case "03":
                $Pasta="Producao/Nivel 0 - Tubos Maquinados/Linha 3/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                  break;

              case "0S":
                $Pasta="Producao/Nivel 0 - Tubos Maquinados/0S/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                
                    break;
              case "11":
                $Pasta="Producao/Nivel 1 - Estruturas Soldadas/Linha 1/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;
              case "12":
                $Pasta="Producao/Nivel 1 - Estruturas Soldadas/Linha 2/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;

              case "13":
                $Pasta="Producao/Nivel 1 - Estruturas Soldadas/Linha 3/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;
              case "MD":
                    $Pasta="Materia Prima/MPR_MD Madeiras/" . $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;
                case "PA":
                  $Pasta="Materia Prima/MPR_PA Acrilicos/". $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;
                case "PL":
                  $Pasta="Materia Prima/MPR_PLI Plásticos Injectados/". $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                    break;
  
                case "PS":
                  $Pasta="Materia Prima/MPR_PS Chapas Laser/". $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                      break;
                case "PT":
                  $Pasta="Materia Prima/MPR_PT Peças Torneadas/". $artigo . "*/" . $artigo . "_00" . $versao . "_N01*.PDF";
                      break;
    }


    $filename = "//10.0.0.241/orthos/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/" . $Pasta;
   
$caminh="//10.0.0.241/orthos/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/Producao/Nivel 0 - Tubos Maquinados/Linha 1/01RFCDATPCFX*/01RFCDATPCFX_002_N01*.PDF";
echo gettype($filename);
echo $caminh;

$ara=glob($filename);

 echo  $filename; 
 echo gettype($filename);
   /* $fp = fopen('llog.txt', 'w');
fwrite($fp, $filename);
fclose($fp);*/
echo count($ara);
     if (count($ara)>0) {
        $filename=$ara[0];
// Header content type 
header("Content-type: application/pdf; charset=UTF-8"); 
  
header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
readfile($filename); 



    } else {$filenam = "//10.0.0.241/orthos/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/" . $Pasta;

      
        echo '<body><h4>O Diretorio</h4> <input type="text" id="myInput" style="height: 100px; width:1500px" value="';
       
       
        print $filenam;
         echo'">';  
          
          echo'<h4>não foi encontrado!!!</h4><button onclick="myFunction()">Copiar directorio</button>';
        echo'<script>function myFunction() {var copyText = document.getElementById("myInput"); copyText.select();
            
          
             // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
          
            // Alert the copied text
            alert("Copied the text: " + copyText.value);
          }</script></body>';
    }


 

    //"Z:/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/Producao/Nivel 0 - Tubos Maquinados/Linha 1/0TAJI0SNARD08_Aj-Sanita Artic-Varão Inox D8mm (Brt)/0TAJI0SNARD08_001_N01.PDF"; 
  
// Header content type 
//header("Content-type: application/pdf"); 
  
//header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
//readfile($filename); 

    }
?> 