<?php

$msg = '';

if (isset($_POST['nome']) && isset($_POST['senha'])) {

    $fusoHorario = new DateTimeZone('America/Recife');
    session_start();

    if (isset($_SESSION[$_POST['nome'].$_POST['senha']])) {
        $dateSaida = new DateTime('now', $fusoHorario);
        $dateEntrada = $_SESSION[$_POST['nome'].$_POST['senha']][2];
        $dateDiff = $dateSaida->diff($dateEntrada);
        $msg = $_SESSION[$_POST['nome'].$_POST['senha']][0] . ", <strong style='color:red;'>Saida </strong>Registrada<br/>Horario de Entrada: " . $dateEntrada->format('H:i') . "<br/>Horario de Saida: " . $dateSaida->format('H:i') . "<br/>Intervalo: " . $dateDiff->h . "h " . $dateDiff->i . "m " . $dateDiff->s . "s";

        unset($_SESSION[$_POST['nome'].$_POST['senha']]);

    } else {
        $_SESSION[$_POST['nome'].$_POST['senha']] = array(ucwords($_POST['nome']), $_POST['senha'], new DateTime('now', $fusoHorario));
        $msg = $_SESSION[$_POST['nome'].$_POST['senha']][0] . ", <strong style='color:green;'>Entrada</strong> Registrada";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Contagem de Pontos</title>
    <link rel="stylesheet" href="style.css"/>
    <script defer src="script.js"></script>
</head>
<body>
    <div class="container">

        <h1>Sistema de Contagem de Pontos</h1>

        <form action="#" method="POST">
            <fieldset>
                <p>Digite seu nome e senha para registrar o horario</p>
                <label for="inome">
                    <span class="span-form">Nome</span>
                    <input type="text" name="nome" id="inome" required minlength="3" class="input-form"/>
                </label>
                <label for="isenha">
                    <span class="span-form">Senha</span>
                    <input type="password" name="senha" id="isenha" required minlength="8" class="input-form"/>
                </label>
                <input type="submit" value="Autenticar" class="btn-submit" disabled/>
            </fieldset>
        </form>

        <p class="res">
            <?php echo $msg; ?>
        </p>

    </div>
</body>
</html>
