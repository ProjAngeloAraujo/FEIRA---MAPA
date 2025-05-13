<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Trabalho - <?= htmlspecialchars($_SESSION['local'] ?? '') ?> <?= isset($_SESSION['sala']) ? '- ' . htmlspecialchars($_SESSION['sala']) : '' ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('api.php', { tipo: 'stands' }, function(res) {
                $('#Mapa').html(res);
            });
        });
    </script>
</head>
<body>
    <header>
        <img src="images/mcm-logo.png" alt="logo-etec">
        <h1>Mapa</h1>
        <img src="images/cps-logo.png" alt="logo-cps">
    </header>
    <h1>Trabalho - <?= htmlspecialchars($_SESSION['local'] ?? '') ?> <?= isset($_SESSION['sala']) ? '- ' . htmlspecialchars($_SESSION['sala']) : '' ?></h1>
    <div id="Mapa"></div>
</body>
</html>