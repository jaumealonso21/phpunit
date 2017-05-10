<?php

use PHPUnit\Framework\TestCase;

require './classes/Formulari.php';

class FormulariTest extends TestCase {

    public function test_nombre_buit() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->nombre("");
        // Assert
        $this->assertEquals(0, $valida->getResp());
    }

    public function test_nombre_ok() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->nombre("saadasdasd");
        // Assert
        $this->assertEquals(1, $valida->getResp());
    }
    
    public function test_apellidos_buit() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->apellidos("");
        // Assert
        $this->assertEquals(0, $valida->getResp());
    }
    
    public function test_apellidos_ple() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->apellidos("saadasdasd");
        // Assert
        $this->assertEquals(1, $valida->getResp());
    }
    
    public function test_nick_buit() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->nick("");
        // Assert
        $this->assertEquals(0, $valida->getResp());
    }
    
    public function test_nick_ple() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->nick("saadasdasd");
        // Assert
        $this->assertEquals(1, $valida->getResp());
    }
    
    
    
    
    
    
    
    
    public function test_genero_buit() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->genero("");
        // Assert
        $this->assertEquals(0, $valida->getResp());
    }
    
    public function test_genero_home() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->genero("home");
        // Assert
        $this->assertEquals(1, $valida->getResp());
    }
    
    public function test_genero_dona() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->genero("dona");
        // Assert
        $this->assertEquals(2, $valida->getResp());
    }
    
    public function test_password_buit() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->password("");
        // Assert
        $this->assertEquals(0, $valida->getResp());
    }
    
    public function test_password_formatIncorrecte() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->password("46328whsdr784375");
        // Assert
        $this->assertEquals(1, $valida->getResp());
    }
    
    public function test_password_formatCorrecte() {
        // Setup
        $valida = new Formulari;
        // Action
        $valida->password("AZSsd123");
        // Assert
        $this->assertEquals(2, $valida->getResp());
    }
}
