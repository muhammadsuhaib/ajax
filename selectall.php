<?php
include "config.php";


$select = "select *   from users ";
$result  = $conn->query($select);
?>

<table border="1">
    <tbody>
    <tr>
        <th> ID</th>
        <th> Name</th>
        <th> Email</th>
        <th> Password</th>
    </tr>

    <tr>
        <?php foreach ($result as $data){  ?>

        <td><?= $data["id"]; ?></td>
        <td><?= $data["user_name"]; ?> </td>
        <td><?= $data["email"]; ?> </td>
        <td><?= MD5($data["password"]); ?> </td>
    </tr>

    <?php }?>

    </tbody>

</table>


