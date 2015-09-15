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

/**
 * All factory registry should implement this interface
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
interface FactoryRegistryInterface
{
    /**
     * Get constraint factory for type or alias
     *
     * @param string $typeOrAlias
     *
     * @return ConstraintFactoryInterface
     *
     * @throws \FiveLab\Component\VarTagValidator\Exception\ConstraintFactoryNotFoundException
     */
    public function getConstraintFactory($typeOrAlias);

    /**
     * Add constraint factory alias for type
     *
     * @param string $alias
     * @param string $type
     */
    public function addConstraintFactoryAlias($alias, $type);
}
