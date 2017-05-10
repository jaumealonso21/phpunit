<?php

$enviar = filter_input(0, 'submit'); //El 0 és INPUT_POST
$errorNom = $errorApellidos = $errorNick = $errorDate = $errorGenero = $errorPassword = "";
$checkH = $checkD = ""; //Evita errors

if (isset($enviar)) {
    $errors = ["Está vacío", "Sólo caracteres", "La fecha no es correcta",
        "Eres menor de edad", "El formato del password no es correcto"];

    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nick = filter_input(INPUT_POST, 'nick', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $date = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $genero = filter_input(INPUT_POST, 'genero');
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($nombre === "") {
        $errorNom = $errors[0];
    } elseif (!ctype_alpha($nombre)) {//Només lletres i espais
        $errorNom = $errors[1];
    }
    if ($apellidos === "") {
        $errorApellidos = $errors[0];
    } elseif (!ctype_alpha($apellidos)) {//Només lletres i espais
        $errorApellidos = $errors[1];
    }
    if ($nick === "") {
        $errorNick = $errors[0];
    }//Pot contenir lletres i números
    if ($date === "") {
        $errorDate = $errors[0];
    } else {
        list($dia, $mes, $any) = explode("/", $date);
        $verifDate = checkdate($mes, $dia, $any); //month, day, year
        if ($verifDate) {
            $any_dif = date("Y") - $any;
            $mes_dif = date("m") - $mes;
            $dia_dif = date("d") - $dia;
            if ($any_dif < 18) {
                $errorDate = $errors[3]; //Menor d'edat
            } elseif ($any_dif === 18) {//Comprovem mesos
                if ($mes_dif < 0) {
                    $errorDate = $errors[3]; //Menor d'edat
                } elseif ($mes_dif === 0) {//Comprovem dies
                    if ($dia_dif < 0) {
                        $errorDate = $errors[3]; //Menor d'edat
                    }
                }
            }
        } else {
            $errorDate = $errors[2]; //Data incorrecta
        }
    }
    if (!$genero) {//No hi ha res
        $errorGenero = $errors[0];
    } else {//Deixar activat el botó seleccionat
        switch ($genero) {
            case "home":
                $checkH = "checked";
                $checkD = "";
                break;
            case "dona":
                $checkH = "";
                $checkD = "checked";
                break;
            default:
                $checkH = $checkD = false;
                break;
        }
    }
    if (!$password) {//No hi res
        $errorPassword = $errors[0];
    } else {
        //^: anchored to beginning of string
        //\S*: any set of characters
        //(?=\S{8,}): of at least length 8
        //(?=\S*[a-z]): containing at least one lowercase letter
        //(?=\S*[A-Z]): and at least one uppercase letter
        //(?=\S*[\d]): and at least one number
        //$: anchored to the end of the string

        $expr = '^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$';
        //Em dóna error, falta una opció a filter_var,,,investigar més endavant
//        if (!filter_var($password, FILTER_VALIDATE_REGEXP, $expr)) {
//            $errorPassword = $errors[4];
//        }
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);

        if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $errorPassword = $errors[4];
        }
    }
} else {//Evita errors, formulari no enviat
    $nombre = "";
    $apellidos = "";
    $nick = "";
    $date = "";
    $genero = "";
    $checkH = $checkD = "";
    $password = "";
}
?>
