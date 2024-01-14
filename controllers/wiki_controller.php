<?php

if (isset($_SESSION["login"])) {
    $userData = User::getUser($_SESSION["user_id"]);
//    dd($userData);
}

if (isset($_POST['logout'])) {
    $logout = new User($_SESSION["user_id"]);
    $logout->logout();
}

if (isset($_GET["wikiId"])) {
    $wikiId = $_GET["wikiId"];
    Wiki::deleteWiki($wikiId);
    header("location: index.php?page=home");
}

if (isset($_GET["wiki_id"])) {
    $wikiId = $_GET["wiki_id"];
    $singleWiki = Wiki::getWiki($wikiId);
//    dd($singleWiki);
    $tags = Tag::get_wiki_tag($wikiId);
}

$allTags = Tag::getTags();
$categories = category::getCategories();

if (isset($_POST["create_wiki"])) {
    extract($_POST);
    $date = date("U");
    $oldTags = Tag::get_wiki_tag($wiki_id);
//    dd($tag);
    Wiki::updateWiki($wiki_id, $tag, $title, $description, $category, $date,$oldTags);
    header("location: index.php?page=wiki&wiki_id=$wiki_id");
}

