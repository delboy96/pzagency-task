<?php

namespace Validators;

class Validator
{
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateName($name) {
        return strlen($name) >= 3 && strlen($name) <= 30;
    }

    public static function validateBody($body) {
        return strlen($body) >= 4;
    }

    public static function validatePassword($password) {
        return strlen($password) >= 6;
    }
}