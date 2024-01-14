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

    static function userChecker($email, $db)
    {
        if (User::user_checker($email, $db)) {
            return "User already exists";
        }
    }

    static function validatePhoneNumber($phoneNumber)
    {
        if (empty($phoneNumber)) {
            return "Phone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
            return "Invalid phone number. Phone number should have 10 digits.";
        }
        return false;
    }

    static function validateEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        return false;
    }

    static function validatePassword($password)
    {
        if (empty($password)) {
            return "Password is required";
        } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
            return "Invalid password. Password should have at least 8 characters, including one uppercase letter, one lowercase letter, and one number.";
        }
        return false;
    }

    
}