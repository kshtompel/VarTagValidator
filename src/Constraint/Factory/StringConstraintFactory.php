<?php

/*
 * This file is part of the VarTagValidator package
 *
 * (c) FiveLab
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FiveLab\Component\VarTagValidator\Constraint\Factory;

use FiveLab\Component\VarTagValidator\Constraint\ConstraintFactoryInterface;
use FiveLab\Component\VarTagValidator\Constraint\VarTagConstraint;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * String constraint factory
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class StringConstraintFactory implements ConstraintFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getVarTagConstraint()
    {
        return new VarTagConstraint([
            new Assert\Type('string')
        ]);
    }
}
