<prep>
    <?php
    if (isset($_FILES['arquivo'])) {
        //envio de unico arquivo
        // $nome = $_FILES['arquivo']['name'];
        // //envio de varios arquivos
        // $nome[] = $_FILES['arquivo']['name'];
        if (count($_FILES['arquivo']['tmp_name']) > 0) {

            for ($i = 0; $i < count($_FILES['arquivo']['tmp_name']); $i++) {

                $nomeArquivo = md5($_FILES['arquivo']['tmp_name'][$i] . time() . rand(0, 999));
                move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], 'arquivos/' . $nomeArquivo);
            }
        }
    }

    ?>
</prep>


<form method="post" enctype="multipart/form-data" action="recebedor.php">
    <input type="file" name="arquivo[]" multiple /><br><br><br>

    <input type="submit" value="Enviar Arquivos" />

</form>