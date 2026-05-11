<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Product.php';

use App\model\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        Product::create([
            'brand'   => $_POST['brand'],
            'model'   => $_POST['model'],
            'price'   => $_POST['price'],
            'screen'  => $_POST['screen'],
            'ram'     => $_POST['ram'],
            'storage' => $_POST['storage'],
            'camera'  => $_POST['camera'],
            'battery' => $_POST['battery']
        ]);
        
        header("Location: ../view/saved.html"); 
        exit();

    } catch (\Exception $e) {
        die("Error when saving: " . $e->getMessage());
    }
}