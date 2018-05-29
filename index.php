<?php

include "vendor/autoload.php";

use Optional\Optional;

/// source http://nitschinger.at/A-Journey-on-Avoiding-Nulls-in-PHP/

$possible = Optional::of(5);
var_dump($possible->isPresent()); // bool(true)
var_dump($possible->get()); // int(5)
var_dump($possible->getOrElse(99)); // int(5)
var_dump($possible->getOrNull()); // int(5)


$possible = Optional::of(null); // Throws 'NullPointerException' with message 'Unallowed null in reference found.'
$possible = Optional::fromNullable(null);
var_dump($possible->isPresent()); // bool(false)
var_dump($possible->get()); // Throws IllegalStateException
var_dump($possible->getOrElse(99)); // int(99)
var_dump($possible->getOrNull()); // NULL

$val1 = Optional::fromNullable(5);
$val2 = Optional::fromNullable(4);
$val3 = Optional::fromNullable(4);

var_dump($val1->equals($val2)); // bool(false)
var_dump($val2->equals($val3)); // bool(true)