<?php

    include('cabecalho_conexao.php');

    $ra = $_GET['ra'];

    $SQL = "SELECT * FROM pessoas WHERE id = $ra";

    $dados_recuperados= mysqli_query($con, $SQL);
    
    if(mysqli_num_rows($dados_recuperados)>0) {
        echo "<table border='1'>
				<tr>
					<th>Prontuario</th>
					<th>Nome</th>
					<th>Idade</th>
					<th>Endereco</th>
					<th colspan='2'>Operacoes</th>
				  </tr>";

        while(($resultado = mysqli_fetch_assoc($dados_recuperados))!=null) {
            echo "<td> ".$resultado['id'] . "</td>
                    <td>" . $resultado['nome'] . " </td>
                    <td>" . $resultado['idade'] . " </td>
                    <td> <a href='editar_alunos.php?pront=" .$resultado['id']. "'>Editar</a> </td>
                    <td><a href='remover_aluno.php?pront=" .$resultado['id']. "'>Remover</a><br/></td>";
        }    
        echo "</table>";

    } else {
        echo "Esse RA não está cadastrado.";
        echo mysqli_error($con);
    }

    mysqli_close($con);


?>