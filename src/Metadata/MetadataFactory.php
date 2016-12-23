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

use FiveLab\Component\Reflection\Reflection;
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlockFactory;


/**
 * Base metadata factory
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class MetadataFactory implements MetadataFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function loadMetadata($class)
    {
        $properties = Reflection::getClassProperties($class, true);

        $metadataProperties = [];

        foreach ($properties as $property) {
            if (is_object($property) && !method_exists($property, 'getDocComment')) {
                throw new \InvalidArgumentException(
                    'Invalid object passed; the given reflector must support '
                    . 'the getDocComment method'
                );
            }

            $docblock = $property->getDocComment();
            $docBlockFactory = DocBlockFactory::createInstance();

            /** @var DocBlock $docBlock */
            $docBlock = $docBlockFactory->create($docblock);


            $docVarTags = $docBlock->getTagsByName('var');

            if (count($docVarTags)) {
                $types = array_map(function (Var_ $docVarTag) {
                    return ltrim($docVarTag->getType(), '\\');
                }, $docVarTags);

                if (count($types)) {
                    $propertyMetadata = new PropertyMetadata($types);
                    $metadataProperties[$property->getName()] = $propertyMetadata;
                }
            }
        }

        $classMetadata = new ClassMetadata($metadataProperties);

        return $classMetadata;
    }
}
