<?php

class Search
{
    static function searchForTitles($title)
    {
        global $db;
        $title = "%" . "$title" . "%";
        $sql = "SELECT wiki.*, category.*, users.*
                FROM wiki
                JOIN users ON wiki.creator = users.user_id
                JOIN category ON wiki.category_id = category.category_id
                WHERE title LIKE :title AND archived = 0";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":title", $title, PDO::PARAM_STR);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    
}
