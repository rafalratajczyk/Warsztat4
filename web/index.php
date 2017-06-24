<?php
    require_once ('../src/Category.php');
    require_once ('../src/Product.php');
    require_once 'config.php';

$products = Product::findAll($conn);
$productsCounter = count($products);

$categories = Category::findAll($conn);

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
            float: left;
        }

        .categories {
            position: absolute;
            margin-top: 20px;
            float: left;
        }
    </style>
</head>
<body>
<?php
if (isset($_SESSION['login'])) {
    foreach ($products as $product) {
        echo "<p>ucwords(strtolower($product->getName()))</p>";
    }
}

echo "<p style='float: right;'><a href='login.php'>Zaloguj się</a></p>";
echo "<p style='float: right;'><a href='register.php'>Zarejestruj się /</a></p>";

$carouselProducts = [];
if ($productsCounter > 5) {
    while (count($carouselProducts) < 5) {
        $rand = rand(0, $productsCounter-1);

        for ($i = 0; $i < $productsCounter-1; $i++) {
            if (!in_array($products[$rand], $carouselProducts)) {
                $carouselProducts [] = $products[$rand];
            }
        }
    }

    echo '<div class="carousel">';
    foreach ($carouselProducts as $cProduct) {
        echo '<p>'.strtoupper($cProduct->getName()).'</p>';
    }
    echo '</div>';
}


echo '<div class="categories">';
foreach ($categories as $category) {
    echo '<p>'.ucwords(strtolower($category->getName())).'</p>';
}

echo '</div>';
?>



</body>
</html>