<?php
    require_once("../dbConnection.php");
    $accounts = mysqli_query($mysqli, "SELECT * FROM accounts");
?>
<style>
table, th, td {
  border:1px solid white;
  padding-left: 0.5px;
}
table{
    position: absolute;
    top: 0;
}
</style>
<table style="width:80%">
    <tr>
        <td>Username</td>
        <td>User ID</td>
        <td>Account Type</td>
        <td>Email</td>
    </tr>
<?php

    while($account_data = mysqli_fetch_assoc($accounts)){
        echo '<tr>';
        echo '<td>' . $account_data['username'] . "</td>" . '<td>' . $account_data['uid'] . "</td>" . '<td>' . $account_data['email'] . "</td>" . '<td>' . $account_data['account_type'] . "</td><br>";
        echo '</tr>';
    }

?>
</table>