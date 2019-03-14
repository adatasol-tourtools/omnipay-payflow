<?php

namespace Omnipay\Payflow\Exception;

use Omnipay\Common\Exception\OmnipayException;

/**
 * Invalid Credit Card Exception
 *
 * Thrown when a credit card is invalid or missing required fields.
 */
class InvalidCheckException extends \Exception implements OmnipayException
{
}
