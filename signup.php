<?php
require 'vendor/autoload.php';

use Delight\Auth\Auth;

$pdo = new \PDO('mysql:dbname=crud;host=localhost;charset=utf8mb4', 'root');

$auth = new Auth($pdo);

try {
    $auth->confirmEmail('Rmv5kVv9rnLzIJS1', '_JdlydsFjRNRYDKM');

    echo 'Email address has been verified';
}
catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
    die('Invalid token');
}
catch (\Delight\Auth\TokenExpiredException $e) {
    die('Token expired');
}
catch (\Delight\Auth\UserAlreadyExistsException $e) {
    die('Email address already exists');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}
//try {
//    $userId = $auth->register($_POST['email'], $_POST['password'], null, function ($selector, $token) {
//        echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
//        echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
//        echo '  For SMS, consider using a third-party service and a compatible SDK';
//    });
//
//    echo 'We have signed up a new user with the ID ' . $userId;
//}
//catch (\Delight\Auth\InvalidEmailException $e) {
//    die('Invalid email address');
//}
//catch (\Delight\Auth\InvalidPasswordException $e) {
//    die('Invalid password');
//}
//catch (\Delight\Auth\UserAlreadyExistsException $e) {
//    die('User already exists');
//}
//catch (\Delight\Auth\TooManyRequestsException $e) {
//    die('Too many requests');
//}
