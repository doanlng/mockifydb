<html>
    <?php
        require_once("dbConnection.php");
        
        if (isset($_POST)) {
            $un = mysqli_real_escape_string($mysqli, $_POST['uname']);
            $pw = mysqli_real_escape_string($mysqli, $_POST['psw']);
            //echo "post is set";
        }
        if(empty($un) || empty($pw)){
            echo "<font color='red'> Login went wrong.</font><br/>";
        }
        else{
            $account_found = mysqli_query($mysqli, "SELECT uid FROM accounts WHERE username='$un' and password='$pw' LIMIT 1");
            if(empty($account_found)){
                echo "Invalid Username or Password";
            }
            else{
                session_start();
                $row = mysqli_fetch_assoc($account_found);
                $_SESSION['uid'] = $row['uid'];
                header("Location: userlanding.php");
            }
        }
    ?>
    
</html>

