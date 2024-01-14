<?php

class Wiki
{
    static function addWiki($title, $content,$picture, $tags, $category, $creator)
    {
        global $db;
        $sql = "INSERT INTO wiki (title, content, picture, category_id, creator) VALUES (:title, :content, :picture, :category, :creator)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':picture', $picture);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':creator', $creator);
        $stmt->execute();
        $wikiId = $db->lastInsertId();

        foreach ($tags as $tag) {
            Tag::wiki_tag($tag, $wikiId);
        }
    }

    
}