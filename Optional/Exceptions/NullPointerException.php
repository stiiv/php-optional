<?php

namespace Optional\Exceptions;

use Exception;

class NullPointerException extends Exception
{
	protected $message = 'Unallowed null in reference found.';
}