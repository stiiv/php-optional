<?php

namespace Optional;

class Present extends Optional 
{
    private $reference;

    protected function __construct($reference) {
        $this->reference = $reference;
    }

    public function isPresent() {
        return true;
    }

    public function get() {
        return $this->reference;
    }

    public function getOrElse($defaultValue) {
        $message = "use Optional->orNull() instead of Optional->or(null)";
        static::checkNotNull($defaultValue, $message);
        return $this->reference;
    }

    public function getOrNull() {
        return $this->reference;
    }


    public function equals($object) {
        if($object instanceof Present) {
            return $this->reference === $object->get();
        }
        return false;
    }
}