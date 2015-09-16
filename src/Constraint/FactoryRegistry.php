<?php

/*
 * This file is part of the VarTagValidator package
 *
 * (c) FiveLab
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FiveLab\Component\VarTagValidator\Constraint;

use FiveLab\Component\VarTagValidator\Constraint\Factory\ArrayConstraintFactory;
use FiveLab\Component\VarTagValidator\Constraint\Factory\DoubleConstraintFactory;
use FiveLab\Component\VarTagValidator\Constraint\Factory\IntegerConstraintFactory;
use FiveLab\Component\VarTagValidator\Constraint\Factory\ScalarConstraintFactory;
use FiveLab\Component\VarTagValidator\Constraint\Factory\StringConstraintFactory;
use FiveLab\Component\VarTagValidator\Exception\ConstraintFactoryNotFoundException;

/**
 * Base factory registry
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class FactoryRegistry implements FactoryRegistryInterface
{
    /**
     * @var array|ConstraintFactoryInterface[]
     */
    private $factories = [];

    /**
     * @var array
     */
    private $factoryAliases = [];

    /**
     * Add factory
     *
     * @param string                     $type
     * @param ConstraintFactoryInterface $factory
     *
     * @return FactoryRegistry
     */
    public function addConstraintFactory($type, ConstraintFactoryInterface $factory)
    {
        $this->factories[$type] = $factory;

        return $this;
    }

    /**
     * Add factory alias for type
     *
     * @param string $alias
     * @param string $type
     *
     * @return FactoryRegistry
     */
    public function addConstraintFactoryAlias($alias, $type)
    {
        $this->factoryAliases[$alias] = $type;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getConstraintFactory($typeOrAlias)
    {
        if (isset($this->factoryAliases[$typeOrAlias])) {
            $typeOrAlias = $this->factoryAliases[$typeOrAlias];
        }

        if (!isset($this->factories[$typeOrAlias])) {
            throw new ConstraintFactoryNotFoundException(sprintf(
                'Not found constraint factory for type "%s".',
                $typeOrAlias
            ));
        }

        return $this->factories[$typeOrAlias];
    }

    /**
     * Create default registry
     *
     * @return FactoryRegistry
     */
    public static function createDefault()
    {
        /** @var FactoryRegistry $registry */
        $registry = new static();

        $registry->addConstraintFactory('integer', new IntegerConstraintFactory());
        $registry->addConstraintFactoryAlias('int', 'integer');

        $registry->addConstraintFactory('double', new DoubleConstraintFactory());
        $registry->addConstraintFactoryAlias('float', 'double');

        $registry->addConstraintFactory('array', new ArrayConstraintFactory());

        $registry->addConstraintFactory('string', new StringConstraintFactory());

        return $registry;
    }
}
