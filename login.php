<html>
    <?php
        require_once("dbConnection.php");
        
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
            $account_found = mysqli_query($mysqli, "SELECT uid,account_type FROM accounts WHERE username='$un' and password='$pw_encrypted' LIMIT 1");
            session_start();
            $row = mysqli_fetch_assoc($account_found);
            if (is_null($row)) {
                echo "<font color='red'> Login went wrong.</font><br/><a href=login.html> Go Back </a>";
            }
            else {
                $account_type = $row['account_type'];
                if($account_type == 0){
                    $_SESSION['uid'] = $row['uid'];
                    //listener
                    header("Location: index.php");
                }
                elseif($account_type == 1){
                    $_SESSION['aid'] = $row['uid'];
                    //artist
                    header("Location: artistPage.php");
                }
                else{
                    //admin
                    header("Location: adminLanding.php");
                }
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

