<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 21.06.17
 * Time: 16:04
 */
class Product
{
    private $id;
    private $name;
    private $price;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($name, $price, $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }


    public static function findAll(PDO $conn)
    {
        $products = [];

        $result = $conn->query('SELECT * FROM `products`');

        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $products[] = new Product($row['name'], $row['price'], $row['id']);
        }

        return $products;
    }

    public function getName()
    {
        return $this->name;
    }
}

