<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../model/Product.php';

use App\model\Product;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $model = $_POST['model'] ?? null;
        $product = Product::findByModel($model);

        if (!$product) {
            header('Location: ../controller/viewProducts.php');
            exit();
        }

        $product->update([
            'brand'   => $_POST['brand']   ?? $product->brand,
            'model'   => $model            ?? $product->model,
            'price'   => $_POST['price']   ?? $product->price,
            'screen'  => $_POST['screen']  ?? $product->screen,
            'ram'     => $_POST['ram']     ?? $product->ram,
            'storage' => $_POST['storage'] ?? $product->storage,
            'camera'  => $_POST['camera']  ?? $product->camera,
            'battery' => $_POST['battery'] ?? $product->battery
        ]);

        header('Location: ../view/saved.html');
        exit();
    } catch (\Throwable $e) {
        die('Error updating: ' . $e->getMessage());
    }
}