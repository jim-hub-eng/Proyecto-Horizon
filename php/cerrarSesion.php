<?php

    session_start(); #inicia sesion
    session_destroy(); #destruye la sesion

    #te manda al login
    header("location: ../index.php");

?>