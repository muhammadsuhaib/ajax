<?php
include "config.php";

$id = $_POST['id'];
$select = "select *   from users WHERE id=$id";
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
        <td><?= MD5($data["email"]); ?> </td>
    </tr>

<?php }?>

</tbody>

</table>


