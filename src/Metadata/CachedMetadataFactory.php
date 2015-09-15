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

use FiveLab\Component\Cache\CacheInterface;

/**
 * Cached metadata factory
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class CachedMetadataFactory implements MetadataFactoryInterface
{
    /**
     * @var MetadataFactoryInterface
     */
    private $delegate;

    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * Construct
     *
     * @param MetadataFactoryInterface $delegate
     * @param CacheInterface           $cache
     */
    public function __construct(MetadataFactoryInterface $delegate, CacheInterface $cache)
    {
        $this->delegate = $delegate;
        $this->cache = $cache;
    }

    /**
     * {@inheritDoc}
     */
    public function loadMetadata($class)
    {
        $cacheKey = 'var_tag_validator.metadata:' . $class;

        if ($this->cache->has($cacheKey)) {
            return $this->cache->get($cacheKey);
        }

        $metadata = $this->delegate->loadMetadata($class);

        $this->cache->set($cacheKey, $metadata);

        return $metadata;
    }
}
