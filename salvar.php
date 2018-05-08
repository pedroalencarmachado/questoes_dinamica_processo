
<html>

    <head>

        <link href="estilo.css" rel="stylesheet">            

    </head>

<body style="background-color:#D3E7EB;">
     
    <?php    
        //Extraindo PATH_INFO
        $aluno = $_POST['aluno'];
        $pontos = $_POST['ponto'];
        //$arr = parse_url($url);
        //echo $aluno;

        $host = "localhost:3306"; 
        $username = "root"; 
        $password = ""; 
        $db = "processo_dinamica";    
        
       mysql_connect($host,$username,$password) or die("Impossível conectar ao banco."); 

        @mysql_select_db($db) or die("Impossível conectar ao banco"); 
        

        $sql = "UPDATE aluno SET ponto=".$pontos."WHERE id=".$aluno;


        $result=mysql_query($sql) or die(mysql_error());

        if (!$result) {
            echo mysql_error();
        } else {
            echo "PONTOS: ".$pontos;
        }
       
    ?>        
        


</body>

</html>