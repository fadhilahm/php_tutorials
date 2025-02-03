<?php

namespace Core;

class Validator
{
    protected $errors = [];

    public function validate($data, $rules)
    {
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                $this->applyRule($field, $rule, $data[$field] ?? null);
            }
        }

        return empty($this->errors);
    }

    protected function applyRule($field, $rule, $value)
    {
        if ($rule === 'required') {
            if (empty($value)) {
                $this->errors[$field][] = ucfirst($field) . " is required";
            }
        }

        if ($rule === 'email') {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $this->errors[$field][] = "Please provide a valid email address";
            }
        }

        if (strpos($rule, 'min:') === 0) {
            $min = (int) substr($rule, 4);
            if (strlen($value) < $min) {
                $this->errors[$field][] = ucfirst($field) . " must be at least {$min} characters";
            }
        }
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field)
    {
        return $this->errors[$field][0] ?? '';
    }
}
