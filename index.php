<?php
session_start();
require_once 'bootstrap.php';

if (isset($_SESSION['booking'])) {
    print_r($_SESSION['booking']);
} else {
    echo ('khong co');
}
$app = new App();

?>