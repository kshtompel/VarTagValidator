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
 * All VarTag metadata factory should implement of this interface
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
interface MetadataFactoryInterface
{
    /**
     * Load for class
     *
     * @param string $class
     *
     * @return ClassMetadata
     */
    public function loadMetadata($class);
}
