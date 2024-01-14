<?php

if (empty($_SESSION["admin"])) {
    header("Location: index.php");
}

if ($_SESSION["login"]) {
    $userData = User::getUser($_SESSION["user_id"]);
}

if (isset($_POST['logout'])) {
    $logout = new User($_SESSION["user_id"]);
    $logout->logout();
}

$tags = Tag::getTags();

if (isset($_GET["tag_id"])) {
    $tagId = filter_input(INPUT_GET, "tag_id", FILTER_SANITIZE_SPECIAL_CHARS);
    Tag::deleteTag($tagId);
    header("location: index.php?page=dashboard&add_tag=true");
}

if (isset($_POST["editTag"])) {
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);
    $tagId = filter_input(INPUT_POST, "tag_id", FILTER_SANITIZE_SPECIAL_CHARS);
//    dd($tagId);
    Tag::updateTag($tag, $tagId);
    header("location: index.php?page=dashboard&add_tag=true");
}

if (isset($_POST["add_tag"])) {
    $tag = filter_input(INPUT_POST, "tag", FILTER_SANITIZE_SPECIAL_CHARS);

    if (Validation::validateTag(strtolower($tag))) {
        $msg = Validation::validateTag($tag);
        http_response_code(400);
        echo json_encode(["error" => $msg]);
    } else {
        Tag::addTag($tag);
        http_response_code(200);
        echo json_encode(["success" => "Tag added successfully"]);
    }

    exit;
}

$categories = category::getCategories();

if (isset($_POST["add_category"])) {
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $category = strtolower($category);
    if (Validation::validateCategory($category)) {
        $msg = Validation::validateCategory($category);
        http_response_code(400);
        echo json_encode(["error" => $msg]);
    } else {
        Category::addCategory($category);
        http_response_code(200);
        echo json_encode(["success" => "Category added successfully"]);
    }
    exit;
}

if (isset($_POST["editCategory"])) {
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $categoryId = filter_input(INPUT_POST, "category_id", FILTER_SANITIZE_SPECIAL_CHARS);
    Category::updateCategory($category, $categoryId);
    header("location: index.php?page=dashboard&add_category=true");
}

if (isset($_GET["category_id"])) {
    $categoryId = filter_input(INPUT_GET, "category_id", FILTER_SANITIZE_SPECIAL_CHARS);
    Category::deleteCategory($categoryId);
    header("location: index.php?page=dashboard&add_category=true");
}

$totalWikis = count(Wiki::getWikis());
$totalUsers = count(User::getAll());
$totalTags = count(Tag::getTags());
$totalCategories = count(Category::getCategories());

$dataPoints = array(
    array("y" => $totalUsers, "label" => "Users"),
    array("y" => $totalCategories, "label" => "Categories"),
    array("y" => $totalTags, "label" => "Tags"),
    array("y" => $totalWikis, "label" => "Wikis")
);



