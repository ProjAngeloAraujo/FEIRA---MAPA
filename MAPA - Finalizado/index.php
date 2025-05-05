<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mapa</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#Mapa').on('click', 'button', function() {
                var local = $(this).data('local');
                $.post('api.php', { tipo: 'local', valor: local }, function() {
                    if (local === 'Patio' || local === 'Biblioteca' || local === 'Auditorio' || local === 'Quadra') {
                        window.location.href = 'trabalho.php';
                    } else {
                        window.location.href = 'sala.php';
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Mapa</h1>
    <div id="Mapa">
        <button data-local="Bloco A">Bloco A</button>
        <button data-local="Bloco B">Bloco B</button>
        <button data-local="Patio">Pátio</button>
        <button data-local="Biblioteca">Biblioteca</button>
        <button data-local="Auditorio">Auditório</button>
        <button data-local="Quadra">Quadra</button>
    </div>
</body>
</html>