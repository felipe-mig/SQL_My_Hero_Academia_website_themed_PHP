<?php

// Database connection
function dbLink(){
    $dbHost ="localhost";
    $dbUser = "mri";
    $dbPassword="password";
    $db ="ictdbs507_41";

    $mysqli = new mysqli($dbHost,$dbUser,$dbPassword,$db);

    if($mysqli->connect_errno){
        echo 'Failed to connect: '.$mysqli->connect_error;
    }
   error_reporting(0);
    return $mysqli;
}

// shows what's in the memory
function showMem(){
    echo '<div style="background-color:  #1F1F1F; height: auto; width:12.5vw; border-top: 2.5px solid #000000; border-right: 5px solid #000000; border-bottom: 5px solid #000000; border-left: 2.5px solid #000000;  display: flex; justify-content: center;  margin-left: 10vw; margin-top: 2vh; margin-bottom: 1vh;  color: #D7DDDD; border-radius: 10px; position: fixed;">';
        echo '<pre>';
        echo '<br>';
        echo '<h4 style="color:#F92672; font-size: 1.2em;">SHOW MEMORY</h4>';
        echo '<br>';
        echo '<h4 style="color:#A6E22E;">Get Memory</h4>';
        print_r($_GET);
        echo '<br>';
        echo '<h4 style="color:#A6E22E;">Post Memory</h4>';
        print_r($_POST);
        echo '<br>';
        echo '<h4 style="color:#A6E22E;">Session Memory</h4>';
        print_r($_SESSION);
        echo '<br>';
        echo '</pre>';
        echo '<br>';
    echo '</div>';    
}

// LOGIN
// Validate user
function validateUser($dbConnect,$uname, $pwd){
    $sql = "SELECT * FROM users";
    $result = mysqli_query($dbConnect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            #utiliza dos == porque esta comparando que la columna 'user' sea exactamente igual a la variable $uname. Si son iguales devuleve true.
            if($row['user'] == $uname){
                if($row['password'] == $pwd){
                    # El operador = se usa para asignar un valor a una variable.
                    # Aqui, = se usa para asignar el valor de $row['id'] a $_SESSION['id']. Esto almacena el ID del usuario en la sesion.
                    $_SESSION['id'] = $row['id'];
                    # Esto autentifica la sesion 
                    $_SESSION['authenticate'] = 'yes';
                    return true;
                }
            }
        }
    }
}

// CREATE power
function insertPower($dbConnect,$quirkName,$quirkDesc,$quirkUser){
    $sql="INSERT INTO quirks (id, quirkName, quirkDesc, quirkUser) VALUES(NULL,'$quirkName','$quirkDesc','$quirkUser')";
    if(mysqli_query($dbConnect,$sql)){
        echo 'Power Added';
    }else {
        echo 'Error: '.$dbConnect->error;
    }

}

// READ the created power
function viewCreatedPowers($dbConnect){
    $sql="SELECT * FROM quirks";
    $result = mysqli_query($dbConnect,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo '
            <br>
            <form  class="viewPowersForm">
                <br>
                <input id="inputPF" value="'.$row['quirkName'].'"><br>
                <textarea class="textareaPF">'.$row['quirkDesc'].'</textarea><br>
                <input id="inputPFUser" value="User"><br>
                <textarea class="textareaPF" style="height: 9vh;">'.$row['quirkUser'].'</textarea><br><br>
            </form>
            <br>
            ';
        }
    }
}

?>