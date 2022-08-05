<?php

namespace Vini\PooPhp\Person\Domain\Model;

use Vini\PooPhp\Address\Domain\Model\Address;
use Vini\PooPhp\Contact\Domain\Model\Contact;

class LegalEntity extends AbstractPerson
{
    protected Cnpj $cnpj;
    protected \DateTime $foundingDate;
    protected PeapleCollection|null $partners;

    /**
     * @param string $name
     * @param Cnpj $cnpj
     * @param \DateTime $foundingDate
     * @param Address $address
     * @param Contact $contact
     * @param PeapleCollection|null $partners
     */
    public function __construct(string $name, Cnpj $cnpj, \DateTime $foundingDate, Address $address, Contact $contact, PeapleCollection|null $partners = null)
    {
        parent::__construct($name, $cnpj, $address, $contact);
        $this->cnpj = $cnpj;
        $this->foundingDate = $foundingDate;
        $this->partners = $partners;
    }

}