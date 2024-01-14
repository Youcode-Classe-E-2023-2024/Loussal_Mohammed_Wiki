<?php
class Category {
    static function addCategory($category) {
        global $db;
        $sql = "INSERT INTO category (category) VALUES (:category)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
    }

    static function updateCategory($category, $category_id) {
        global $db;
        $sql = "UPDATE category SET category = :category WHERE category_id = :category_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    static function deleteCategory($category_id) {
        global $db;
        $sql = "DELETE FROM category WHERE category_id = :category_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
    }

    static function getCategories() {
        global $db;
        $sql = "SELECT * FROM category";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}