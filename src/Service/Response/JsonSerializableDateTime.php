<?php
declare(strict_types=1);

namespace WernerDweight\DoctrineCrudApiBundle\Service\Response;

class JsonSerializableDateTime extends \DateTime implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return $this->format('c');
    }
}
