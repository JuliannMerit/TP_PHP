<?php

date_default_timezone_set('Europe/Paris');
try {
    $file_bd = new PDO('sqlite:qcm.sqlite3');
    $file_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $delete_sql = file_get_contents('delete.sql');
    $result = $file_bd->exec($delete_sql);

    $create_sql = file_get_contents('create.sql');
    $result = $file_bd->exec($create_sql);

    $insert_sql = file_get_contents('insert.sql');
    $result = $file_bd->exec($insert_sql);


} catch (PDOException $e) {
    echo "Error !: " . $e->getMessage() . "<br/>";
    die();
}