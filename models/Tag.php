<?php
class Tag {
    static function addTag($tag) {
        global $db;
        $sql = "INSERT INTO tag (tag) VALUES (:tag)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag', $tag);
        $stmt->execute();
    }

    static function updateTag($tag, $tag_id) {
        global $db;
        $sql = "UPDATE tag SET tag = :tag WHERE tag_id = :tag_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag', $tag);
        $stmt->bindParam(':tag_id', $tag_id);
        $stmt->execute();
    }

    static function deleteTag($tag_id) {
        global $db;
        $sql = "DELETE FROM tag WHERE tag_id = :tag_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag_id);
        $stmt->execute();
        return true;
    }

    static function deleteWiki_Tag($wiki_id) {
        global $db;
        $sql = "DELETE FROM wiki_tag WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $stmt->execute();
        return true;
    }

    static function getTags() {
        global $db;
        $sql = "SELECT * FROM tag";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
}