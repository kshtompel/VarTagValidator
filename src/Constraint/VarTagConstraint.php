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

use Symfony\Component\Validator\Constraints\GroupSequence;

/**
 * Var tag constraint
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class VarTagConstraint
{
    /**
     * @var array|\Symfony\Component\Validator\Constraint[]
     */
    private $constraints;

    /**
     * @var GroupSequence
     */
    private $groupSequence;

    /**
     * Construct
     *
     * @param array|\Symfony\Component\Validator\Constraint[] $constraints
     * @param GroupSequence                                   $groupSequence
     */
    public function __construct(array $constraints, GroupSequence $groupSequence = null)
    {
        $this->constraints = $constraints;
        $this->groupSequence = $groupSequence;
    }

    /**
     * Get constraints
     *
     * @return array|\Symfony\Component\Validator\Constraint[]
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * Get group sequence
     *
     * @return GroupSequence
     */
    public function getGroupSequence()
    {
        return $this->groupSequence;
    }
}
