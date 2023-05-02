<html>
    <?php
        require_once("dbConnection.php");
        
        if (isset($_POST)) {
            //echo var_dump($_POST);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $uname = mysqli_real_escape_string($mysqli, $_POST['uname']);
            $pw = mysqli_real_escape_string($mysqli, $_POST['psw']);
            $cnfm = mysqli_real_escape_string($mysqli, $_POST['cnfrm']);
            $dup = mysqli_query($mysqli, "SELECT email FROM accounts WHERE email='$email'");

            //echo "post is set";
            if($pw == $cnfm && empty(mysqli_fetch_assoc($dup))){
                $pw_encrypt = encrypt($pw);
                $result = mysqli_query($mysqli, "INSERT INTO accounts (`username`, `email`, `password`) VALUES ('$uname', '$email', '$pw_encrypt')");
            
                if(empty($uname) || empty($pw)){
                    echo "<font color='red'> Something went wrong.  Press arrow to go back </font><br/>";
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
                        header("Location: index.php");
                    }
                }
            }
            else{
                echo "Something went wrong creating your account, please go back.";
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

