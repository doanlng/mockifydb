<html>
    <?php
        require_once("dbConnection.php");
        
        if (isset($_POST)) {
            //echo var_dump($_POST);
            $email = mysqli_real_escape_string($mysqli, $_POST['email']);
            $pw = mysqli_real_escape_string($mysqli, $_POST['psw']);
            $cnfm = mysqli_real_escape_string($mysqli, $_POST['cnfrm']);
            $dup = mysqli_query($mysqli, "SELECT email FROM accounts WHERE email='$email'");

            //echo "post is set";
            if($pw == $cnfm && !empty(mysqli_fetch_assoc($dup))){
                $pw_encrypt = encrypt($pw);
                $result = mysqli_query($mysqli, "UPDATE accounts SET password='$pw_encrypt' WHERE email='$email' ");
                if(empty($email) || empty($pw)){
                    echo "<font color='red'> Something went wrong.  Press arrow to go back </font><br/>";
                }
                echo " Your password has been reset, <a href='login.html'> please login again! </a>";
            }
            else{
                echo "Something went wrong reseting your password, please go back.";
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

