<html>
    <?php
        require_once("dbConnection.php");
        session_start();
        //echo var_dump($_SESSION);
        if(!isset($_SESSION['uid'])){
            echo "Did not work";
        }
        $id = $_SESSION['uid'];
        $account_info = mysqli_query($mysqli, "SELECT * FROM listener WHERE uid = '$id' LIMIT 1");
        $user_data = mysqli_fetch_assoc($account_info)
    ?>
    <head>
        <?php echo $user_data['Name']?>'s Landing Page
    </head>
</html>