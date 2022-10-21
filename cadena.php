<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Aparatado a) </h1>

        <form
            method="POST"
            >
            <p>
                <label for="cadena">Introduzca una cadena que incluya números separados por espacios:</label>
                <input type="text" size="40" name="cadena" required id="cadena">
            </p>
            <p>
                <input type="submit" value="Ordenar">
            </p>
        </form>
        <?php

        function filtrar($valor) {
            return ($valor != "");
        }

        if (isset($_POST["cadena"])) {
            $cadena = $_POST["cadena"];
//            if(is_numeric($cadena)){
//                echo "Es numérica: $cadena";
//            }
            if (trim($cadena) != "") {
                $array_cadena = explode(" ", $cadena);
                //var_dump($array_cadena);

                $valido = true;
                for ($i = 0; $i < count($array_cadena); $i++) {
                    if ($array_cadena[$i] != "" && !is_numeric($array_cadena[$i])) {
                        $valido = false;
                        break;
                    }
                }
                if (!$valido) {
                    echo "No es una cadena válida<br/>";
                } else {
                    $array_cadena = array_filter($array_cadena, "filtrar");
                    sort($array_cadena);

                    $cadena_ordenada = implode(",", $array_cadena);
                    echo "Los números ordenados son: $cadena_ordenada<br/>";
                }
            } else {
                //Todos espacios
                echo "No es una cadena válida<br/>";
            }
        }
        ?>
    </body>
</html>
