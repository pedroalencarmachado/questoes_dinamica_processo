
<html>

    <head>

        <link href="estilo.css" rel="stylesheet">            

    </head>

<body style="background-color:#D3E7EB;">

    <form action="salvar.php" method="post"  id="form">

    <?php    
        //Extraindo PATH_INFO
        $url = $_GET['id'];
        //$arr = parse_url($url);
        //echo $url;

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

        $resultAluno=mysql_query("SELECT * FROM aluno where id=".$url);

        $row=mysql_fetch_object($resultAluno);

        echo "<h3>Pontuação: $row->ponto</h3>";


        $result=mysql_query("SELECT * FROM questao where fk_aluno=".$url) or die("Impossível executar a query"); 

        echo "<input type='hidden' id='aluno' name='aluno' value=$url /> ";

        echo "<table style='width:50%'> 
                 <tr>
                    <th style='width:30%'>Numero</th>                    
                </th>";

        while($row=mysql_fetch_object($result)) { 

           echo  "<tr>       
                    <td>$row->numero</td>                    
                </tr>";
        }     
        echo "Pontuação: <input type='text' id='ponto' name='ponto'><br/><br/>"        
    ?>        
    
    
    <input type="submit" value="Salvar" onsubmit=""/>
    
    </form>

</body>

</html>