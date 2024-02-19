<!DOCTYPE HTML>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</style>
</head>
<title>Pesquisa de bilhetagem</title>
<body>



<h2> Pesquisa de bilhetagem em MariaDB</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
Data Inicial: <input type="date" name="data_ini">
Data Final: <input type="date" name="data_fim">
Origem: <input type="text" name="origem">
Destino: <input type="text" name="destino">

<input type="submit">
</form>


<?php

include "classebanco.php";

   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $dataIni = $_POST["data_ini"];
   $dataFim = $_POST["data_fim"];
   $origem = $_POST["origem"];
   $destino = $_POST["destino"];
   
  
   $conexao = new conexao_astersk();
   $conexao->conectar();

   $sql =  "select src, dst, calldate, answer, end, duration, billsec, disposition from cdr WHERE 1=1";
   if (!empty($dataIni)){
     $sql = $sql." AND calldate >= '". $dataIni ." 00:00:00'";
   }
   if (!empty($dataFim )){
     $sql = $sql." AND calldate <= '". $dataFim ." 00:00:00'";
   }
   if (!empty($origem )){
     $sql = $sql." AND src = '". $origem  ."'";
   }
   if (!empty($destino )){
     $sql = $sql." AND dst = '". $destino ."'";
   }
   


   $query = $conexao->open_query($sql);

   $query->bind_result($src, $dst, $calldate, $answer, $end, $duration, $billsec, $disposition);

//   $row = $query->get_result();

   echo "<h4> Resultado </h4>";

   echo "<table>";
   echo "<tr><th>Origem</th><th>Destino</th><th>Data</th><th>Atendida</th><th>Término</th><th>Duração</th><th>Bilhetagem</th><th>Status</th></tr>";

    while ($query->fetch()) {
        echo "<tr><td>".$src."</td><td>".$dst."</td><td>".$calldate."</td><td>".$answer."</td><td>".$end."</td><td>".$duration."</td><td>".$billsec."</td><td>".$disposition ."</td></tr>";
    }

   $conexao->fechar(); 

   echo "</table>";
}

?>

</body>
</html>