<?php

/** Responsavél por listar os cadastros do nosso CRUD
 * 
 */

require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../../../src/modules/messages.php';
require_once '../partials/header.php';

//retorna  nossos dados cadastros do banco de dados
$users = readUserAction($conn);
?>

<!--preenchendo tabela através de um foreach no array-->
<div class="container">
    <div class="header">
        <div class=""><a href="../../../" class="logo"> <h1>Users</h1></a></div>
        <div class=""><a class="btn btn-success" href="./create.php">New</a></div>
    </div>

    <div class="">
        <?php if(isset($_GET['message'])) echo(printMessage($_GET['message'])); ?>
    </div>

    <div class="flex-center">
    <table class="table-users ">
        <tr>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>CPF</th>
        </tr>
        <?php foreach($users as $row): ?>
            <tr>
                <td class="user-name"><?= htmlspecialchars($row['name']) ?></td>
                <td class="user-email"><?= htmlspecialchars($row['email']) ?></td>
                <td class="user-phone"><?= htmlspecialchars($row['phone']) ?></td>
                <td class="user-cpf"><?= htmlspecialchars($row['cpf']) ?></td>
                <td class="edit">
                    <a class="btn btn-primary " href="./edit.php?id= <?=$row['id']?> ">Edit</a>
                </td>
                <td class="delete">
                    <a class="btn btn-danger " href="./delete.php?id= <?=$row['id']?> ">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
    </div>
</div>

<?php require_once '../partials/footer.php';



