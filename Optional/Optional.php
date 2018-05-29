<?php

namespace Optional;

use Optional\Exceptions\NullPointerException;

abstract class Optional 
{

    private function __construct() {}

    /**
     * Returns an instance with no contained reference.
     */
    public static function absent() {
        return Absent::instance();
    }

    /**
     * Returns an Optional instance containing the given non-null reference.
     */
    public static function of($reference) {
        return new Present(static::checkNotNull($reference));
    }

    /**
     * If reference is non-null, returns an Optional instance containing
     * that reference; otherwise returns Absent.
     */
    public static function fromNullable($reference) {
        return $reference === null ? static::absent() : new Present($reference);
    }

    public abstract function isPresent();
    public abstract function get();
    public abstract function getOrElse($defaultValue);
    public abstract function getOrNull();
    public abstract function equals($object);

    /**
     * Make sure the passed reference is not null.
     */
    protected static function checkNotNull($reference, $message = null) {
        if($message === null) {
            $message = "Unallowed null in reference found.";
        }

        if($reference === null) {
            throw new NullPointerException($message);
        }
        return $reference;
    }


}