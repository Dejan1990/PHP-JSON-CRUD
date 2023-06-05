<?php 

function getUsers() 
{
    return json_decode(file_get_contents('users/users.json'), true);
    //var_dump($users);
    //exit;
}

function getUserById($id) 
{
    $users = getUsers();

    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }

    return null;
}

function createUser($data) 
{

}

function updateUser($data, $id) 
{

}

function deleteUser($id) 
{

}