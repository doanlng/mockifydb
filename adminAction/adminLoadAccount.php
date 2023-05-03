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
    height: 100px;
}
body{
    padding-top: 120px;
}
</style>
<table style="width:80%">
    <tr>
        <td>Username</td>
        <td>User ID</td>
        <td>Email</td>
        <td>Account Type</td>
    </tr>
<?php

    while($account_data = mysqli_fetch_assoc($accounts)){
        echo '<tr>';
        echo '<td>' . $account_data['username'] . "</td>" . '<td>' . $account_data['uid'] . "</td>" . '<td>' . $account_data['email'] . "</td>" . '<td>' . $account_data['account_type'] . "</td>";
        echo '<td><a href=adminAction/deleteAccount.php?id='. $account_data['uid'] .'&type='.$account_data['account_type'].'>Delete</a></td>';
        echo '</tr>';
    }

?>
</table>
<body>
    <a href="adminAction/addArtist.php">Add an Artist Account</a><br>
    <a href="adminAction/addAdmin.php">Add an Admin</a><br>
</body>