<?php

require_once 'db.php';

class Product
{

  function list()
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("
            SELECT p.id, p.name, p.code, p.cost, p.iva, p.stock, p.image, p.current_supplier_id, s.name AS supplier_name, s.logo
            FROM products p
            JOIN suppliers s 
                ON s.id = p.current_supplier_id;
            ");
    $products = $result->fetch_all(MYSQLI_ASSOC);

    $connection->close($mysql);

    return $products;
  }

  function create($request)
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("INSERT INTO products(
                name,
                code,
                cost,
                iva,
                stock,
                current_supplier_id,
                image
          ) values (
              '{$request['name']}',
              '{$request['code']}',
              '{$request['cost']}',
              '{$request['iva']}',
              '{$request['stock']}',
              '{$request['current_supplier_id']}',
              '{$request['image']}'
              
        )");

    $connection->close($mysql);

    return $result;
  }

  function show($id)
  {
    //TODO
    $connection = new Connection;

    $mysql = $connection->create();
    /*
      $result = $mysql->query("SELECT * FROM tasks WHERE id = $id");
      $task = $result->fetch_assoc();
      */
    $connection->close($mysql);

    //return $task;


  }

  function update($request)
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("
      UPDATE products SET 
          name = '{$request['name']}', 
          code = '{$request['code']}', 
          cost = '{$request['cost']}', 
          iva = '{$request['iva']}', 
          stock = '{$request['stock']}', 
          current_supplier_id = '{$request['current_supplier_id']}', 
          image = '{$request['image']}'
      WHERE id = {$request['id']}");

    $connection->close($mysql);

    return $result;
  }

  function delete($id)
  {
    $connection = new Connection;

    $mysql = $connection->create();

    $result = $mysql->query("DELETE FROM products WHERE id = $id");

    $connection->close($mysql);

    return $result;
  }
}
