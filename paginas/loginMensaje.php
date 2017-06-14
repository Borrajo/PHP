<?php
 if( isset($_GET['login']) ) //Corroboramos que exista un parametro con el nombre 'mensaje' enviado por metodo GET
    {
                if (is_numeric($_GET['login']))
                $id_mensaje = $_GET['login'];
    }
    else
    {
        $id_mensaje = -1;
    }
?>