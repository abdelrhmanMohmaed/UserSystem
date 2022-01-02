<?php

namespace UserSystem\Classes\Validation;


interface ValidationRule
{
    public function check(string $name, $value);
}
