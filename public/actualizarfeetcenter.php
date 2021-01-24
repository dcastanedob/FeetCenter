<?php
    /************************ YOUR DATABASE CONNECTION START HERE   ****************************/
  
    define ("DB_HOST", "127.0.0.1"); // set database host
    define ("DB_USER", "feetcent_admin"); // set database user
    define ("DB_PASS","3TZ7dyGs"); // set database password
    define ("DB_NAME","feetcent_feetcenter"); // set database name
    
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die("Couldn't make connection.");
    $db = mysqli_select_db( $link,DB_NAME) or die("Couldn't select database");
    
    $sql = "SELECT paciente_nombre,idpaciente from paciente";
    $result = mysqli_query($link,$sql);
    
    /// empieza bloque para el primer nivel
        // output data of each row
        while($pacientes = mysqli_fetch_assoc($result))
        {
            
            $nombre= $pacientes["paciente_nombre"];
            $cadena = explode (",", $nombre);
            echo $cadena[0]." - ".$cadena[1];
           
            
            
            
            $insertTable= mysqli_query($link, "update paciente set paciente_ap='$cadena[0]', paciente_name='$cadena[1]' where idpaciente=".$pacientes['idpaciente']);
            if(!$insertTable)
            {
                die('Could not enter data 1 : ' . mysql_error());
            }
            
        }
    
?>