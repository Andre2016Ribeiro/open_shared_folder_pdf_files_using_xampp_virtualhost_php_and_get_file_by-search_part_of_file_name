<?php 
    
// File to be read 
$file = "Z:/PG 3 - Concepcao e Desenvolvimento/02 - Desenhos Arquivo/Producao/Nivel 0 - Tubos Maquinados/Linha 1/0TAJI0SNARD08_Aj-Sanita Artic-Varão Inox D8mm (Brt)/0TAJI0SNARD08_001_N01.PDF"; 
  
// Opening file 
$f = fopen($file, "r") or 
    exit("Unable to open file!"); 
  
// Read file line by line until 
// the end of file (feof) 
while(!feof($f)) { 
    echo fgets($f)."<br />"; 
} 
  
// Closing file 
fclose($f); 
?> 