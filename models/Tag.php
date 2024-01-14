<?php
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-tags
/*------------*/
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

    static function CheckTag( $tag) {
        global $db;
        $sql = "SELECT * FROM tag WHERE tag = :tag";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag', $tag);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result)
            return $result;
        return false;
    }

    static function wiki_tag ($tag, $wikiId) {
        global $db;
        $sql = "INSERT INTO wiki_tag (tag_id, wiki_id) VALUES (:tag_id, :wiki_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->bindParam(':wiki_id', $wikiId);
        $stmt->execute();
    }

    static function update_wiki_tag ($tag, $wiki_id) {
        global $db;
        $sql = "UPDATE wiki_tag  SET tag_id = :tag_id WHERE wiki_id = :wiki_id AND tag_id = :tag_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->bindParam(':wiki_id', $wiki_id);
        $stmt->bindParam(':tag_id', $tag);
        $stmt->execute();
    }



    static function get_wiki_tag($wiki_id) {
        global $db;
        $sql = "SELECT tag.* FROM wiki_tag
                JOIN tag ON wiki_tag.tag_id = tag.tag_id
                WHERE wiki_tag.wiki_id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$wiki_id]);
        return $stmt->fetchAll();
    }
}
/*------------*/
// en-tant-quadministrateur-je-veux-gérer-les-tags
/*------------*/