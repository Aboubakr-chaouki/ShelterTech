<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder5b891 = null;
    private $initializerf69bd = null;
    private static $publicPropertiesda865 = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getList', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getInstalledModules', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getMustBeConfiguredModules', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getUpgradableModules', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getModule', array('moduleName' => $moduleName), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'setActionUrls', array('collection' => $collection), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializerf69bd = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHolder5b891) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolder5b891 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHolder5b891->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__get', ['name' => $name], $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        if (isset(self::$publicPropertiesda865[$name])) {
            return $this->valueHolder5b891->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5b891;
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
        $targetObject = $this->valueHolder5b891;
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
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5b891;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolder5b891;
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
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__isset', array('name' => $name), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5b891;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolder5b891;
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
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__unset', array('name' => $name), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder5b891;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolder5b891;
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
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__clone', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        $this->valueHolder5b891 = clone $this->valueHolder5b891;
    }
    public function __sleep()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__sleep', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return array('valueHolder5b891');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerf69bd = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerf69bd;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'initializeProxy', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder5b891;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder5b891;
    }
}
