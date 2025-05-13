<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Salas - <?= htmlspecialchars($_SESSION['local'] ?? '') ?></title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.get('api.php', { tipo: 'salas' }, function(res) {
                $('#salas').html(res);
            });

            $('#salas').on('click', 'button', function() {
                var sala = $(this).data('sala');
                $.post('api.php', { tipo: 'sala', valor: sala }, function() {
                    window.location.href = 'trabalho.php';
                });
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
    <h1>Salas - <?= htmlspecialchars($_SESSION['local'] ?? '') ?></h1>
    <div id="salas"></div>
</body>
</html>