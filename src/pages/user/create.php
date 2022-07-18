<?php
// responsável por exibir o formulário de criação do CRUD

require_once '../../../config.php';
require_once '../../../src/actions/user.php';
require_once '../partials/header.php';

//fazendo verificação e criando usuario
if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["cpf"])){
    createUserAction($conn, $_POST["name"], $_POST["email"], $_POST["phone"], $_POST["cpf"]);
}

?>

<!--Formulario de crianção de usuario-->
<div class="container">
    <div class="header">
        <a href="../../../index.php" class="logo"><h1>Users - Create</h1></a>
        <a class="btn btn-prev" href="../../../index.php">Prev</a>
    </div>
    <div class="flex-center">
        <div class="form-div">
            <form action="../../pages/user/create.php" class="form" method="POST">
                <label>Name:</label>
                <input type="text" name="name" require>
                <label>E-mail:</label>
                <input type="email" name="email" require>
                <label>Phone:</label>
                <input type="text" name="phone" require>
                <label>CPF (Somente os números):</label>
                <input type="text" name="cpf" require>

                <button class="btn btn-success" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>

<?php require_once '../partials/footer.php'; ?>