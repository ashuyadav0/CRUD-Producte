<?php

#################### PARÀMETRES DE LA CONNEXIÓ ####################
    # Connecta amb la BD M2 MySQL local

    # Nom del servidor local
    switch($_SERVER['SERVER_NAME']){
        case "localhost": 
            define("SERVER_NAME", "localhost");
            define("USER_NAME", "root");
            define("PASSWORD", "");
            define("DB_NAME", "productes");
            break;
        case "phpashu.rf.gd": 
            define("SERVER_NAME", "sql301.epizy.com");
            define("USER_NAME", "epiz_30985883");
            define("PASSWORD", "Nz5meTF30I");
            define("DB_NAME", "epiz_30985883_productes");
            break;
    }

    # Data Source Name: string de conneció creat a partir dels valors anteriors
    # Molt important charset: indica codificació amb que s'envia o es rep 
    # dades de la BD
    define("DSN", "mysql:host=" . SERVER_NAME . ";dbname=" . DB_NAME . ";charset=utf8mb4");
    
?>
