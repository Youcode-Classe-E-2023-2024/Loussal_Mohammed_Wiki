<?php

class Validation
{

    static function validateUsername($username)
    {
        if (empty($username)) {
            return "Username is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
            return "Invalid username. Username should be at least 3 characters long.";
        }
        return false;
    }

    static function validateTag($tag )
    {
        if (empty($tag)) {
            return "Tag is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $tag)) {
            return "Invalid tag. Tag should be at least 3 characters long.";
        } elseif(Tag::CheckTag( $tag)){
            return "Tag already exists.";
        }
        return false;
    }
    
    static function validateCategory($category)
    {
        if (empty($category)) {
            return "Category is required";
        } elseif (!preg_match('/^[a-zA-Z0-9]{3,}$/', $category)) {
            return "Invalid category. Category should be at least 3 characters long.";
        } elseif (Category::CheckCategory( $category))
        return false;
    }

    
}