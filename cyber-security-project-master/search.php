<!DOCTYPE html>
<html>

<head>
    <title>Search Bar using PHP</title>
</head>

<body>

    <form method="post">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">

    </form>

</body>

</html>

<?php

$con = new PDO("mysql:host=localhost;dbname=user", 'root', '');

if (isset($_POST["submit"])) {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM `login` WHERE username = '$str'");

    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();

    if ($row = $sth->fetch()) {
?>
        <br><br><br>
        <table>
            <tr>
                <th>Name</th>
                <th>Type</th>
            </tr>
            <tr>
                <td><?php echo $row->username; ?></td>
                <td><?php echo $row->usertype; ?></td>
            </tr>

        </table>
<?php
    } else {
        echo "Name Does not exist";
    }
}

?>