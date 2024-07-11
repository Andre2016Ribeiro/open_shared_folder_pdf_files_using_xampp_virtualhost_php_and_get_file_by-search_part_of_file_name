<?php
include "../config/config.php";
?>

<!DOCTYPE html>

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
  <title>Ficha Técnica</title>
  <link rel='icon' type="image/png" href="favicon.png" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
  <script src="typeahead.min.js"></script>
  <!-- <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'searchartigo.php?key=%QUERY',
        limit : 10
    });
});
    </script>-->
  <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
  <script type="text/javascript">

    $(function() {
      $(".search").keyup(function() {
        var searchid = $(this).val();
        var dataString = 'search=' + searchid;
        if (searchid != '') {
          $.ajax({
            type: "POST",
            url: "searchartigo.php",
            data: dataString,
            cache: false,
            success: function(html) {
              $("#result").html(html).show();
            }
          });
        }
        return false;
      });
      
	  
	  
    $(document).ready(function() {
        // Bind click event to all td elements
        $('td').on('click', function() {

			 if ($(this).hasClass('linkable')) {
            // Get the text content of the clicked td
            var cellValue = $(this).text();
			cellValue2 = $.trim(cellValue);

			var dataString = 'search=' + cellValue2;
        if (searchid != '') {
          $.ajax({
            type: "POST",
            url: "searchDadosPDFs.php",
            data: dataString,
            cache: false,
            success: function(html) {
				
				recebeDados(html);
				
			}
			
			
			
			
					});
				}
			}
		});
	});


      
      jQuery(".show").on("click", function(e) {
        var $clicked = $(e.target);
        var $name = $clicked.find(".name").html();
        var decoded = $("<div/>").html($name).text();
        $('#searchid').val(decoded);
      });
      jQuery(document).on("click", function(e) {
        var $clicked = $(e.target);
        if (!$clicked.hasClass("search")) {
          jQuery("#result").fadeOut();
        }
      });
      $('#searchid').click(function() {
        jQuery("#result").fadeIn();
        
      });
    });
  </script>
  <script>
	function recebeDados(dados)
	{
		alert("999999");
		alert(dados);
	}
  
  
  </script>
  
  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
      $("area[rel^='prettyPhoto']").prettyPhoto();

      $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'light_square',
        slideshow: 3000,
        autoplay_slideshow: true
      });
      $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'fast',
        slideshow: 10000,
        hideflash: true
      });

      $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
        custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
        changepicturecallback: function() {
          initialize();
        }
      });

      $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
        custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
        changepicturecallback: function() {
          _bsap.exec();
        }
      });
    });
  </script>
  <script>
    function printDiv() {
      var divToPrint = document.getElementById('tabela');
      var newWin = window.open('', 'Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
      newWin.document.close();
      setTimeout(function() {
        newWin.close();
      }, 10);
    }
  </script>
  <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
  <script src="../js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script src="../scripts/script.js"></script>
  <link rel="stylesheet" href="../css/styles1.css">
  <script src="tableToExcel.js"></script>
  <style>
    body {
      padding: 0px;
      margin: 0px;
      background: gray;
      overflow-x: hidden;
      -webkit-print-color-adjust: exact;
    }

    div#firstlabel {
      width: 850px;
      min-height: 500px;
      height: auto;
      background: white;
      margin: 20px auto;
      position: relative;
      padding-top: 15px;
      padding-left: 15px;
      padding-right: 15px;
      padding-bottom: 20px;
      overflow-x: hidden;
    }

    div#logo {
      width: 200px;
      height: 88px;
      ;
      float: right;
      background-image: url('../images/logo.jpg');
      overflow: auto;
    }

    div#menupag {
      width: 200px;
      height: auto;
      float: left;
      position: fixed;
      overflow: auto;
      margin-left: 10px;
      overflow: hidden;
    }

    #dateform {
      width: 130px;
      height: 25px;
    }

    div#menupaga {
      width: 160px;
      height: 30px;
      float: left;
      overflow: hidden;
      margin-top: 10px;
      background: white;
      color: gray;
      padding-left: 10px;
      padding-top: 5px;
      font-family: arial;
      font-size: 12px;
    }

    a {
      text-decoration: none;
      color: gray;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
    }

    table {
      font-family: arial;
      font-size: 12px;
    }

    td {
      padding-left: 5px;
      padding-top: 3px;
      padding-bottom: 3px;
      padding-right: 5px;
    }

    < !-- .bs-example {
      font-family: Arial, sans-serif;
      position: relative;
      margin: 50px;
    }

    .typeahead,
    .tt-query,
    .tt-hint {
      border: 2px solid #CCCCCC;
      border-radius: 4px;
      font-size: 12px;
      height: 20px;
      outline: medium none;
      padding: 8px 12px;
      width: 200px;
    }

    .typeahead {
      background-color: #FFFFFF;
    }

    .typeahead:focus {
      border: 2px solid #0097CF;
    }

    .tt-query {
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    }

    .tt-hint {
      color: #999999;
    }

    .tt-dropdown-menu {
      background-color: #FFFFFF;
      border: 1px solid rgba(0, 0, 0, 0.2);
      border-radius: 4px;
      box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
      margin-top: 12px;
      padding: 8px 0;
      width: 220px;
    }

    .tt-suggestion {
      font-size: 12px;
      line-height: 16px;
      padding: 3px 20px;
    }

    .tt-suggestion.tt-is-under-cursor {
      background-color: #0097CF;
      color: #FFFFFF;
    }


    -->.content {
      width: 830px;
      margin: 0 auto;
    }

    #searchid {
      width: 300px;
      border: solid 1px #000;
      padding: 4px;
      font-size: 12px;
    }

    #result {
      position: absolute;
      width: 350px;
      padding: 5px;
      display: none;
      margin-top: -1px;
      border-top: 0px;
      overflow: hidden;
      border: 1px #CCC solid;
      background-color: white;
      z-index: 1;
    }

    .show {
      padding: 5px;
      border-bottom: 1px #999 dashed;
      font-size: 11px;
      height: 36px;
    }

    .show:hover {
      background: #4c66a4;
      color: #FFF;
      cursor: pointer;
    }

    #bg {
      position: fixed;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
    }

    #bg img {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      min-width: 50%;
      min-height: 50%;
    }
  </style>
</head>

<body>
  <div id="bg">
    <img src="../images/back.png" width="1366" alt="">
  </div>
  <!--Menu esquerdo --> 
  <div id="menupag">
        <div id="menupag">
                <?php
                    $sqlmenu= "SELECT Menu FROM TDU_EstadoWebService";
                    $executarmenu=sqlsrv_query($conn, $sqlmenu);
                    if ( $executarmenu <=0){
                    }
                    else{
                        while( $exibirmenu = sqlsrv_fetch_array($executarmenu)){
                            echo $exibirmenu['Menu'];
                        }
                    }
                ?>
        </div>
    </div>

  <div id="firstlabel">
    <div id="logo"></div>
    <div class="gallery clearfix">
      <div class="gallery clearfix" style="overflow:hidden;">

        <button type='button' class='fas fa-cogs' name='platConfig' id='platConfig' title='Configurações' style='background-color: Transparent;outline-color:Transparent; border-color: Transparent; font-size: 20px; padding-left:0px; !important'><a href='prodconfig.php?iframe=true&width=370&height=330' rel='prettyPhoto[platConfig]'></a></button>

        <button type='button' class='far fa-clock' alt="Planeamento" name='planeamento' id='planeamento' title='planeamento' style='background-color: Transparent;outline-color:Transparent; border-color: Transparent; font-size: 20px; padding-left:0px; !important'><a href='#?iframe=true&width=1015&height=500' rel='prettyPhoto[planeamento]'></a></button>

        <button type="button" class="fas fa-print" onclick="printDiv()" align="center" alt="Imprimir" title="Imprimir" style="background-color: Transparent;outline-color:Transparent; border-color: Transparent; font-size: 20px; padding-left:1px; !important"></button>


        <button type="button" class="fas fa-file-excel" onclick="tableToExcel('testTable', 'Orthos XXI')" alt="Excel" title="Export to Excel" value="Export to Excel" style="background-color: Transparent;outline-color:Transparent; border-color: Transparent; font-size: 20px; padding-left:4px; !important"></button>
      </div>
    </div>

    <div style="margin-top: -10px;">
      <form method="post" action="">
        <span style="font-family: Arial; font-size: 14px;">Pesquisar Artigo:
          <div class="content" style="margin-top:-15px;"><br />

             <input type="text" name="pesquisa" class="search" id="searchid" placeholder="Pesquisar Artigos" onkeydown="return (event.keyCode!=13);" autocomplete="off" />

            <button type='submit' class='fas fa-search' alt='Submit Form' value='a' name='a' style='background-color: Transparent;outline-color:Transparent; border-color: Transparent; font-size: 21px; left:305px; position:relative;display:block; bottom:27px; !important'></button>
            <div id="result"></div>
          </div>
          <!--<input type="text" name="pesquisa" class="typeahead tt-query" autocomplete="off" spellcheck="false" placeholder="Codigo do Artigo">-->
      </form>
     
      <br>
      <?php
      if (isset($_POST['a'])) {
        f();
      }
      ?>

      <?php
      function f()
      {
        global $pesquisa;
        global $conn;
        $pesquisa = $_POST['pesquisa'];
        $pesquisa = strtoupper($pesquisa);
        $totalnv1 = "0";
        $totalnv2 = "0";
        $totalnv3 = "0";
        $totalnv4 = "0";
        $totalnv5 = "0";
        $totalnv6 = "0";
        $totalnv7 = "0";
        $artigopai = "";
        echo "<div id='tabela'>";
        echo "<span style='font-family: Arial; font-size: 14px; '><b>";
        echo $pesquisa;
        echo " </b></span>";
      ?>

      <?php
        echo "<br>";
        $sql9 = "SELECT * FROM Artigo where Artigo='" . $pesquisa . "'";
        $executar9 = sqlsrv_query($conn, $sql9);
        //$executar9 = $conn->query($sql9);
        if ($executar9 <= 0) {
        } else {
        //while ($exibir9 = $executar9->fetch()) {
          while ($exibir9 = sqlsrv_fetch_array($executar9)) {
            echo $exibir9['Descricao'];
            $Pasta="";
            $Ar=substr($exibir9['Artigo'], 0, 2);

            switch ($Ar) {
              case "01":
                  $Pasta="Producao";
                  break;
              case "02":
                $Pasta="Producao";
                  break;
              case "03":
                $Pasta="Producao";
                  break;

              case "0S":
                $Pasta="Producao";
                    break;
              case "11":
                $Pasta="Producao";
                    break;
              case "12":
                $Pasta="Producao";
                    break;

              case "13":
                $Pasta="Producao";
                    break;
              case "MD":
                    $Pasta="Materia Prima";
                    break;
                case "PA":
                  $Pasta="Materia Prima";
                    break;
                case "PL":
                  $Pasta="Materia Prima";
                    break;
  
                case "PS":
                  $Pasta="Materia Prima";
                      break;
                case "PT":
                  $Pasta="Materia Prima";
                      break;
                


          }
          if($Pasta!=""){ echo "<br>";
    	     echo '<table><thread><tr><th></th><td><span style="color:yellow;" class="linkable">';
					
			echo $exibir9['Artigo'];				
            echo  '</label></td></tr></thread></table>';
            echo "<br>";
          }


            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Preço:</b></span><br>";
            echo $nombre_format_francais = number_format($exibir9['PCPadrao'], 3, ',', ' ');
            echo " €";
          }
        }

        $checknull = sqlsrv_query($conn, "SELECT * from Artigo where Artigo='" . $pesquisa . "' AND ArtigoPai IS NOT NULL", array(), array("Scrollable" => "buffered"));
        $artigopai_exist = sqlsrv_num_rows($checknull);
        if ($artigopai_exist > 0) {
          $sqlaa = "SELECT * FROM Artigo where Artigo='" . $pesquisa . "'";
          $executaraa = sqlsrv_query($conn, $sqlaa);
          if ($executaraa <= 0) {
          } else {
            while ($exibiraa = sqlsrv_fetch_array($executaraa)) {
              $artigopai = $exibiraa['ArtigoPai'];
            }
          }
        }
        if ($artigopai == "") {
          $artigopai = $pesquisa;
        }

        $sql7 = "SELECT sum(TempoOperacao / TempoOperacaoPor) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $artigopai . "'";
        $executar7 = sqlsrv_query($conn, $sql7);
        if ($executar7 <= 0) {
        } else {
          while ($exibir7 = sqlsrv_fetch_array($executar7)) {
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Tempo:</b></span><br>";
            $nombre_format_francais = number_format($exibir7['TempoOperacao'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
          }
        }

        $sqlrrr = "SELECT * FROM TDU_ArtigoTempo where Artigo='" . $pesquisa . "'";
        $executarrrr = sqlsrv_query($conn, $sqlrrr);
        if ($executarrrr <= 0) {
        } else {
          while ($exibirrrr = sqlsrv_fetch_array($executarrrr)) {
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Tempo Total:</b></span><br>";
            $nombre_format_francais = number_format($exibirrrr['Tempo'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $hour = $hour / 60;
            $hh = floor($hour);
            $hour = ($hour - $hh) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            if ($hour < 10) {
              $hour = "0" . $hour;
            }
            echo $hh . ":" . $hour . ":" . $min;
          }
        }

        echo "</div>";
        echo "<div style='width:48%; height: auto; float: right; position:relative;'>";
        $sql9zx = "SELECT * FROM TDU_ArtigoTempo_Nivel where Artigo='" . $pesquisa . "'";
        $executar9zx = sqlsrv_query($conn, $sql9zx);
        if ($executar9zx <= 0) {
        } else {
          while ($exibir9zx = sqlsrv_fetch_array($executar9zx)) {
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 0: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv0'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 1: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv1'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 2: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv2'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 3: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv3'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 4: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv4'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
            echo "<span style='font-family: Arial; font-size: 12px; '><b>Nível 5: </b></span>";
            $nombre_format_francais = number_format($exibir9zx['Nv5'], 2, '.', ' ');
            $decTime  = $nombre_format_francais;
            $hour = floor($decTime);
            $min = ($decTime - $hour) * 60;
            $min = floor($min);
            if ($min < 10) {
              $min = "0" . $min;
            }
            echo $hour . ":" . $min;
            echo "<br>";
          }
        }
        echo "</div></div>";
        echo "<div style='width=100%; position: relative; float: left;'><table id='testTable' summary='Code page support in different versions of MS Windows.' rules='groups' frame='hsides'>
          <thead>
          <tr>
            <th width='300px'><center>Artigo</center></th>
            <th><center>Descrição</center></th>
            <th width='50px'><center>Preço</center></th>
          <th><center>Qtd</center></th>
          <th><center>QtdPor</center></th>
          <th><center>Un</center></th>
            <th><center>T</center></th>
          <th><center>T T</center></th>
          </tr>
          </thead><tbody>";
        $sql = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $pesquisa . "' order by componente asc";
        $executar = sqlsrv_query($conn, $sql);
        if ($executar <= 0) {
        } else {
          while ($exibir = sqlsrv_fetch_array($executar)) {
            $Artigotempo = $exibir['Componente'];

            $exibir['ConsumoPor'];
            $Pasta="";
            $Ar=substr($Artigotempo, 0, 2);

            switch ($Ar) {
              case "01":
                  $Pasta="Producao";
                  break;
              case "02":
                $Pasta="Producao";
                  break;
              case "03":
                $Pasta="Producao";
                  break;

              case "0S":
                $Pasta="Producao";
                    break;
              case "11":
                $Pasta="Producao";
                    break;
              case "12":
                $Pasta="Producao";
                    break;

              case "13":
                $Pasta="Producao";
                    break;
              case "MD":
                    $Pasta="Materia Prima";
                    break;
                case "PA":
                  $Pasta="Materia Prima";
                    break;
                case "PL":
                  $Pasta="Materia Prima";
                    break;
  
                case "PS":
                  $Pasta="Materia Prima";
                      break;
                case "PT":
                  $Pasta="Materia Prima";
                      break;
                default:
                echo  "<tr><td><span style='font-family: Arial; font-size: 11px; '>";
            
            echo $exibir['Componente'];
           
            echo  '</span></td>';


          }
		 
          if($Pasta!="")
		  { 
		  
		  
		            echo '<label style="color:blue;"</label>';                  
            echo  '</span></td>';
			
			
	
          }
           


            $sql1 = "SELECT * FROM Artigo where Artigo='" . $exibir['Componente'] . "'";
            $executar1 = sqlsrv_query($conn, $sql1);
            if ($executar1 <= 0) {
            } else {
              while ($exibir1 = sqlsrv_fetch_array($executar1)) {
                $unidadex = $exibir1['UnidadeBase'];
                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                echo $exibir1['Descricao'];
                echo  '</span></td>';
                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                $exibir1['PCPadrao'];
                $precototal1 = (($exibir['Consumo'] / $exibir['ConsumoPor']) * $exibir1['PCPadrao']);
                echo $nombre_format_francais = number_format($precototal1, 3, ',', ' ');
                echo " €";
                echo  '</span></td>';
              }
            }



            echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
            echo $exibir['Consumo'];
            echo  '</center></span></td>';
            echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
            echo $exibir['ConsumoPor'];
            echo  '</center></span></td>';
            echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
            echo $unidadex;
            echo  '</span></td>';

            $checknull = sqlsrv_query($conn, "SELECT * from Artigo where Artigo='" . $exibir['Componente'] . "' AND ArtigoPai IS NOT NULL", array(), array("Scrollable" => "buffered"));
            $artigopai_exist = sqlsrv_num_rows($checknull);
            if ($artigopai_exist > 0) {
              $sqlaa = "SELECT * FROM Artigo where Artigo='" . $exibir['Componente'] . "'";
              $executaraa = sqlsrv_query($conn, $sqlaa);
              if ($executaraa <= 0) {
              } else {
                while ($exibiraa = sqlsrv_fetch_array($executaraa)) {
                  $Artigotempo = $exibiraa['ArtigoPai'];
                }
              }
            }

            $sqlx = "SELECT sum(TempoOperacao / TempoOperacaoPor) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='$Artigotempo'";
            $executarx = sqlsrv_query($conn, $sqlx);
            if ($executarx <= 0) {
            } else {
              while ($exibirx = sqlsrv_fetch_array($executarx)) {
                echo '&nbsp;<td><b><font color="red">';
                echo $nombre_format_francais = number_format($exibirx['TempoOperacao'], 2, ',', ' ');
                $totalnv1 = $totalnv1 + $exibirx['TempoOperacao'] * $exibir['Consumo'];
                echo "#";
                echo '</font></b></td>';
              }
            }

            $c50 = "";



            $sqlpaxw = "
            SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibir['Componente'] . "'";
            $executarpaxw = sqlsrv_query($conn, $sqlpaxw);
            if ($executarpaxw <= 0) {
            } else {
              while ($exibirpaxw = sqlsrv_fetch_array($executarpaxw)) {
                $c50 = number_format($exibirpaxw['Tempo'], 2, ',', ' ');
              }
            }

            echo '&nbsp;<td><b><font color="red">';
            if ($c50 == "") {
              echo "10,00";
            } else {
              echo $c50;
            }
            echo '</font></b></td></tr>';

             /*------------------------------------------------------------------------------*/

            $sqla = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibir['Componente'] . "'";
            $executara = sqlsrv_query($conn, $sqla);
            if ($executara <= 0) {
            } else {
              while ($exibira = sqlsrv_fetch_array($executara)) {
                $Artigotempo = $exibira['Componente'];
                $consume2 = $exibira['Consumo'] / $exibira['ConsumoPor'];
                $exibira['ConsumoPor'];
               
               
                $Pasta="";
                $Ar=substr($Artigotempo, 0, 2);
    
                switch ($Ar) {
                  case "01":
                      $Pasta="Producao";
                      break;
                  case "02":
                    $Pasta="Producao";
                      break;
                  case "03":
                    $Pasta="Producao";
                      break;
    
                  case "0S":
                    $Pasta="Producao";
                        break;
                  case "11":
                    $Pasta="Producao";
                        break;
                  case "12":
                    $Pasta="Producao";
                        break;
    
                  case "13":
                    $Pasta="Producao";
                        break;
                  case "MD":
                        $Pasta="Materia Prima";
                        break;
                    case "PA":
                      $Pasta="Materia Prima";
                        break;
                    case "PL":
                      $Pasta="Materia Prima";
                        break;
      
                    case "PS":
                      $Pasta="Materia Prima";
                          break;
                    case "PT":
                      $Pasta="Materia Prima";
                          break;
                    default:
                    echo  "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                
                echo $exibira['Componente'];
               
                echo  '</span></td>';
    
    
              }
              if($Pasta!=""){ echo  "<tr><td class='linkable'><span style='font-family: Arial; font-size: 11px; color:blue; cursor:pointer '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
               /* echo '<a style="color:blue;" href="ProcDesen.php/?artigo=';
                echo $exibira['Componente'];
                echo '" target="_blank">';
                echo $exibira['Componente'];
                echo '</a>';*/
				
		     echo '<button style="color:blue;">';
					
			echo $exibira["Componente"];				
            echo  '</button></span></td>';
			
              }
               
               

                $sql2 = "SELECT * FROM Artigo where Artigo='" . $exibira['Componente'] . "'";
                $executar2 = sqlsrv_query($conn, $sql2);
                if ($executar2 <= 0) {
                } else {
                  while ($exibir2 = sqlsrv_fetch_array($executar2)) {
                    $unidadexx = $exibir2['UnidadeBase'];
                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                    echo $exibir2['Descricao'];
                    echo  '</span></td>';
                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                    $exibir2['PCPadrao'];
                    $precototal2 = (($exibira['Consumo'] / $exibira['ConsumoPor']) * $exibir2['PCPadrao']);
                    echo $nombre_format_francais = number_format($precototal2, 3, ',', ' ');
                    echo " €";
                    echo  '</span></td>';
                  }
                }


                echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                echo $exibira['Consumo'];
                echo  '</center></span></td>';
                echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                echo $exibira['ConsumoPor'];
                echo  '</center></span></td>';
                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                echo $unidadexx;
                echo  '</span></td>';



                $checknull = sqlsrv_query($conn, "SELECT * from Artigo where Artigo='" . $exibira['Componente'] . "' AND ArtigoPai IS NOT NULL", array(), array("Scrollable" => "buffered"));
                $artigopai_exist = sqlsrv_num_rows($checknull);
                if ($artigopai_exist > 0) {
                  $sqlaa = "SELECT * FROM Artigo where Artigo='" . $exibira['Componente'] . "'";
                  $executaraa = sqlsrv_query($conn, $sqlaa);
                  if ($executaraa <= 0) {
                  } else {
                    while ($exibiraa = sqlsrv_fetch_array($executaraa)) {
                      $Artigotempo = $exibiraa['ArtigoPai'];
                    }
                  }
                }

                $sqlk = "SELECT sum(TempoOperacao / TempoOperacaoPor) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='$Artigotempo'";
                $executark = sqlsrv_query($conn, $sqlk);
                if ($executark <= 0) {
                } else {
                  while ($exibirk = sqlsrv_fetch_array($executark)) {
                    echo '&nbsp;<td><b><font color="red">';
                    $tempoxx = number_format($exibirk['TempoOperacao'], 2, '.', ' ');
                    echo $nombre_format_francais = number_format($exibirk['TempoOperacao'] * $exibira['Consumo'], 2, ',', ' ');
                    $totalnv2 = $totalnv2 + $exibirk['TempoOperacao'] * $exibira['Consumo'];
                    echo '</font></b></td>';
                  }
                }

               
                $c13 = "";



                $sqlpax = "SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibira['Componente'] . "'";
                $executarpax = sqlsrv_query($conn, $sqlpax);
                if ($executarpax <= 0) {
                } else {
                  while ($exibirpax = sqlsrv_fetch_array($executarpax)) {
                    $c13 = number_format($exibirpax['Tempo'], 2, ',', ' ');
                  }
                }

                echo '&nbsp;<td><b><font color="red">';
                if ($c13 == "") {
                  echo "0,00";
                } else {
                  echo $c13;
                }
                echo '</font></b></td></tr>';



                /*------------------------------------------------------------------------------*/





                $sqlb = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibira['Componente'] . "'";
                $executarb = sqlsrv_query($conn, $sqlb);
                if ($executarb <= 0) {
                } else {
                  while ($exibirb = sqlsrv_fetch_array($executarb)) {
                    $artigotempob = $exibirb['Componente'];
                    $consume3 = $exibirb['Consumo'] / $exibirb['ConsumoPor'];
                    $exibirb['ConsumoPor'];

                    $Pasta="";
                $Ar=substr($artigotempob, 0, 2);
    
                switch ($Ar) {
                  case "01":
                      $Pasta="Producao";
                      break;
                  case "02":
                    $Pasta="Producao";
                      break;
                  case "03":
                    $Pasta="Producao";
                      break;
    
                  case "0S":
                    $Pasta="Producao";
                        break;
                  case "11":
                    $Pasta="Producao";
                        break;
                  case "12":
                    $Pasta="Producao";
                        break;
    
                  case "13":
                    $Pasta="Producao";
                        break;
                  case "MD":
                        $Pasta="Materia Prima";
                        break;
                    case "PA":
                      $Pasta="Materia Prima";
                        break;
                    case "PL":
                      $Pasta="Materia Prima";
                        break;
      
                    case "PS":
                      $Pasta="Materia Prima";
                          break;
                    case "PT":
                      $Pasta="Materia Prima";
                          break;
                    default:
                    echo  "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                echo $exibirb['Componente'];
               
                echo  '</span></td>';
    
    
              }
              if($Pasta!=""){ echo  "<tr><td><span style='font-family: Arial; font-size: 11px; color:blue; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                /*echo '<a style="color:blue;" href="ProcDesen.php/?artigo=';
                echo $exibirb['Componente'];
                echo '" target="_blank">';
                
                echo '</a>';*/
					echo $exibirb['Componente'];
		            echo '<label style="color:blue;"</label>';                  
			
                echo  '</span></td>';
              }
               





                   

                    $sql3 = "SELECT * FROM Artigo where Artigo='" . $exibirb['Componente'] . "'";
                    $executar3 = sqlsrv_query($conn, $sql3);
                    if ($executar3 <= 0) {
                    } else {
                      while ($exibir3 = sqlsrv_fetch_array($executar3)) {
                        $unidadexxx = $exibir3['UnidadeBase'];
                        echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                        echo $exibir3['Descricao'];
                        echo  '</span></td>';
                        echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                        $exibir3['PCPadrao'];
                        $precototal3 = (($exibirb['Consumo'] / $exibirb['ConsumoPor']) * $exibir3['PCPadrao']);
                        echo $nombre_format_francais = number_format($precototal3, 3, ',', ' ');
                        echo " €";
                        echo  '</span></td>';
                      }
                    }

                    echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                    echo $exibirb['Consumo'];
                    echo  '</center></span></td>';
                    echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                    echo $exibirb['ConsumoPor'];
                    echo  '</center></span></td>';
                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                    echo $unidadexxx;
                    echo  '</span></td>';



                    $sqlz = "SELECT sum(TempoOperacao / TempoOperacaoPor) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $exibirb['Componente'] . "'";
                    $executarz = sqlsrv_query($conn, $sqlz);
                    if ($executarz <= 0) {
                    } else {
                      while ($exibirz = sqlsrv_fetch_array($executarz)) {
                        echo '&nbsp;<td><b><font color="red">';
                        $tempozz = number_format($exibirz['TempoOperacao'], 2, '.', ' ');
                        echo $nombre_format_francais = number_format($exibirz['TempoOperacao'] * $exibirb['Consumo'], 2, ',', ' ');
                        $totalnv3 = $totalnv3 + $exibirz['TempoOperacao'] * $exibirb['Consumo'];
                        echo '</font></b></td>';
                      }
                    }


                    $c3 = "";
                    $sqlpa = "SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibirb['Componente'] . "' ";
                    $executarpa = sqlsrv_query($conn, $sqlpa);
                    if ($executarpa <= 0) {
                    } else {
                      while ($exibirpa = sqlsrv_fetch_array($executarpa)) {
                        $c3 = number_format($exibirpa['Tempo'], 2, ',', ' ');
                      }
                    }

                    echo '&nbsp;<td><b><font color="red">';
                    if ($c3 == "") {
                      echo "0,00";
                    } else {
                      echo $c3;
                    }
                    echo '</font></b></td></tr>';

                     /*------------------------------------------------------------------------------*/


                    $sqlc4 = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibirb['Componente'] . "'";
                    $executarc = sqlsrv_query($conn, $sqlc4);
                    if ($executarc <= 0) {
                    } else {
                      while ($exibirc = sqlsrv_fetch_array($executarc)) {
                        $artigotempoc = $exibirc['Componente'];
                        $exibirc['Consumo'];
                        $exibirc['ConsumoPor'];

                        $Pasta="";
                        $Ar=substr($artigotempoc, 0, 2);
            
                        switch ($Ar) {
                          case "01":
                              $Pasta="Producao";
                              break;
                          case "02":
                            $Pasta="Producao";
                              break;
                          case "03":
                            $Pasta="Producao";
                              break;
            
                          case "0S":
                            $Pasta="Producao";
                                break;
                          case "11":
                            $Pasta="Producao";
                                break;
                          case "12":
                            $Pasta="Producao";
                                break;
            
                          case "13":
                            $Pasta="Producao";
                                break;
                          case "MD":
                                $Pasta="Materia Prima";
                                break;
                            case "PA":
                              $Pasta="Materia Prima";
                                break;
                            case "PL":
                              $Pasta="Materia Prima";
                                break;
              
                            case "PS":
                              $Pasta="Materia Prima";
                                  break;
                            case "PT":
                              $Pasta="Materia Prima";
                                  break;
                            default:
                            echo  "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo $exibirc['Componente'];
                       
                        echo  '</span></td>';
            
            
                      }
                      if($Pasta!=""){ echo  "<tr><td><span style='font-family: Arial; font-size: 11px; color:blue; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        echo '<a style="color:blue;" href="ProcDesen.php/?artigo=';
                        echo $exibirc['Componente'];
                        echo '" target="_blank">';
                        echo $exibirc['Componente'];
                        echo '</a>';
                        echo  '</span></td>';
                      }
                       
        

                        $sql4 = "SELECT * FROM Artigo where Artigo='" . $exibirc['Componente'] . "'";
                        $executar4 = sqlsrv_query($conn, $sql4);
                        if ($executar4 <= 0) {
                        } else {
                          while ($exibir4 = sqlsrv_fetch_array($executar4)) {
                            $unidadexxxx = $exibir4['UnidadeBase'];
                            echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                            echo $exibir4['Descricao'];
                            echo  '</span></td>';
                            echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                            $exibir4['PCPadrao'];
                            $precototal4 = (($exibirc['Consumo'] / $exibirc['ConsumoPor']) * $exibir4['PCPadrao']);
                            echo $nombre_format_francais = number_format($precototal4, 3, ',', ' ');
                            echo " €";
                            echo  '</span></td>';
                          }
                        }

                        echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                        echo $exibirc['Consumo'];
                        echo  '</center></span></td>';
                        echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                        echo $exibirc['ConsumoPor'];
                        echo  '</center></span></td>';
                        echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                        echo $unidadexxxx;
                        echo  '</span></td>';



                        $sqlp = "SELECT sum(TempoOperacao) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $exibirc['Componente'] . "'";
                        $executarp = sqlsrv_query($conn, $sqlp);
                        if ($executarp <= 0) {
                        } else {
                          while ($exibirp = sqlsrv_fetch_array($executarp)) {
                            echo '&nbsp;<td><b><font color="red">';
                            echo $nombre_format_francais = number_format($exibirp['TempoOperacao'] * $exibirc['Consumo'], 2, ',', ' ');
                            $totalnv4 = $totalnv4 + $exibirp['TempoOperacao'] * $exibirc['Consumo'];
                            echo '</font></b></td>';
                          }
                        }

                        $c3xy = "";
                        $sqlpaxy = "
                        SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibirc['Componente'] . "'
                        ";
                        $executarpaxy = sqlsrv_query($conn, $sqlpaxy);
                        if ($executarpaxy <= 0) {
                        } else {
                          while ($exibirpaxy = sqlsrv_fetch_array($executarpaxy)) {
                            $c3xy = number_format($exibirpaxy['Tempo'], 2, ',', ' ');
                          }
                        }

                        echo '&nbsp;<td><b><font color="red">';
                        if ($c3xy == "") {
                          echo "0,00";
                        } else {
                          echo $c3xy;
                        }
                        echo '</font></b></td></tr>';

                         /*------------------------------------------------------------------------------*/

                        $sqld = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibirc['Componente'] . "'";
                        $executard = sqlsrv_query($conn, $sqld);
                        if ($executard <= 0) {
                        } else {
                          while ($exibird = sqlsrv_fetch_array($executard)) {
                            $artigotempod =$exibird['Componente'];
                            $exibird['Consumo'];
                            $exibird['ConsumoPor'];

                            $Pasta="";
                            $Ar=substr($artigotempod, 0, 2);
                
                            switch ($Ar) {
                              case "01":
                                  $Pasta="Producao";
                                  break;
                              case "02":
                                $Pasta="Producao";
                                  break;
                              case "03":
                                $Pasta="Producao";
                                  break;
                
                              case "0S":
                                $Pasta="Producao";
                                    break;
                              case "11":
                                $Pasta="Producao";
                                    break;
                              case "12":
                                $Pasta="Producao";
                                    break;
                
                              case "13":
                                $Pasta="Producao";
                                    break;
                              case "MD":
                                    $Pasta="Materia Prima";
                                    break;
                                case "PA":
                                  $Pasta="Materia Prima";
                                    break;
                                case "PL":
                                  $Pasta="Materia Prima";
                                    break;
                  
                                case "PS":
                                  $Pasta="Materia Prima";
                                      break;
                                case "PT":
                                  $Pasta="Materia Prima";
                                      break;
                                default:
                                echo  "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo $exibird['Componente'];
                           
                            echo  '</span></td>';
                
                
                          }
                          if($Pasta!=""){ echo  "<tr><td><span style='font-family: Arial; font-size: 11px; color:blue; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                            echo '<a style="color:blue;" href="ProcDesen.php/?artigo=';
                            echo $exibird['Componente'];
                            echo '" target="_blank">';
                            echo $exibird['Componente'];
                            echo '</a>';
                            echo  '</span></td>';
                          }
                           
            


                           

                            $sql5 = "SELECT * FROM Artigo where Artigo='" . $exibird['Componente'] . "'";
                            $executar5 = sqlsrv_query($conn, $sql5);
                            if ($executar5 <= 0) {
                            } else {
                              while ($exibir5 = sqlsrv_fetch_array($executar5)) {
                                $unidadexxxx5 = $exibir5['UnidadeBase'];
                                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                echo $exibir5['Descricao'];
                                echo  '</span></td>';
                                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                $exibir5['PCPadrao'];
                                $precototal5 = (($exibird['Consumo'] / $exibird['ConsumoPor']) * $exibir5['PCPadrao']);
                                echo $nombre_format_francais = number_format($precototal5, 3, ',', ' ');
                                echo " €";
                                echo  '</span></td>';
                              }
                            }

                            echo  "<td><center><span style='font-family: Arial; font-size: 11px; '>";
                            echo $exibird['Consumo'];
                            echo  '</span></center></td>';
                            echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                            echo $exibird['ConsumoPor'];
                            echo  '</center></span></td>';
                            echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                            echo $unidadexxxx5;
                            echo  '</span></td>';


                            $sqlpp = "SELECT sum(TempoOperacao) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $exibird['Componente'] . "'";
                                $executarpp = sqlsrv_query($conn, $sqlpp);
                                if ($executarp <= 0) {
                                } else {
                                  while ($exibirpp = sqlsrv_fetch_array($executarpp)) {
                                    echo '&nbsp;<td><b><font color="red">';
                                    echo $nombre_format_francais = number_format($exibirpp['TempoOperacao'] * $exibird['Consumo'], 2, ',', ' ');
                                    $totalnv5 = $totalnv5 + $exibirpp['TempoOperacao'] * $exibird['Consumo'];
                                    echo '</font></b></td>';
                                  }
                                }

                                $c3xy = "";
                                $sqlpaxy = "
                                SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibird['Componente'] . "'
                                ";
                                $executarpaxy5 = sqlsrv_query($conn, $sqlpaxy);
                                if ($executarpaxy5 <= 0) {
                                } else {
                                  while ($exibirpaxy = sqlsrv_fetch_array($executarpaxy5)) {
                                    $c3xy = number_format($exibirpaxy['Tempo'], 2, ',', ' ');
                                  }
                                }

                                echo '&nbsp;<td><b><font color="red">';
                                if ($c3xy == "") {
                                  echo "0,00";
                                } else {
                                  echo $c3xy;
                                }
                                echo '</font></b></td></tr>';

                                 /*------------------------------------------------------------------------------*/


                            $sqlc = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibird['Componente'] . "'";
                            $executarc7 = sqlsrv_query($conn, $sqlc);
                            if ($executarc7 <= 0) {
                            } else {
                              while ($exibirx7 = sqlsrv_fetch_array($executarc7)) {
                                $exibirx7['Componente'];
                                $exibirx7['Consumo'];
                                $exibirx7['ConsumoPor'];
                                echo "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo $exibirx7['Componente'];
                                echo  '</span></td>';

                                $sql6 = "SELECT * FROM Artigo where Artigo='" . $exibirx7['Componente'] . "'";
                                $executar6 = sqlsrv_query($conn, $sql6);
                                if ($executar6 <= 0) {
                                } else {
                                  while ($exibir6 = sqlsrv_fetch_array($executar6)) {
                                    $unidadexxxx6 = $exibir6['UnidadeBase'];
                                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                    echo $exibir6['Descricao'];
                                    echo  '</span></td>';
                                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                    $exibir6['PCPadrao'];
                                    $precototal6 = (($exibirx7['Consumo'] / $exibirx7['ConsumoPor']) * $exibir6['PCPadrao']);
                                    echo $nombre_format_francais = number_format($precototal6, 3, ',', ' ');
                                    echo " €";
                                    echo  '</span></td>';
                                  }
                                }

                                echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                                echo $exibirx7['Consumo'];
                                echo  '</center></span></td>';
                                echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                                echo $exibirx7['ConsumoPor'];
                                echo  '</center></span></td>';
                                echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                echo $unidadexxxx6;
                                echo  '</span></td>';





                                $sqlpp = "SELECT sum(TempoOperacao) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $exibirx7['Componente'] . "'";
                                $executarpp = sqlsrv_query($conn, $sqlpp);
                                if ($executarp <= 0) {
                                } else {
                                  while ($exibirpp = sqlsrv_fetch_array($executarpp)) {
                                    echo '&nbsp;<td><b><font color="red">';
                                    echo $nombre_format_francais = number_format($exibirpp['TempoOperacao'] * $exibirx7['Consumo'], 2, ',', ' ');
                                    $totalnv6 = $totalnv6 + $exibirpp['TempoOperacao'] * $exibirx7['Consumo'];
                                    echo '</font></b></td>';
                                  }
                                }

                                $c3xy = "";
                                $sqlpaxy = "
                                SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibirx7['Componente'] . "'
                                ";
                                $executarpaxy = sqlsrv_query($conn, $sqlpaxy);
                                if ($executarpaxy <= 0) {
                                } else {
                                  while ($exibirpaxy = sqlsrv_fetch_array($executarpaxy)) {
                                    $c3xy = number_format($exibirpaxy['Tempo'], 2, ',', ' ');
                                  }
                                }

                                echo '&nbsp;<td><b><font color="red">';
                                if ($c3xy == "") {
                                  echo "0,00";
                                } else {
                                  echo $c3xy;
                                }
                                echo '</font></b></td></tr>';

                                /*------------------------------------------------------------------------------*/

                                $sql7 = "SELECT * FROM GPR_ArtigoComponentes where Artigo='" . $exibirx7['Componente'] . "'";
                                $executar7 = sqlsrv_query($conn, $sql7);
                                if ($executar7 <= 0) {
                                } else {
                                  while ($exibir7 = sqlsrv_fetch_array($executar7)) {
                                    $exibir7['Componente'];
                                    $exibir7['Consumo'];
                                    $exibir7['ConsumoPor'];
                                    echo "<tr><td><span style='font-family: Arial; font-size: 11px; '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    echo $exibir7['Componente'];
                                    echo  '</span></td>';

                                    $sql71 = "SELECT * FROM Artigo where Artigo='" . $exibir7['Componente'] . "'";
                                    $executar71 = sqlsrv_query($conn, $sql71);
                                    if ($executar71 <= 0) {
                                    } else {
                                      while ($exibir73 = sqlsrv_fetch_array($executar71)) {
                                        $unidadexxxxx = $exibir73['UnidadeBase'];
                                        echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                        echo $exibir73['Descricao'];
                                        echo  '</span></td>';
                                        echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                        $exibir73['PCPadrao'];
                                        $precototal7 = (($exibir7['Consumo'] / $exibir7['ConsumoPor']) * $exibir73['PCPadrao']);
                                        echo $nombre_format_francais = number_format($precototal7, 3, ',', ' ');
                                        echo " €";
                                        echo  '</span></td>';
                                      }
                                    }

                                    echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                                    echo $exibir7['Consumo'];
                                    echo  '</center></span></td>';
                                    echo  "<td><span style='font-family: Arial; font-size: 11px; '><center>";
                                    echo $exibir7['ConsumoPor'];
                                    echo  '</center></span></td>';
                                    echo  "<td><span style='font-family: Arial; font-size: 11px; '>";
                                    echo $unidadexxxxx;
                                    echo  '</span></td>';



                                    $sql72 = "SELECT sum(TempoOperacao / TempoOperacaoPor) as TempoOperacao FROM GPR_ArtigoOperacoes where Artigo='" . $exibir7['Componente'] . "'";
                                    $executar72 = sqlsrv_query($conn, $sql72);
                                    if ($executar72 <= 0) {
                                    } else {
                                      while ($exibir72 = sqlsrv_fetch_array($executar72)) {
                                        echo '&nbsp;<td><b><font color="red">';
                                        echo $nombre_format_francais = number_format($exibir72['TempoOperacao'] * $exibir7['Consumo'], 2, ',', ' ');
                                        $totalnv7 = $totalnv7 + $exibir72['TempoOperacao'] * $exibir7['Consumo'];
                                        echo '</font></b></td>';
                                      }
                                    }

                                    $component = "";
                                    $text = "";
                                    $textc = "";
                                    $c7 = "";


                                    $sqlp73 = "
                                    SELECT * FROM TDU_ArtigoTempo where Artigo='" . $exibir7['Componente'] . "'
                                    ";
                                    $executarp73 = sqlsrv_query($conn, $sqlp73);
                                    if ($executarp73 <= 0) {
                                    } else {
                                      while ($exibirp73 = sqlsrv_fetch_array($executarp73)) {
                                        $c7 = number_format($exibirp73['Tempo'], 2, ',', ' ');
                                      }
                                    }

                                    echo '&nbsp;<td><b><font color="red">';
                                    if ($c7 == "") {
                                      echo "0,00";
                                    } else {
                                      echo $c7;
                                    }
                                    echo '</font></b></td></tr>';
                                  }
                                }                          
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
        echo "</tbody></table></div></div></div>";
        echo "<br>";
      }
      ?>
      <script>
        $("#platConfig").click(function() {
          $("a[rel^='prettyPhoto[platConfig]']:first").click()
        });


        $("#planeamento").click(function() {
          $("a[rel^='prettyPhoto[planeamento]']:first").click()
        });
      </script>
    </div>
  </div>
</body>

</html>
