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
 * Double constraint factory
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class DoubleConstraintFactory implements ConstraintFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function getVarTagConstraint()
    {
        $constraints = [];

        $constraints[] = new Assert\Type([
            'type' => 'numeric',
            'message' => 'This value should be of type float.',
            'groups' => 'FirstStep'
        ]);

        $constraints[] = new Assert\Regex([
            'pattern' => '/^[^\.]+(\.\d+)?$/',
            'message' => 'This value should be of type float.',
            'groups' => 'SecondStep'
        ]);

        $groupSequence = new Assert\GroupSequence(['FirstStep', 'SecondStep']);

        return new VarTagConstraint($constraints, $groupSequence);
    }
}
