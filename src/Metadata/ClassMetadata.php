<?php

/*
 * This file is part of the VarTagValidator package
 *
 * (c) FiveLab
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code
 */

namespace FiveLab\Component\VarTagValidator\Metadata;

/**
 * Class metadata
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class ClassMetadata
{
    /**
     * @var array|PropertyMetadata[]
     */
    private $properties = [];

    /**
     * Construct
     *
     * @param array|PropertyMetadata[] $properties
     */
    public function __construct(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get properties
     *
     * @return array|PropertyMetadata[]
     */
    public function getProperties()
    {
        return $this->properties;
    }
}
