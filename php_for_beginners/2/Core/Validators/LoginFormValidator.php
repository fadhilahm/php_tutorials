<?php

namespace Core\Validators;

use Core\Validator;

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
} 
