<?php
//responsável por exibir o formulário de edição do CRUD

require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../partials/header.php';

//verificar e atualizar usuario
if (isset($_POST["id"], $_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["cpf"]))
    updateUserAction($conn, $_POST["id"], $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["cpf"]);

$user = findUserAction($conn, $_GET['id']);
?>

<div class="container">
    <div class="header">
        <a href="../../../index.php" class="logo"><h1>Users - Edit</h1></a>
        <a  class="btn btn-prev" href="../../../index.php">Prev</a>
    </div>
    <div class="flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/edit.php" method="POST">
                <input type="hidden" name="id" value="<?=$user['id']?>" required/>
                <label>Name</label>
                <input type="text" name="name" value="<?=htmlspecialchars($user['name'])?>" required/>
                <label>E-mail</label>
                <input type="email" name="email" value="<?=htmlspecialchars($user['email'])?>" required/>
                <label>Phone</label>
                <input type="text" name="phone" value="<?=htmlspecialchars($user['phone'])?>" required/>
                <label>CPF</label>
                <input type="text" name="cpf" value="<?=htmlspecialchars($user['cpf'])?>" required/>
                <button class="btn btn-success " type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>