<?php

function insertContent($asset_name, $serial_no, $asset_type)
{
    $dsn = 'mysql: host=localhost; dbname=asset';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }

    $sql = "INSERT INTO assets(asset_name,
                serial_no, asset_type) VALUES (
                :asset_name,
                :serial_no,
                :asset_type)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute($asset = [
    'asset_name' => $asset_name,
    'serial_no' => $serial_no,
    'asset_type' => $asset_type
    ]);
}


function deleteById($id)
{
    $dsn = 'mysql: host=localhost; dbname=asset';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }

    $stmt = $pdo->prepare("DELETE FROM assets WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

function getId($id)
{
    $dsn = 'mysql: host=localhost; dbname=asset';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }

    $stmt = $pdo->prepare("SELECT * FROM assets WHERE id= :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function updateById($id, $title, $description)
{
    $dsn = 'mysql: host=localhost; dbname=asset';
    $user = 'root';
    $password = 'P@ssw0rd';
    try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    }

    $sql = "UPDATE asset.assets
            SET id = :id,
                title = :title,
                description = :description
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":id" => $id,
                        ":title" => $title,
                        ":description" => $description));
}


?>