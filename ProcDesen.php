<?php header('Content-type: text/html; charset=UTF-8');
  include "../config/config.php";
// The location of the PDF file 
// on the server 



    
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
    $position1 = strrpos($filename, '/');
        
    $caminh = substr($filename, 0, $position1+1);
    
    $c = substr($filename, 0, $position1);
    $position2 = strrpos($c, '/');
        
    $caminh1 = substr($filename, 0, $position2+1);

//echo gettype($filename);
//echo $caminh;

$ara=glob($filename);
$ara1=glob($caminh);
// echo  $filename; 
 //echo gettype($filename);
   /* $fp = fopen('llog.txt', 'w');
fwrite($fp, $filename);
fclose($fp);*/
//echo count($ara1);
     if (count($ara)>0) {
        $filename=$ara[0];
        $filename2=str_replace("/","\\",$filename);

        $filename=substr($filename,19,-1);

        $filename="http://10.0.158:88/pdfs" .$filename."F";
        $position = strrpos($filename, '/');
        
        $filename1 = substr($filename, 0, $position+1);
/* Header content type 
header("Content-type: application/pdf; charset=UTF-8"); 
  
header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
readfile($filename); */
?>
<DOCTYPE html>
<html>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  </head>
<body marginwidth="0" marginheight="0" style="background-color: rgb(220,222,255);">
<div >  
<h4 style="color:Red">Versão: <?php echo $versao;?></h4>
</div> 
<div>  
<a style="color:blue" href="<?php echo $filename1;?>" target="_blank" >Abre Pasta No explorador de internet</a>
</div> 
<div style="border: solid">  
<h4 style="color:black">Caminho para a pasta para colar<u>  no navegador: </u></h4>
<h4 style="color:blue"><?php echo $filename1;?></h4>
</div> 
<div>  
<h4 style="color:grey">Caminho para colar no <u style="color:grey">explorador de pastas: </u></h4> 
<h4 style="color:blue"><?php echo $filename2;?></h4>
</div> 
     <iframe name="iframe1" frameborder="0" src="<?php echo $filename;?>" height="100%" width="100%">    
<embed width="100%" height="" name="plugin" src="<?php $filename;?>" type="application/pdf">
     </iframe>
</body>
</html>


<?php
    } 
    elseif (count($ara1)>0) {
      $filename=$ara1[0];
        $filename2=str_replace("/","\\",$filename);

        $filename=substr($filename,19,-1);

        $filename="http://10.0.0.158:88/pdfs" .$filename."/";
        ?>
        <DOCTYPE html>
        <html>
        <head>
          <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
          </head>
        <body marginwidth="0" marginheight="0" style="background-color: rgb(220,222,255);">
        <h4 id="myInput"  >A Pasta do artigo existe más o desenho não foi encontrado</h4>
        <h4 style="color:Red">Artigo: <?php echo $artigo;?></h4>
        <h4 style="color:Red">Descrição: <?php echo $descricao2;?></h4>
        <div >  
        <h4 style="color:Red">Versão: <?php echo $versao;?></h4>
        </div> 
        <div>  
        <a style="color:blue" href="<?php echo $filename;?>" target="_blank" >Abre Pasta No explorador de internet</a>
        </div> 
        <div style="border: solid">  
        <h4 style="color:black">Caminho para a pasta para colar<u>  no navegador: </u></h4>
        <h4 style="color:blue"><?php echo $filename;?></h4>
        </div> 
        <div style="border: solid">  
        <h4 style="color:grey">Caminho para colar no <u style="color:grey">explorador de pastas: </u></h4> 
        
        <h5 style="color:blue"><?php echo $filename2;?></h5>
        </div> 
             <iframe name="iframe1" frameborder="1" style="background-color: rgb(240,230,230);" src="<?php echo $filename;?>" height="100%" width="100%">    
        <embed width="100%" height="" name="plugin" src="<?php $filename;?>" type="application/pdf">
             </iframe>
        </body>
        </html>
        
        <?php
    
    }
    else {
      $caminh2=str_replace("/","\\",$caminh1);

        $caminh1=substr($caminh1,19,-1);

        $caminh1="http://10.0.0.158:88/pdfs" .$caminh1."/";
      
      
      ?>
      <DOCTYPE html>
      <html>
      <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        </head>
      <body marginwidth="0" marginheight="0" style="background-color: rgb(250,200,230);">
      <h4 id="myInput"  >A Pasta do artigo não existe</h4>
      <h4 style="color:Red">Artigo: <?php echo $artigo;?></h4>
      <h4 style="color:Red">Descrição: <?php echo $descricao2;?></h4>
      <div >  
      <h4 style="color:Red">Versão: <?php echo $versao;?></h4>
      </div> 
      <div>  
      <a style="color:blue" href="<?php echo $caminh1;?>" target="_blank" >Abre Pasta No explorador de internet</a>
      </div> 
      <div style="border: solid">  
      <h4 style="color:black">Caminho para a pasta para colar<u>  no navegador: </u></h4>
      <h4 style="color:blue"><?php echo $caminh1;?></h4>
      </div> 
      <div style="border: solid">  
      <h4 style="color:grey">Caminho para colar no <u style="color:grey">explorador de pastas: </u></h4> 
      <h5 style="color:blue"><?php echo $caminh2;?></h5>
      </div> 
           <iframe name="iframe1" frameborder="1" style="background-color: rgb(240,230,230);" src="<?php echo $caminh1;?>" height="100%" width="100%">    
      <embed width="100%" height="" name="plugin" src="<?php $filename;?>" type="application/pdf">
           </iframe>
      </body>
      </html>
      
      <?php
    }


 

    //"Z:/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/Producao/Nivel 0 - Tubos Maquinados/Linha 1/0TAJI0SNARD08_Aj-Sanita Artic-Varão Inox D8mm (Brt)/0TAJI0SNARD08_001_N01.PDF"; 
  
// Header content type 
//header("Content-type: application/pdf"); 
  
//header("Content-Length: " . filesize($filename)); 
  
// Send the file to the browser. 
//readfile($filename); 

    }
?> 