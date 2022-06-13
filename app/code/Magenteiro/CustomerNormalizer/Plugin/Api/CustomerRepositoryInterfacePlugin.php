<?php

namespace Magenteiro\CustomerNormalizer\Plugin\Api;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Api\Data\CustomerInterface;


class CustomerRepositoryInterfacePlugin
{
    /**
     * alterar dados de cliente no momento do registro
     */
    public function beforeSave(CustomerRepositoryInterface $subject, CustomerInterface $customer, $passwordHash = null)
    {
        // converter a strind para primeira letra maiuscula
        $customer->setFirstname(mb_convert_case($customer->getFirstname(), MB_CASE_TITLE));
        $customer->setLastname(mb_convert_case($customer->getLastname(), MB_CASE_TITLE));
        // email tudo em letras minusculas
        $customer->setEmail(mb_convert_case($customer->getEmail(), MB_CASE_LOWER));

        return [$customer, $passwordHash];
    }

}
