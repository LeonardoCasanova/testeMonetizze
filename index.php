<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<br>
<div class="container">
    <center><h1>Gerador de Apostas</h1></center>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
            <label for="exampleFormControlSelect1">Quantidade de Dezenas</label>
            <select class="form-control" name="qteDezenas" required>
                <option selected>Selecione...</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Total de Jogos</label>
        <input class="custom-select" name="totalJogos" required>
    </div>
    <div class="form-group">
    <center><button type="submit" class="btn btn-success">Apostar</button></center>
    </div>
</form>

<br><br>
<table class="table">
<thead>
<tr>
    <th>Números da Cartela</th>
    <th>Resultado do Sorteio</th>
    <th>Dezenas Sorteadas</th>
</tr>
</thead>
<tbody>

    <?php
    require_once('Apostas.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gerador = new Apostas($_POST['qteDezenas'],$_POST['totalJogos']);
        $gerador->gerarJogos();
        $gerador->realizarSorteio();
        $gerador->conferirJogos();
    }
    ?>
</tbody>
</table>
</div>
</body>
</html>
