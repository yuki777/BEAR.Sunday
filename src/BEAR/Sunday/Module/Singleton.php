<?php
/**
 * This file is part of the BEAR.Sunday package
 *
 * @package BEAR.Sunday
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Sunday\Module;

/**
 * Singleton traint
 *
 * @package    BEAR.Sunday
 * @subpackage Module
 */
trait Singleton
{
    /**
     * Return singleton instance
     *
     * @return object
     */
    public function get()
    {
        static $instance;

        if ($instance === null) {
            $instance = $this->newInstance();
        }

        return $instance;
    }
}
