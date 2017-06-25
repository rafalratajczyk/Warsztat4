<?php
/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 25.06.17
 * Time: 05:23
 */

class User
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $order_address;


    public function login(PDO $conn, $email, $password)
    {
        $messages = [];

        $query = "SELECT * FROM `users` WHERE email=:email";

        $stmt = $conn->prepare($query);
        $stmt->execute([
            'email' => $email
        ]);

        if ($stmt->rowCount() === 1) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $result['password'])) {
                $loggedUser = $result['name'].' '.$result['surname'];
                $_SESSION['user'] = $loggedUser;

                header("Location: index.php");

            } else {
                $messages = 'Podano niepoprawne dane';

                return $messages;
            }

            //return $messages;
        } else {
            $messages = 'Nie ma takiego użytkonika';

            return $messages;
        }
    }
}