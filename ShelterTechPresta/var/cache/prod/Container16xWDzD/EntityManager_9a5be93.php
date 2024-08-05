<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder5b891 = null;
    private $initializerf69bd = null;
    private static $publicPropertiesda865 = [
        
    ];
    public function getConnection()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getConnection', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getMetadataFactory', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getExpressionBuilder', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'beginTransaction', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->beginTransaction();
    }
    public function getCache()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getCache', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getCache();
    }
    public function transactional($func)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'transactional', array('func' => $func), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'wrapInTransaction', array('func' => $func), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'commit', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->commit();
    }
    public function rollback()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'rollback', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getClassMetadata', array('className' => $className), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'createQuery', array('dql' => $dql), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'createNamedQuery', array('name' => $name), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'createQueryBuilder', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'flush', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'clear', array('entityName' => $entityName), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->clear($entityName);
    }
    public function close()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'close', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->close();
    }
    public function persist($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'persist', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'remove', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'refresh', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'detach', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'merge', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getRepository', array('entityName' => $entityName), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'contains', array('entity' => $entity), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getEventManager', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getConfiguration', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'isOpen', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getUnitOfWork', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getProxyFactory', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'initializeObject', array('obj' => $obj), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'getFilters', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'isFiltersStateClean', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, 'hasFilters', array(), $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        return $this->valueHolder5b891->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializerf69bd = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder5b891) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder5b891 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder5b891->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializerf69bd && ($this->initializerf69bd->__invoke($valueHolder5b891, $this, '__get', ['name' => $name], $this->initializerf69bd) || 1) && $this->valueHolder5b891 = $valueHolder5b891;
        if (isset(self::$publicPropertiesda865[$name])) {
            return $this->valueHolder5b891->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
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
