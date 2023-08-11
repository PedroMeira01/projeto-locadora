<?php

namespace Core\Domain\Validation;

use Core\Domain\Exceptions\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $message = null)
    {
        if (empty($value)) {
            throw new EntityValidationException($message ?? "O valor não deve ser vazio.");
        }
    }

    public static function strMinLength(string $value, int $minLength = 2, string $message = null)
    {
        if (strlen($value) < $minLength) {
            throw new EntityValidationException($message ?? "O valor deve ter no mínimo 3 caracteres.");
        }
    }

    public static function strMaxLength(string $value, int $maxLength = 255, string $message = null)
    {
        if (strlen($value) > $maxLength) {
            throw new EntityValidationException($message ?? "O valor deve ter no máximo 255 caracteres");
        }
    }
}