<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Address\Domain\Model\Address;
use Vini\PooPhp\Contact\Domain\Model\Contact;

class LegalEntity extends AbstractPerson
{
    protected Cnpj $cnpj;
    protected \DateTime $foundingDate;
    protected PeapleCollection $partners;

    /**
     * @param string $name
     * @param Cpf $cpf
     * @param \DateTime $birthDate
     * @param Address $address
     * @param Contact $contact
     * @param PeapleCollection $dependents
     */
    public function __construct(string $name, Cnpj $cnpj, \DateTime $foundingDate, Address $address, Contact $contact, PeapleCollection $partners)
    {
        parent::__construct($name, $cnpj, $address, $contact);
        $this->cnpj = $cnpj;
        $this->foundingDate = $foundingDate;
        $this->partners = $partners;
    }

}