<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form
            method="POST"
            >
            <p>
                <label for="dni">Introduzca su dni:</label>
                <input type="text" size="10" name="dni" required id="dni">
            </p>
            <p>
                <input type="submit" value="Validar">
            </p>
        </form>
        <?php
        const DIGITOS_LENGTH = 8;
        const DIVISOR_DNI = 23;
        const LETRAS_DNI = "TRWAGMYFPDXBNJZSQVHLCKE";

        if (isset($_POST["dni"])) {
            $dni = $_POST["dni"];
            if(isValid($dni)){
                echo "El dni es válido";
            }
            else{
                echo "El dni NO es válido";
            }
        }

        function isValid(string $dni):bool {
            $nums = substr($dni, 0, DIGITOS_LENGTH);
            if (is_numeric($nums)) {
                if (strpos($dni, "-")==8) {
                    $letraEntrada = substr($dni, -1);
                    $letraDNI = getLetraDNI($nums);
                    return (strcmp($letraDNI, strtoupper($letraEntrada)) == 0);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        function getLetraDNI($nums) {
            $resto = $nums % DIVISOR_DNI;
            $letra = substr(LETRAS_DNI, $resto, 1);
            return $letra;
        }
        ?>
    </body>
</html>
