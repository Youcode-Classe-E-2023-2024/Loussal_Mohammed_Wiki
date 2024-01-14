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

/*------------*/
// en-tant-quadministrateur-je-souhaite-pouvoir-gérer-les-wikis
/*------------*/
if (isset($_GET["wiki_id"])) {
    $wikiId = $_GET["wiki_id"];
    $singleWiki = Wiki::getWiki($wikiId);
//    dd($singleWiki);
    $tags = Tag::get_wiki_tag($wikiId);
}
/*------------*/
// en-tant-quadministrateur-je-souhaite-pouvoir-gérer-les-wikis
/*------------*/
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-tags
/*------------*/
$allTags = Tag::getTags();
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-catégories
/*------------*/
$categories = category::getCategories();
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-catégories
/*------------*/

if (isset($_POST["create_wiki"])) {
    extract($_POST);
    $date = date("U");
    $oldTags = Tag::get_wiki_tag($wiki_id);
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-tags
/*------------*/
//    dd($tag);
    Wiki::updateWiki($wiki_id, $tag, $title, $description, $category, $date,$oldTags);
    header("location: index.php?page=wiki&wiki_id=$wiki_id");
}

