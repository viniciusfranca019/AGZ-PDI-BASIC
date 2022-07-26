<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Address\Domain\Model\Address;
use Vini\PooPhp\Contact\Domain\Model\Contact;

class Individual extends AbstractPerson
{
    protected Cpf $cpf;
    protected \DateTime $birthDate;
    protected PeapleCollection|null $dependents;

    /**
     * @param string $name
     * @param Cpf $cpf
     * @param \DateTime $birthDate
     * @param Address $address
     * @param Contact $contact
     * @param PeapleCollection|null $dependents
     */
    public function __construct(string $name, Cpf $cpf, \DateTime $birthDate, Address $address, Contact $contact, PeapleCollection|null $dependents = null)
    {
        parent::__construct($name, $cpf, $address, $contact);
        $this->cpf = $cpf;
        $this->birthDate = $birthDate;
        $this->dependents = $dependents;
    }

}