<?php

if(isset($_POST["pais"])){
    
    $pais = $_POST["pais"];

    $url = "https://restcountries.com/v3.1/name/".$pais;

    $res = @file_get_contents($url);

    if($res != false){

        $dados = json_decode($res,true);

        $cap = $dados[0]["capital"][0];
        $reg = $dados[0]["region"];
        $pop = $dados[0]["population"];
        $flag = $dados[0]["flags"]["png"];

        echo "<h2>País: $pais</h2>";
        echo "Capital: $cap <br>";
        echo "Região: $reg <br>";
        echo "População: $pop <br><br>";
        echo "<img src='$flag' width='160'>";
    }
    else{
        echo "Não achei esse país...";
    }
}

?>

<form method="post">
    Digite o país:<br>
    <input type="text" name="pais">
    <button type="submit">Buscar</button>
</form>
