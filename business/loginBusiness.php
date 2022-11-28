<?php
//include '../data/loginData.php';

class LoginBusiness{

    private $loginData;

    public function LoginBusiness() {
        $this->loginData = new LoginData();
    }

   public function ingresar($cedula, $contrasenia) {
       return $this->loginData->ingresar($cedula, $contrasenia);
    }  
    
    
}

?>