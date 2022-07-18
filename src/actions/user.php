<?php
//arquivo que contém todas as functions para manipular o banco de dados do crud

require_once '../../database/user.php';

//buscar(carregar) usuario no db
function findUserAction($conn, $id){
    return findUserDb($conn, $id);
}

//buscar cadastro no db
function readUserAction($conn){
    return readUserDb($conn);
}

//create User
function createUserAction($conn, $name, $email, $phone, $cpf){
    $createUserDb = createUserDb($conn, $name, $email, $phone, $cpf);
    $message = $createUserDb == 1 ? 'sucess-create' : 'error-create';

    //retornando paramentro a variavel get message
    return header("Location: ./read.php?message=$message");
}

function updateUserAction($conn, $id, $name, $email, $phone, $cpf) {
	$updateUserDb = updateUserDb($conn, $id, $name, $email, $phone, $cpf);
	$message = $updateUserDb == 1 ? 'success-update' : 'error-update';
	return header("Location: ./read.php?message=$message");
}

function deleteUserAction($conn, $id){
    $deleteUserDb = deleteUserDb($conn, $id);
    $message = $deleteUserDb == 1 ? 'success-remove' : 'error-remove';
    return header("Location: ./read.php?message=$message");
}

?>