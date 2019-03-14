<?php

namespace Omnipay\Payflow;

use Omnipay\Common\Helper;
use Omnipay\Payflow\Exception\InvalidCheckException;
use Symfony\Component\HttpFoundation\ParameterBag;

class Check
{   
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
    
    /**
     * Get all parameters.
     *
     * @return array An associative array of parameters.
     */
    public function getParameters()
    {
        return $this->parameters->all();
    }

    /**
     * Get one parameter.
     *
     * @return mixed A single parameter value.
     */
    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    /**
     * Set one parameter.
     *
     * @param string $key Parameter key
     * @param mixed $value Parameter value
     * @return $this
     */
    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);

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