
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset = "UTF-8"/>
        <title>Editar Alunos</title>
    </head>

    <body>
    <?php
        if (empty($_POST)) {
            include('cabecalho_conexao.php');

            $pront = $_GET['pront'];

            $SQL = "SELECT * FROM pessoas WHERE id=$pront";
            $query = mysqli_query($con , $SQL);

            if(mysqli_num_rows($query) > 0) {

                while(($resultado = mysqli_fetch_array($query)) != null) {
                    $nome_alterar = $resultado[1];
                    $idade_alterar = $resultado[2];
                    $endereco_alterar = $resultado[3];
                }

                echo '<form action="editar_alunos.php" method="POST">

                    <label> Edite o nome: </label>
                    <input type="text" name="nome_novo" value="'.$nome_alterar.'"/>
                    </br>

                    <label> Edite a idade: </label>
                    <input type="number" name="idade_novo" value="'.$idade_alterar.'"/>
                    </br>

                    <label> Edite o endereco: </label>
                    <input type="text" name="endereco_novo" value="'.$endereco_alterar.'"/>

                    <input type=hidden name="id" value="'.$pront.'"/>
                    <input type="submit" value="Enviar"/>
                    <a href="cons_todos_alunos.php>Voltar</a>
                </form>';
            }
        } else {
            $nome_novo = $_POST['nome_novo'];
            $idade_novo = $_POST['idade_novo'];
            $endereco_novo = $_POST['endereco_novo'];
            $id = $_POST['id'];


            include('cabecalho_conexao.php');

            $SQL = "UPDATE pessoas
                    SET nome='$nome_novo', idade='$idade_novo' , endereco='$endereco_novo'
                    WHERE id=$id";

           include('rodape_conexao.php');
                
 
        }
    
    ?>


    </body>
</html>

