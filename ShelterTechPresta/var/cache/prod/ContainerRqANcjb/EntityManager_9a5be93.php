<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder9de52 = null;
    private $initializer560a0 = null;
    private static $publicProperties610bc = [
        
    ];
    public function getConnection()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getConnection', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getMetadataFactory', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getExpressionBuilder', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'beginTransaction', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getCache', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getCache();
    }
    public function transactional($func)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'transactional', array('func' => $func), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'wrapInTransaction', array('func' => $func), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'commit', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->commit();
    }
    public function rollback()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'rollback', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getClassMetadata', array('className' => $className), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'createQuery', array('dql' => $dql), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'createNamedQuery', array('name' => $name), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'createQueryBuilder', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'flush', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'clear', array('entityName' => $entityName), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->clear($entityName);
    }
    public function close()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'close', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->close();
    }
    public function persist($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'persist', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'remove', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'refresh', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'detach', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'merge', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getRepository', array('entityName' => $entityName), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'contains', array('entity' => $entity), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getEventManager', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getConfiguration', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'isOpen', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getUnitOfWork', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getProxyFactory', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'initializeObject', array('obj' => $obj), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'getFilters', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'isFiltersStateClean', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, 'hasFilters', array(), $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        return $this->valueHolder9de52->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer560a0 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolder9de52) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder9de52 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolder9de52->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer560a0 && ($this->initializer560a0->__invoke($valueHolder9de52, $this, '__get', ['name' => $name], $this->initializer560a0) || 1) && $this->valueHolder9de52 = $valueHolder9de52;
        if (isset(self::$publicProperties610bc[$name])) {
            return $this->valueHolder9de52->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
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
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
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
