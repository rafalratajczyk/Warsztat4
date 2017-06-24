<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 24.06.17
 * Time: 22:32
 */

class Category
{
    private $name;
    private $description;

    /**
     * Category constructor.
     * @param $name
     * @param $description
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }


    public static function findAll(PDO $conn)
    {
        $categories = [];

        $result = $conn->query("SELECT * FROM `categories`");

        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $categories[] = new Category($row['name'], $row['description']);
        }

        return $categories;
    }

    public function getName()
    {
        return $this->name;
    }
}