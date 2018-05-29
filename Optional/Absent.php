<?php

namespace Optional;

use Optional\Exceptions\IllegalStateException;

class Absent extends Optional 
{
    private static $instance;

    private function __construct() {}

    public function isPresent() {
        return false;
    }

    public function get() {
        throw new IllegalStateException("Optional->get() cannot be called on an absent value");
    }

    public function getOrElse($defaultValue) {
        $message = "use Optional->orNull() instead of Optional->or(null)";
        return static::checkNotNull($defaultValue, $message);
    }

    public function getOrNull() {
        return null;
    }

    public function equals($object) {
        return $object === $this;
    }

    protected static function instance() {
        if(static::$instance == null) {
            return static::$instance = new Absent();
        }
        return static::$instance;
    }

}