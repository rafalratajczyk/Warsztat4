<?php
    require_once ('../src/Product.php');
    require_once '../config.php';

    $products = Product::findAll($conn);
    $productsCounter = count($products);

    $carouselProducts = [];

    if ($productsCounter > 5) {
        //$c = 0;
        while (count($carouselProducts) < 5) {
            $rand = rand(0, $productsCounter-1);

            for ($i = 0; $i < $productsCounter-1; $i++) {
                if (!in_array($products[$rand], $carouselProducts)) {
                    $carouselProducts [] = $products[$rand];
                }
            }

            //$c++;
        }
        echo '<div class="carousel">';
        foreach ($carouselProducts as $cProduct) {
            echo '<p>'.$cProduct->getName().'</p>';
        }
        echo '</div>';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        .carousel {
            width: 50%;
            margin-top: 20px;
            margin-left: 25%;
            margin-right: 25%;
            border: 1px dashed #000;
        }
    </style>
</head>
<body>
<?php
foreach ($products as $product) { ?>
    <p><?php echo ucwords(strtolower($product->getName())); ?></p>
    <?php } ?>
</body>
</html>