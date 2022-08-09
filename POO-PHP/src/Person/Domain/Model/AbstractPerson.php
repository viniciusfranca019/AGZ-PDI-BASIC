<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Address\Domain\Model\Address;
use Vini\PooPhp\Contact\Domain\Model\Contact;

abstract class AbstractPerson
{
    protected string $name;
    protected AbstractDocument $mainDocument;
    protected Address $address;
    protected Contact $contact;

    /**
     * @param string $name
     * @param AbstractDocument $mainDocument
     * @param Address $address
     * @param Contact $contact
     */
    public function __construct(string $name, AbstractDocument $mainDocument, Address $address, Contact $contact)
    {
        $this->name = $name;
        $this->mainDocument = $mainDocument;
        $this->address = $address;
        $this->contact = $contact;
    }

    /**
     * @return AbstractDocument
     */
    public function getMainDocument(): AbstractDocument
    {
        return $this->mainDocument;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return Contact
     */
    public function getContact(): Contact
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}