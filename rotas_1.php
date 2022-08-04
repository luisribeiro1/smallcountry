<?php

$principal = array();
$um = array();
$dois = array();

// array_push($um,"Goiabeira");
// array_push($um,"Casa");
// array_push($um,"Represa");
// array_push($dois,"Goiabeira");
// array_push($dois,"Pedra");
// array_push($dois,"Represa");
// array_push($principal,$um);
// array_push($principal,$dois);
// foreach($principal as $unidade){
      
// }


$con = "Goiabeiras;Casa|Goiabeiras;Pedra|Pedra;Casa|Pedra;Represa|Casa;Represa";
$con2 = explode("|",$con);
$origem = "Goiabeiras";
$destino = "Represa";

foreach($con2 as $rotas){
      $city = explode(";",$rotas);
       //echo "{$city[0]} até {$city[1]} <br>";
      if($city[0]==$origem){

            $retorno = $origem;
            $fim = false;
            $rotaAtual = array();
            while($fim==false){
                  echo "Começo: $retorno -> ";
                  $rotaAtual[] = $retorno;
                  $retorno = acharProximo($retorno,$con,$rotaAtual);
                  echo "$retorno<br>";
                  if($retorno==$destino){
                        $fim=true;
                  }
            }
            
      }
}

function acharProximo($atual,$array,$rota){

      $rr = explode("|",$array);
      foreach($rr as $destinos){
            $city = explode(";",$destinos);
            if($city[0]==$atual){
                  $proximo = $city[1];
                  $achou = false;
                  foreach($rota as $locais){
                        //echo "Local: $locais<br>";
                        if($proximo==$locais){
                              $achou=true;
                        }
                  }
                  if($achou==false){
                        return $proximo;
                        exit;
                  }

            }
            if($city[1]==$atual){
                  $proximo = $city[0];
                  $achou = false;
                  foreach($rota as $locais){
                        if($proximo==$locais){
                              $achou=true;
                        }
                  }
                  if($achou==false){
                        return $proximo;
                        exit;
                  }

            }            
      }
      return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      
</body>
</html>