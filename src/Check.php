<?php

namespace Omnipay\Payflow;

use Symfony\Component\HttpFoundation\ParameterBag;

class Check
{
    use ParametersTrait;
    
    public function __construct($parameters = null)
    {
        $this->initialize($parameters);
    }
    
    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     * @return $this
     */
    public function initialize(array $parameters = null)
    {
        $this->parameters = new ParameterBag;

        Helper::initialize($this, $parameters);

        return $this;
    }
    
    public function validate()
    {
        $requiredParameters = array(
            'number' => 'account number',
            'routing_number' => 'routing number',
            'account_type' => 'account type',
            'name' => 'name',
        );

        foreach ($requiredParameters as $key => $val) {
            if (!$this->getParameter($key)) {
                throw new InvalidCheckException("The $val is required");
            }
        }
    }
    
    public function getRoutingNumber()
    {
        return $this->getParameter('routing_number');
    }

    public function setRoutingNumber($value)
    {
        return $this->setParameter('routing_number', $value);
    }
    
    public function getNumber()
    {
        return $this->getParameter('number');
    }

    public function setNumber($value)
    {
        return $this->setParameter('number', $value);
    }
    
    public function getAccountType()
    {
        return $this->getParameter('account_type');
    }

    public function setAccountType($value)
    {
        return $this->setParameter('account_type', $value);
    }
    
    public function getName()
    {
        return $this->getParameter('name');
    }

    public function setname($value)
    {
        return $this->setParameter('name', $value);
    }
}