<?php

namespace Core\Validators;

use Core\Validator;
use Core\ValidationException;

class LoginFormValidator extends Validator
{
    public function validate($data, $rules = [])
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8']
        ];

        return parent::validate($data, $rules);
    }

    public static function validateOrFail($attributes)
    {
        $instance = new static();

        if (!$instance->validate($attributes)) {
            ValidationException::throw($instance->errors(), [
                'email' => $attributes['email'] ?? ''
            ]);
        }

        return true;
    }

    public static function validateCredentials($attributes, $auth)
    {
        static::validateOrFail($attributes);

        if (!$auth->attempt($attributes['email'], $attributes['password'])) {
            ValidationException::throw(
                ['password' => ['Invalid credentials']], 
                ['email' => $attributes['email']]
            );
        }

        return true;
    }
} 
