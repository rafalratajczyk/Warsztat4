<?php
    require_once ('../src/Product.php');
    require_once '../config.php';

    $products = Product::findAll($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
</head>
<body>
<?php
foreach ($products as $product) { ?>
    <p><?php echo $product->getName() ?></p>
    <?php } ?>
</body>
</html>