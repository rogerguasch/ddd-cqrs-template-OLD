<?php


namespace RGR\Shared\Domain\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;


abstract class EmailVO
{
    /**
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    protected string $value;

    public function __construct(string $value)
    {

        Assert::that($value)->email();
        $this->value = $value;

    }

    public function __toString(): string
    {
        return $this->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}
