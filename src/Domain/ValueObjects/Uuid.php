<?php

namespace Core\Domain\ValueObjects;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(
        protected string $value
    ){
        $this->validate($value);
    }

    public static function generate(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    // public function __toString(): string
    // {
    //     return $this->value;
    // }

    private function validate($id)
    {
        if (RamseyUuid::isValid($id)) {
            throw new InvalidArgumentException(sprintf('<%s> não suporta o valor: <%s>.', static::class, $id));
        }
    }
}