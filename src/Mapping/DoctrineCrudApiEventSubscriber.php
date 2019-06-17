<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Mapping;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Events;

final class DoctrineCrudApiEventSubscriber implements EventSubscriber
{
    /** @var DoctrineCrudApiMetadataFactory */
    private $metadataFactory;

    /**
     * DoctrineCrudApiEventSubscriber constructor.
     *
     * @param DoctrineCrudApiMetadataFactory $metadataFactory
     */
    public function __construct(DoctrineCrudApiMetadataFactory $metadataFactory)
    {
        $this->metadataFactory = $metadataFactory;
    }

    /**
     * @return string[]
     */
    public function getSubscribedEvents(): array
    {
        return [
            Events::loadClassMetadata,
        ];
    }

    /**
     * @param LoadClassMetadataEventArgs $args
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $args): void
    {
        $this->metadataFactory->extendClassMetadata($args->getClassMetadata());
    }
}
