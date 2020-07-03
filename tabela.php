<?php
    $servername = "localhost";
    $database = "vendas";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("conexão falhou: " . mysqli_connect_error());
    }   

    # Executa a query desejada $query = "SELECT codigo,nome,endereco FROM tabela"; 
    $query = "SELECT * FROM vendas";
    $result_query = mysqli_query($conn, $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() );
    

?>

<!DOCTYPE html>
<html>
<head>
	<style>
        h2{
            color: #777;
            text-align: center;
            text-transform: uppercase;
        }
        table{
            width: 100%;
            margin: 0 auto;
        }
        table, th, td {
            border: 1px solid #c1c1c1;
            border-collapse: collapse;
        }
    	thead{
        	background-color: #2dc5fd;
        }
        thead th{
            padding: 20px 0px;
            text-transform: uppercase;
            color: white;
            text-align: center;
        }
        tbody{
            background-color: #f5f5f5;
            color: black;
            text-align: center;
            border: 1px solid black;
        }
        tbody td{
            padding: 10px 0px;
        }
    </style>
</head>
<body>
    <h2>PEDIDOS</h2>

<table id='table'>
        <thead>
            <tr>
                <th>Produto</th>
                <th>Descrição</th> 
                <th>Pedido</th>
                <th>Unidade</th>
                <th>Quantidade</th>
                <th>Pacote</th>
            </tr>
        </thead>
        <tbody>
           
            <?php while ($dado = mysqli_fetch_array($result_query)){ ?>
            <tr>
                <td><?=$dado['produto']?></td>
                <td><?=$dado['nome']?></td>
                <td><?=$dado['pedido']?></td>
                <td><?=$dado['unidade']?></td>
                <td><?=$dado['quantidade']?></td>
                <td>
                    <?php
                        if($dado['unidade'] == "KG"){

                            $pacote = $dado['quantidade']/25;
                            echo $pacote ." PACOTES"; 
                        } 
                        if($dado['unidade'] == "ML"){

                            $pacote = $dado['quantidade']/8;
                            echo $pacote . " MILEIROS";
                        } 
                    ?>
                </td>
            </tr>
            <?php }?>
            </tbody>
    </table>
</body>
</html>


<?php
/*
require __DIR__.'/vendor/autoload.php';

$dompdf = new Dompdf\Dompdf();
$dompdf->loadhtml($html);
$dompdf->setPaper('A4', 'portrait'); /*Tamanho da página e a orientação*/ 
//$dompdf->render(); /* renderiza o pdf*/

//$dompdf->stream(); /* oferece para o navegador*/

/*Salva o arquivo na raiz do diretório*/
//file_put_contents('relatorio.pdf', array('Attachment' => false), $dompdf->output());



//mysqli_close($conn);


?>
