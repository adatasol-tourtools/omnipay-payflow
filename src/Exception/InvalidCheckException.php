<?php

namespace Omnipay\Payflow\Exception;

/**
 * Invalid Credit Card Exception
 *
 * Thrown when a credit card is invalid or missing required fields.
 */
class InvalidCheckException extends \Exception implements OmnipayException
{
}
