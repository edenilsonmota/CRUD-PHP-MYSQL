<?php
//arquivo responsavel por executar as querys do bd

function findUserDb($conn, $id){
    $id = mysqli_real_escape_string($conn, $id); //para escapar nossos dados recebidos como parametro. Em seguida a query é definida em uma string
    $user = '';
    
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_stmt_init($conn); //Inicializa uma instrução e retorna um objeto para uso com mysqli_stmt_prepare

    if(!mysqli_stmt_prepare($stmt, $sql)) { // "Não" Prepara uma declaração SQL para execução
        exit('SQL error');
    }

    mysqli_stmt_bind_param($stmt, 'i', $id); //passa variáveis para um preparado comando como paramêtros
    mysqli_stmt_execute($stmt); //executa uma preparada query

    $user = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

    mysqli_close($conn);
    return $user;
}

//criar usuario
function createUserDb($conn, $name, $email, $phone, $cpf){

    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $phone = mysqli_real_escape_string($conn, $phone);
    $cpf = mysqli_real_escape_string($conn, $cpf);

    if ($name && $email && $phone && $cpf) {
        $sql = "INSERT INTO users (name, email, phone, cpf) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            exit('SQL error');
        }

        mysqli_stmt_bind_param($stmt, 'ssss' , $name, $email, $phone, $cpf);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        return true;
    }
}

function readUserDb($conn) {
    $users = [];

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql); //executamos diretamente o query com a função 'mysqli_query' e retornamos no array

    $result_check = mysqli_num_rows($result); // Retorna o número de linhas no conjunto de $result
    
    if($result_check > 0){
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC); //Retorna uma matriz bidimensional de todas as linhas de resultados como uma matriz associativa, uma matriz numérica ou ambas.
    }

    mysqli_close($conn);
    return $users;
}

//update de usuario
function updateUserDb($conn, $id, $name, $email, $phone, $cpf) {
    if($id && $name && $email && $phone && $cpf) {
		$sql = "UPDATE users SET name = ?, email = ?, phone = ?, cpf = ? WHERE id = ?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql))
			exit('SQL error');

		mysqli_stmt_bind_param($stmt, 'ssssi', $name, $email, $phone, $cpf, $id);
		mysqli_stmt_execute($stmt);
		mysqli_close($conn);
		return true;
	}
}

function deleteUserDb($conn, $id) {
    
    $id = mysqli_real_escape_string($conn, $id);
    

    if($id) {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_stmt_init($conn);
    }

    if(!mysqli_stmt_prepare($stmt, $sql)){
            exit('SQL error');
    }

    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    return true;


}
?>