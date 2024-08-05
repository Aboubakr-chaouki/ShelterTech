<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder9de52 = null;
    private $initializer560a0 = null;
    private static $publicProperties610bc = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getList', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getInstalledModules', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getMustBeConfiguredModules', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getUpgradableModules', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getModule', array('moduleName' => $moduleName), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'setActionUrls', array('collection' => $collection), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializer560a0 = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHolder9de52) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolder9de52 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHolder9de52->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__get', ['name' => $name], $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        if (isset(self::$publicProperties610bc[$name])) {
            return $this->valueHolder9de52->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9de52;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder9de52;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9de52;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder9de52;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__isset', array('name' => $name), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9de52;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder9de52;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__unset', array('name' => $name), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder9de52;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder9de52;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__clone', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        $this->valueHolder9de52 = clone $this->valueHolder9de52;
    }
    public function __sleep()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__sleep', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return array('valueHolder9de52');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer560a0 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer560a0;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'initializeProxy', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder9de52;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder9de52;
    }
}
