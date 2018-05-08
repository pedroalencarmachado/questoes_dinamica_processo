
<html>

    <head>
        <link href="estilo.css" rel="stylesheet">    
    </head>

<body style="background-color:#D3E7EB;">

<?php

$host = "localhost:3306"; 
$username = "root"; 
$password = ""; 
$db = "processo_dinamica";

/*
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$db = "alugaai"; 
*/



mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

@mysql_select_db($db) or die("Impossível conectar ao banco"); 

$result=mysql_query("SELECT * FROM aluno JOIN questao ON (aluno.id = questao.fk_aluno)") or die("Impossível executar a query"); 

echo " <table style='width:100%'>
                <tr>
                    <th style='width:50%'>Aluno</th>
                    <th style='width:25%'>Questão</th>
                    <th style='width:25%'>Acerto</th>
                </tr>";

while($row=mysql_fetch_object($result)) { 
    echo " <tr>       

                <td> $row->nome </td>
                <td> $row->numero </td>
                <td> $row->acerto </td>

            </tr>"; 
} 

echo "</table>";

?>

</body>

</html>