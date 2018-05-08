
<html>

    <head>
        <link href="estilo.css" rel="stylesheet">    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
            $('#aluno').change(function(){
                //Selected value
                var inputValue = $(this).val();      
                $("#content").load('preenche_questoes.php?id='+inputValue);
                //alert("value in js "+inputValue);

                //Ajax for calling php function
                /*$.post('submit.php', { dropdownValue: inputValue }, function(data){
                    alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
                });*/
            });
        });
        </script>

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

$result=mysql_query("SELECT * FROM aluno") or die("Impossível executar a query"); 

$options = array();

while($row=mysql_fetch_object($result)) { 

   $options []= "<option value='$row->id'> $row->nome </option>";
} 

$select = '<select id="aluno">' . implode("\n", $options) . '</select>';

echo $select;

?>

        <div id="content"></div>

</body>

</html>