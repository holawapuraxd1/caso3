<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Votación de deportes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        header, footer {
            text-align: center;
            margin-bottom: 20px;
        }

        h3, h2 {
            color: #333;
        }

        section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            text-align: center;
            padding: 20px;
            border: 1px solid #cccccc;
            vertical-align: top;
        }

        img {
            width: 150px;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #ganadora {
            font-weight: bold;
            color: #333;
            padding: 10px;
        }

        .resultado {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <h3 id="centrado">VOTACIÓN DE DEPORTES</h3>
        <h2 id="titulo">MEJOR DEPORTE</h2>
    </header>
    <section>
        <?php
        session_start();
        
        // Initialize vote counts if not set
        if (!isset($_SESSION['total'])) {
            $_SESSION['total'] = 0;
            $_SESSION['voly'] = 0;
            $_SESSION['Basquet'] = 0;
            $_SESSION['FUT'] = 0;
            $_SESSION['Tae'] = 0;
        }

        $total = $_SESSION['total'] > 0 ? $_SESSION['total'] : 1; // Avoid division by zero
        $pcandidata1 = $_SESSION['voly'] * 100 / $total;
        $pcandidata2 = $_SESSION['Basquet'] * 100 / $total;
        $pcandidata3 = $_SESSION['FUT'] * 100 / $total;
        $pcandidata4 = $_SESSION['Tae'] * 100 / $total;
        ?>
        <form name="frmVotacion" method="POST" action="conteo2.php">
            <table>
                <tr>
                    <td>
                        <img src="voli.jpg" alt="voly" />
                        <p>VALEYBALL</p>
                        <input type="submit" value="Votar" name="btnBoton1" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['voly']; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata1, 2); ?>%
                    </td>
                    <td>
                        <img src="basquet.jpg" alt="Basquet" />
                        <p>BASQUETBALL</p>
                        <input type="submit" value="Votar" name="btnBoton2" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Basquet']; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata2, 2); ?>%
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="fut.jpg" alt="FUT" />
                        <p>FUTBOL</p>
                        <input type="submit" value="Votar" name="btnBoton3" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['FUT']; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata3, 2); ?>%
                    </td>
                    <td>
                        <img src="tae.jpg" alt="Tae" />
                        <p>TAEKWONDO</p>
                        <input type="submit" value="Votar" name="btnBoton4" /><br>
                        TOTAL DE VOTOS: <?php echo $_SESSION['Tae']; ?><br>
                        PORCENTAJE DE VOTOS: <?php echo round($pcandidata4, 2); ?>%
                    </td>
                </tr>
            </table>
        </form>
        <?php
        $arreglo = array(
            'VALEYBALL' => $_SESSION['voly'],
            'BASQUETBALL' => $_SESSION['Basquet'],
            'FUTBOL' => $_SESSION['FUT'],
            'TAEKWONDO' => $_SESSION['Tae']
        );
        arsort($arreglo);
        reset($arreglo);
        $candidata = key($arreglo);
        $puntaje = current($arreglo);
        ?>
        <div class="resultado">
            <table>
                <tr>
                    <td id="ganadora">TOTAL DE VOTANTES: <?php echo $_SESSION['total']; ?></td>
                </tr>
                <tr>
                    <td id="ganadora">GANADORA: <?php echo $candidata; ?> (<?php echo $puntaje; ?> votos)</td>
                </tr>
            </table>
        </div>
    </section>
    <footer>
        <h5 id="centrado">Todos los derechos reservados @2025 Diseñado por Berenice Dominguez</h5>
    </footer>
</body>

</html>