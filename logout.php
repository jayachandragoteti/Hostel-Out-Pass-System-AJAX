<?PHP
session_start();
	if (isset($_SESSION['login'])) {
        unset($_SESSION['login']);
        session_unset();
        session_destroy(); //destroy the session
        header("location:index.php"); //to redirect back to "index.php" after logging out
        exit();
    }else {
        header("location:index.php");
    }

