<?php
require_once ('../src/Category.php');
require_once ('../src/Product.php');
require_once 'config.php';

session_start();

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
$products = Product::findAll($conn);
$productsCounter = count($products);

$categories = Category::findAll($conn);

if (isset($_SESSION['user'])) {
    echo "Witaj <b>".$_SESSION['user']."</b>";
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
            float: left;
        }

        .categories {
            position: absolute;
            margin-top: 20px;
            float: left;
        }
    </style>
</head>
<?php
if (isset($_SESSION['login'])) {
    foreach ($products as $product) {
        echo "<p>ucwords(strtolower($product->getName()))</p>";
    }
}

echo "<p style='float: right; margin-right: 25px;'><a href='register.php'>Zarejestruj się</a></p>";

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

<div class="container">
    <div class='row'>
        <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>

        </div>
        <div class='col-xs-4 col-sm-4 col-md-4 col-lg-4'>
            <form action='login.php' method='POST' role='form'>
                <legend>Zaloguj się</legend>
                <div class='form-group'>
                    <label for=''>Login</label>
                    <input type='text' class='form-control' name='login' id='login' placeholder='Adres email...'>
                </div>

                <div class='form-group'>
                    <label for=''>Hasło</label>
                    <input type='password' class='form-control' name='password' id='password' placeholder='Hasło...'>
                </div>

                <button type='submit' class='btn btn-primary'>Zaloguj się</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>