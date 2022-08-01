<?php

namespace Vini\PooPhp\Contact\Domain\Model;

class Contact
{
    protected string|null $email;
    protected string|null $phone;

    /**
     * @param string|null $email
     * @param string|null $phone
     */
    public function __construct(?string $email, ?string $phone)
    {
        $this->email = $email;
        $this->phone = $phone;
    }
}