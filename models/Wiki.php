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
    static function updateWiki($wiki_id, $tags, $title, $content, $category, $updated_date, $oldTags)
    {
        global $db;
        $sql = "UPDATE wiki SET  title = :title, content = :content, category_id = :category_id, updated_date = :updated_date WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, 2);
        $stmt->bindParam(':content', $content, 2);
        $stmt->bindParam(':category_id', $category, 1);
        $stmt->bindParam(':updated_date', $updated_date, 1);
        $stmt->bindParam(':wiki_id', $wiki_id, 1);
        $stmt->execute();

        foreach ($oldTags as $tag) {
            Tag::deleteWiki_Tag($wiki_id);
        }

        foreach ($tags as $tag) {
            Tag::wiki_tag($tag, $wiki_id);
        }
    }

    static function deleteWiki($wiki_id)
    {
        global $db;
        $sql = "DELETE FROM wiki WHERE wiki_id = :wiki_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $stmt->execute();
    }

    
    
}