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
 * All constraint factories should implement this interface
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
interface ConstraintFactoryInterface
{
    /**
     * Get var tag constraint
     *
     * @return \FiveLab\Component\VarTagValidator\Constraint\VarTagConstraint
     */
    public function getVarTagConstraint();
}
