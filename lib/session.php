<?php


/* Gestionamos las sesiones*/ 

class Session{

    private $session = NULL;
    
    public function __construct($session_name){
    /* Creamos una nueva sesión a partir del nombre que le pasamos por parametro */
        session_start();

        if(!isset($_SESSION[$session_name])){
            $_SESSION[$session_name] = NULL;
            //echo "Sesión $session_name creada";
        }
        //echo "Sesión $session_name ya existe";
        
        $this->session = $session_name;
    }

    public function setValue($value){
        $_SESSION[$this->session] = $value;
    }

    public function getValue(){
        return $_SESSION[$this->session];
    }
}

?>