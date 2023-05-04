<html>
    <?php
        require_once("dbConnection.php");
        session_destroy();
        if (isset($_POST)) {
            //echo var_dump($_POST);
            $un = mysqli_real_escape_string($mysqli, $_POST['uname']);
            $pw = mysqli_real_escape_string($mysqli, $_POST['psw']);
            $pw_encrypted = encrypt($pw);
            //echo "post is set";
        }
        if(empty($un) || empty($pw)){
            echo "<font color='red'> Login went wrong.</font><br/>";
        }
        else{
            $account_found = mysqli_query($mysqli, "SELECT uid FROM accounts WHERE username='$un' and password='$pw_encrypted' LIMIT 1");
            if(empty($account_found)){
                echo "Invalid Username or Password. <a href=login.html> Go Back </a>";
            }
            else{
                session_start();
                $row = mysqli_fetch_assoc($account_found);
                $_SESSION['uid'] = $row['uid'];
                header("Location: index.php");
            }
        }

        function encrypt($str) {
            $result = '';
            for ($i = 0; $i < strlen($str); $i++) {
                $char = strtolower($str[$i]);
                if (ctype_alpha($char)) {
                    $num = ord($char) - 96;
                    if(ctype_upper($str[$i])){
                        $num = ord($char) + 3;
                    }
                    $result .= $num;
                }
                else{
                    $result .= $char;
                }
            }

            return $result;
        }
    ?>
    
</html>

