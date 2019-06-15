<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Mapping\Type;

use WernerDweight\RA\RA;

interface DoctrineCrudApiMappingTypeInterface
{
    /** @var string */
    public const LISTABLE = 'listable';
    /** @var string */
    public const DEFAULT_LISTABLE = 'default-listable';
    /** @var string */
    public const CREATABLE = 'creatable';
    /** @var string */
    public const UPDATABLE = 'updatable';
    /** @var string */
    public const UPDATABLE_NESTED = 'updatable-nested';
    /** @var string */
    public const METADATA = 'metadata';
    /** @var string[] */
    public const MAPPING_TYPES = [
        self::LISTABLE,
        self::CREATABLE,
        self::UPDATABLE,
        self::METADATA,
    ];

    /** @var string */
    public const METADATA_TYPE = 'type';
    /** @var string */
    public const METADATA_TYPE_COLLECTION = 'collection';
    /** @var string */
    public const METADATA_TYPE_ENTITY = 'entity';

    /** @var string */
    public const METADATA_CLASS = 'class';

    /** @var string */
    public const METADATA_PAYLOAD = 'payload';
    /** @var string */
    public const METADATA_PAYLOAD_ARGUMENT = 'argument';

    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @param object $propertyMapping
     * @param object $filteredMapping
     * @param RA $config
     * @return RA
     */
    public function readConfiguration(object $propertyMapping, object $filteredMapping, RA $config): RA;
}
