<?php

if (isset($_SESSION["login"])) {
    $userData = User::getUser($_SESSION["user_id"]);
//    dd($userData);
}

if (isset($_POST['logout'])) {
    $logout = new User($_SESSION["user_id"]);
    $logout->logout();
}
//dd($_SESSION["admin"]);

$categories = category::getCategories();

$tags = Tag::getTags();

if (isset($_POST["create_wiki"])) {
    extract($_POST);
    $picture = Validation::handleFileUpload();
    Wiki::addWiki($title, $description, $picture, $tag, $category, $_SESSION["user_id"]);
    unset($_POST);
    header("location: index.php?page=home");
}

$wikis = Wiki::getWikis();
$lastWiki = Wiki::lastWikis();
$lastCategories = Wiki::lasCategories();

if (isset($_GET["wiki_archive"])) {
    $wiki_id = $_GET["wiki_archive"];
    Wiki::archiveWiki($wiki_id);
    header("location: index.php?page=home&success");
}

if (isset($_GET["req"]) && $_GET["req"] == "search_bar") {
    $input_value = $_GET["input_value"];
    $search_type = $_GET["search_type"];
    $searchedData = [];

    switch ($search_type) {
        case "title":
            $searchedData = Search::searchForTitles($input_value);
            break;
        case "tag":
            $searchedData = Search::searchForTags($input_value);
            break;
        case "category":
            $searchedData = Search::searchForCategory($input_value);
            break;
        default:
            // Handle invalid search type if necessary
            break;
    }

    $searchArray = [];

    foreach ($searchedData as $data) {
        $wikiTags = Tag::get_wiki_tag($data["wiki_id"]);

        $searchArray[] = [
            "tags" => $wikiTags,
            "wiki_infos" => $data
        ];
    }
    echo json_encode($searchArray);
    exit;
}
