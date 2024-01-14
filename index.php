<?php

include_once '_config/config.php';
include_once '_functions/functions.php';
include_once '_config/db.php';

spl_autoload_register(function ($class) {
    include_once 'models/' . $class . '.php';
});

// Commented out as it seems you're not using these lines currently
// $database = new Database();
// $con = $database->dbh;


$page = 'home';
if (isset($_GET['page']) && !empty($_GET['page'])) {
    $newPage = trim(strtolower($_GET['page']));

    if (!(isset($_SESSION["login"]) && ($newPage == "authentication"))) {
        $page = $newPage;
    }
}

$all_pages = scandir('controllers');
if (in_array($page . '_controller.php', $all_pages)) {
    include_once 'controllers/' . $page . '_controller.php';

    if (isset($_SESSION["admin"]) && $page == "dashboard") {
        include_once 'views/dashboard_layout.php';
    } else {
        include_once 'views/_layout.php';
    }
} else {

    include_once 'controllers/404_controller.php';
    include_once 'views/404_view.php';
}

