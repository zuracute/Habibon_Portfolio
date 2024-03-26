<?php
try {
    $DSN = 'mysql:host=localhost;dbname=zura_cms'; 
    $conn = new PDO($DSN, 'root', ''); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
