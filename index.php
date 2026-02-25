<?php
session_start();
require_once 'config.php';
require_once 'models.php';

$page = $_GET['page'] ?? 'home';

include 'header.php';

switch($page){
    case 'blog':
        showBlog($conn);
        break;
    case 'detail':
        showDetail($conn);
        break;
    case 'contact':
        handleContact($conn);
        break;
    case 'login':
        handleLogin($conn);
        break;
    case 'dashboard':
        dashboard();
        break;
    case 'logout':
        session_destroy();
        header("Location: ?page=login");
        break;
    default:
        echo "<h1>Welcome to Portfolio Pro</h1>";
}

include 'footer.php';
