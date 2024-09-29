<?php
    session_start();
    include_once('../functions/functions.php');
    $dbConnect = dbLink();
    if($dbConnect){
        echo '<!-- Connection Established -->';
    }

    // showMem();

        // Logout
    # Este 'logout' viene de <a href="../index.php?logout=logout">[ Logout ]</a> que tenemos en el file dashboard.php
    if($_GET['logout'] == 'logout'){
        # Session_unset() tells the browser to remove the current session id.
        session_unset();
        # session_destroy() clears the session cache.
        session_destroy();
        # session_regenerate_id() creates a new session id for the next person logging in.
        session_regenerate_id();
    }
        //Validation 
        $uname = $_POST['name'];
        $pwd = $_POST ['pwd'];
    
        # This is the POST MEMORY, in other words, the info that we are sending from our form in login.php
        # We have <input name="name"> 
        
        if ($_POST['name'] != NULL) {
            $validateUsername = true;
        } else {
            $validateUsername = false;
        }
        
        # This is the POST MEMORY, in other words, the info that we are sending from our form in login.php
        # We have <input name="pwd"> 
        if ($_POST['pwd'] != NULL) {
            $validatePassword = true;
        } else {
            $validatePassword = false;
        }
    
        # Esto autentifica la sesion 
        # This is the SESSION MEMORY, in other words, the info that we have in all our navigation time through the website
        if($_SESSION['authenticate'] == 'yes'){
            $validate = true;
            } else if ($validateUsername && $validatePassword) {
            $validate = validateUser($dbConnect,$uname, $pwd);
            }
            
        # Esta es la SESSION MEMORY, es decir, la info que tenemos en nuestra database, mas concretamente en nuestra tabla 'users' en las columna 'id'
        # Esto esta verificando que la info que metimos en <input name="name"> y <input name="pwd"> que enviamos en el archivo login.php , coincide exactamente con la que tenemos en nuestra database, mas concretamente esta diciendo que si nuestra columna 'id' es NULL no valide. else valida como true
        if($_SESSION['id']==NULL){
        $uname = $_POST['name'];
        $pwd = $_POST['pwd'];
        $validate = validateUser($dbConnect,$uname, $pwd);
        }else{
        $validate=true;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @font-face {
            font-family: shin;
            src: url(../fonts/AOTFShinGoProRegular.otf)
        }
    </style>
</head>
<body> 
    <header>
            <!-- Logo -->
            <a href="../index.php"><div class="logo-container"></div></a>
            <!--nav-list-->
            <nav>
                <ul>
                    <li><a href="../index.php">home</a></li>
                    <?php
                    ?>
                </ul>
            </nav>
    </header>
    <?php
    showMem();
    ?>
        <div class="login_header_logo"></div>
        <form action="dashboard.php" method="post" style="margin-bottom: 22.25vh;">
                <input type="text" name="name" value="" class="name-text" placeholder="Username">
                <input type="password" name="pwd" value="" class="text" placeholder="Password">
                <span id="login-span"></span>
                <div class="login-form-logo"></div>
                <input type="submit" value="Log in" id="login-submit-button">
        </form>
            <br>
            <br>
        <footer style="margin-top: 5vh;">
        <br>
            <!--social media-->
        <div class="copy-and-terms-container">
            <p id="copyright">&copy; 2024 Felipe Iglesias Garcia</p>
            <a href="https://github.com/felipe-mig" target="_blank"><i class="bi bi-github" id="giticon"></i></a>
            <a href="https://www.linkedin.com/in/felipeiglesiasgarcia/" target="_blank"><i class="bi bi-linkedin" id="linkedinicon"></i></a>
        </div>
        <!-- <br> -->
    </footer>   
</body>
</html>