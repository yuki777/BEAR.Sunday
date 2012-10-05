<?php
/**
 * This file is part of the BEAR.Framework package
 *
 * @package BEAR.Framework
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace BEAR\Sunday\Module\Resource;

use Ray\Di\Injector;
use Ray\Di\InjectorInterface;
use Ray\Di\AbstractModule;
use Ray\Di\Scope;

/**
 * Resource module
 *
 * @package    BEAR.Framework
 * @subpackage Module
 */
class ResourceModule extends AbstractModule
{
    private $injector;

    /**
     * Constructor
     *
     * @param InjectorInterfacce $injector
     */
    public function __construct(InjectorInterface $injector)
    {
        $this->injector = $injector;
        parent::__construct();
    }

    /**
     * Configure
     *
     * @return void
     */
    protected function configure()
    {
        $this->bind('Ray\Di\InjectorInterface')->toInstance($this->injector);
        $this->bind('BEAR\Resource\ResourceInterface')->to('BEAR\Resource\Resource')->in(Scope::SINGLETON);
        $this->bind('BEAR\Resource\InvokerInterface')->to('BEAR\Resource\Invoker')->in(Scope::SINGLETON);
        $this->bind('BEAR\Resource\LinkerInterface')->to('BEAR\Resource\Linker')->in(Scope::SINGLETON);
        $this->bind('BEAR\Resource\LoggerInterface')->annotatedWith("resource_logger")->to('BEAR\Resource\Logger');
        $this->bind('BEAR\Resource\LoggerInterface')->toProvider('BEAR\Sunday\Module\Provider\ResourceLoggerProvider');
        $this->bind('BEAR\Resource\Referable')->to('BEAR\Resource\A');
        $this->bind('BEAR\Sunday\Resource\CacheControl\Taggable')->to('BEAR\Sunday\Resource\CacheControl\Etag');
    }
}
