<?php

class Formulari {

    private $resp;
    
//    public $errors = ["Está vacío", "Sólo caracteres", "La fecha no es correcta",
//        "Eres menor de edad", "El formato del password no es correcto"];
    
    public function getResp() {
        return $this->resp;
    }

    public function nombre($nombre) {
        if ($nombre === "") {
            $this->resp = 0;//Buit
        } elseif (ctype_alpha($nombre)) {//Només lletres i espais
            $this->resp = 1;
        }
    }

    public function apellidos($apellidos) {
        if ($apellidos === "") {
            $this->resp = 0;//Buit
        } elseif (ctype_alpha($apellidos)) {//Només lletres i espais
            $this->resp = 1;
        }
    }

    public function nick($nick) {
        if ($nick === "") {
            $this->resp = 0;//Buit
        } else {
            $this->resp = 1; //Pot contenir lletres i números
        }
    }

    //-------------------Estás aquíiiiiiiiiiiiiiiiii---!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function date($date) {
        if ($date === "") {
            $this->resp = 0;//Buit
        } else {
            list($dia, $mes, $any) = explode("/", $date);
            $verifDate = checkdate($mes, $dia, $any); //month, day, year
            if ($verifDate) {
                $any_dif = date("Y") - $any;
                $mes_dif = date("m") - $mes;
                $dia_dif = date("d") - $dia;
                if ($any_dif < 18) {
                    $this->resp = 1; //Menor d'edat
                } elseif ($any_dif === 18) {//Comprovem mesos
                    if ($mes_dif < 0) {
                        $this->resp = 2; //Menor d'edat
                    } elseif ($mes_dif === 0) {//Comprovem dies
                        if ($dia_dif < 0) {
                            $this->resp = 3; //Menor d'edat
                        }
                    }
                }
            } else {
                $this->resp = 4; //Data incorrecta
            }
        }
    }

    public function genero($genero) {
        if (!$genero) {//No hi ha res
            $this->resp = 0;
        } else {
            switch ($genero) {
                case "home":
                    $this->resp = 1;
                    break;
                case "dona":
                    $this->resp = 2;
                    break;
            }
        }
    }

    public function password($password) {
        if (!$password) {//No hi res
            $this->resp = 0;
        } else {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);

            if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
                $this->resp = 1; //Format no correcte
            } else {
                $this->resp = 2; //Tot correcte
            }
        }
    }

}
