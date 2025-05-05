<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
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
    <h1>Trabalho - <?= htmlspecialchars($_SESSION['local'] ?? '') ?> <?= isset($_SESSION['sala']) ? '- ' . htmlspecialchars($_SESSION['sala']) : '' ?></h1>
    <div id="Mapa"></div>
</body>
</html>