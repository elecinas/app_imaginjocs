<?php

require_once 'db.php';

class User
{

  function list()
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("SELECT * FROM users");
    $users = $result->fetch_all(MYSQLI_ASSOC);

    $connection->close($mysql);

    return $users;
  }

  function create($request)
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("INSERT INTO users(
                name,
                email,
                password,
                is_admin
          ) values (
              '{$request['name']}',
              '{$request['email']}',
              '{$request['password']}',
              0
              
        )"); //0 es en "bit" el equivalente a booleano "false"

    $connection->close($mysql);

    return $result;
  }

  function show($id)
  {
    //
  }

  function update($request)
  {
    //
  }

  function delete($id)
  {
    //
  }

  function login($request)
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("
                SELECT id, name, email, password, is_admin
                FROM users 
                WHERE email = '{$request['email']}'  
        ");

    $user =  $result->fetch_all(MYSQLI_ASSOC);

    $connection->close($mysql);

    return $user;
  }
}
