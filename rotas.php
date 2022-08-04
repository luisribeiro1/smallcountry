<?php

// $rota[1] = array();
// $rota[2] = array();

// array_push($rota[1],"Goiabeira");
// array_push($rota[1],"Casa");
// array_push($rota[1],"Represa");
// array_push($rota[2],"Goiabeira");
// array_push($rota[2],"Pedra");
// array_push($rota[2],"Pedrinha");
// array_push($rota[2],"Represa");

// var_dump($rota);


$con = "Goiabeiras;Casa|Goiabeiras;Pedra|Pedra;Casa|Pedra;Represa|Casa;Represa";
$con2 = explode("|",$con);
$origem = "Goiabeiras";
$destino = "Represa";
$contador = 1;
foreach($con2 as $rotas){
      $city = explode(";",$rotas);
      if($city[0]==$origem){

            $retorno = $origem;
            $fim = false;
            //$rotaAtual = array();
            $rota[$contador] = array();
            while($fim==false){
                  //echo "Começo: $retorno -> ";
                  //$rotaAtual[] = $retorno;
                  array_push($rota[$contador],$retorno);
                  //$retorno = acharProximo($retorno,$con,$rotaAtual);
                  $retorno = acharProximo($retorno,$con,$rota,$contador);
                  //echo "$retorno<br>";
                  if($retorno==$destino){
                        $fim=true;
                        $contador+=1;
                  }
            }
            
      }
}

function acharProximo($atual,$array,$rota,$contador){

      var_dump($rota);

      $rr = explode("|",$array);
      foreach($rr as $destinos){
            $city = explode(";",$destinos);
            if($city[0]==$atual){
                  $proximo = $city[1];
                  $achou = false;
                  foreach($rota[$contador] as $locais){
                        //echo "Local: $locais<br>";
                        //var_dump($locais);
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
                  foreach($rota[$contador] as $locais){
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