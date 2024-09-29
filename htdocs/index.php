<?php
    session_start();
    include_once('functions/functions.php');
    $dbConnect = dbLink();
    if($dbConnect){
        echo '<!-- Connection Established -->';
    }

    // showMem();

    // Logout
    # Este 'logout' viene de '<li><a href="../pages/login.php?logout=logout">Log out</a></li>'; que tenemos en el file dashboard.php y en las demas secciones.
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @font-face {
            font-family: shin;
            src: url(fonts/AOTFShinGoProRegular.otf)
        }
    </style>
</head>
<body> 
    <header>
            <!-- Logo -->
            <a href=""><div class="logo-container"></div></a>
            <!--nav-list-->
            <nav>
                <ul>
                    <li><a href="">home</a></li>
                    <?php
                    # This is for showing the logout button instead of login on the nav bar once we enter the correct username and password.
                    if($validate){
                        // dashboard button
                        echo '<li><a href="../pages/dashboard.php">Dashboard</a></li>';
                        // logout button
                        echo '<li><a href="../pages/login.php?logout=logout">Log out</a></li>';
                        
                    } else{
                        echo '<li><a href="../pages/login.php">Log in</a></li>';
                    }
                    
                    ?>
                </ul>
            </nav>
    </header>
    <?php
    showMem();
    ?>
        <div class="cta_container"></div>
        <br>
        <br>
        <br> 
        <div class="about_container">
            <h3>Setting</h3>
            <p>My Hero Academia is set in a world where about 80% of the human population has gained superpowers called "Quirks" (個性, Kosei). Quirks vary widely and can be inherited. Among the Quirk-enhanced individuals, a few of them earn the title of Heroes, who cooperate with authorities in rescue operations and apprehending criminals who abuse their Quirks, commonly known as Villains. In addition, Heroes who excel on their duties gain celebrity status and are recognized as "Pro Heroes" (プロヒーロー, Puro Hīrō). Heroes are ranked in popularity, with higher ranking heroes receiving public appeal, although it is not uncommon for rookie heroes to gain popularity as well.</p>
            <br>
        </div>
        <br>
        <br>
        <br>   
        <div class="image2"></div>
        <br>
        <br>
        <br>
        <div class="about_container">
            <h3>About</h3>
            <br>
            <p>Izuku has dreamt of being a hero all his life—a lofty goal for anyone, but especially challenging for a kid with no superpowers. That’s right, in a world where eighty percent of the population has some kind of super-powered “quirk,” Izuku was unlucky enough to be born completely normal. But that’s not enough to stop him from enrolling in one of the world’s most prestigious hero academies.</p>
            <br>
        </div>
        <br>
        <br>
        <br>
        <footer>
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