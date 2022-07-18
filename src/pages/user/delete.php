<?php
//responsável por exibir o formulário de confirmação de exclusão do CRUD

require_once '../../../config.php';
require_once '../../actions/user.php';
require_once '../partials/header.php';

if(isset($_POST['id'])){
    deleteUserAction($conn, $_POST['id']);
}
?>
<div class="container">
    <div class="header">
        <a href="../../../index.php" class="logo"><h1>Users - Delete</h1></a>
        <a class="btn btn-prev " href="../../../index.php">Prev</a>
    </div>
    <div class="flex-center">
        <div class="form-div">
            <form class="form" action="../../pages/user/delete.php" method="POST">
                <label>Do you really want to remove the user?</label>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>" required/>

                <button class="btn btn-success" type="submit">Yes</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>