<?php 

function getUsers() 
{
    $users = json_decode(file_get_contents('./users/users.json'), true);
    var_dump($users);
    exit;
}

function getUserById($id) 
{

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