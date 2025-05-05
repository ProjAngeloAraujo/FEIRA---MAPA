<?php
session_start();

$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? '';
$valor = $_POST['valor'] ?? $_GET['valor'] ?? '';

$link = mysqli_connect("localhost", "root", "", "Feira");
if (!$link) {
    exit('Erro na conexão com o banco.');
}

if ($tipo === 'local') {
    $_SESSION['local'] = $valor;
    unset($_SESSION['sala']); // limpa sala anterior
    echo 'ok';
    exit;
}

if ($tipo === 'sala') {
    $_SESSION['sala'] = $valor;
    echo 'ok';
    exit;
}

if ($tipo === 'salas') {
    $local = $_SESSION['local'] ?? '';
    if (in_array($local, ['Bloco A', 'Bloco B'])) {
        for ($i = 1; $i <= 8; $i++) {
            echo "<button data-sala='Sala $i'>Sala $i</button><br>";
        }
    } elseif ($local === 'Patio') {
        for ($i = 1; $i <= 7; $i++) {
            echo "<button data-sala='Pátio $i'>Pátio $i</button><br>";
        }
    } elseif (in_array($local, ['Biblioteca', 'Auditorio', 'Quadra'])) {
        echo "<button data-sala='$local'>$local</button><br>";
    }
    exit;
}

if ($tipo === 'stands') {
    $local = $_SESSION['local'] ?? '';
    $sala = $_SESSION['sala'] ?? $local; // se sala não foi escolhida, usa o próprio local

    $query = "SELECT posicao, nome_stand FROM stand WHERE bloco = '$local' AND sala = '$sala'";
    $res = mysqli_query($link, $query);
    if (!$res) {
        echo "Erro ao buscar stands.";
        exit;
    }

    $stands = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $stands[$row['posicao']] = $row['nome_stand'];
    }

    $max = 8;
    if ($local === 'Patio') $max = 7;
    if (in_array($local, ['Biblioteca', 'Auditorio', 'Quadra'])) $max = 16;

    for ($i = 1; $i <= $max; $i++) {
        $nome = $stands[$i] ?? 'Stand vazio';
        echo "<div><h3>Stand $i</h3><p>$nome</p></div>";
    }

    exit;
}
?>