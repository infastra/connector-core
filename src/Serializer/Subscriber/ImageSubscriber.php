<?php

namespace Jtl\Connector\Core\Serializer\Subscriber;

use Jawira\CaseConverter\CaseConverterException;
use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Exception\SerializerException;
use Jtl\Connector\Core\Model\AbstractImage;
use Jtl\Connector\Core\Model\Ack;
use Jtl\Connector\Core\Model\Identity;
use Jtl\Connector\Core\Utilities\Str;

class ImageSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.post_serialize',
                'method' => 'onPostSerialize',
                'format' => 'json'
            ],
            [
                'event' => 'serializer.post_deserialize',
                'method' => 'onPostDeserialize',
                'format' => 'json'
            ]
        ];
    }

    /**
     * @param ObjectEvent $event
     */
    public function onPostSerialize(ObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof AbstractImage) {
            $id = clone $object->getId();
            $id->setEndpoint(sprintf('%s#=#%s', $object->getRelationType(), $id->getEndpoint()));
            $serializedId = $id->toArray();
            $event->getVisitor()->visitProperty(new StaticPropertyMetadata('', 'id', $serializedId), $serializedId);
        }
    }

    /**
     * @param ObjectEvent $event
     * @throws SerializerException
     * @throws CaseConverterException
     */
    public function onPostDeserialize(ObjectEvent $event)
    {
        $object = $event->getObject();
        if ($object instanceof Ack) {
            $identities = $object->getIdentities();
            $imageIndex = Str::toCamelCase(Controller::IMAGE);
            if (isset($identities[$imageIndex])) {
                $resortedIdentities = [];
                /** @var Identity $identity */
                foreach ($identities[$imageIndex] as $identity) {
                    $splittedEndpoint = explode('#=#', $identity->getEndpoint());
                    if (count($splittedEndpoint) !== 2) {
                        throw SerializerException::wrongEndpointFormat($identity->getEndpoint());
                    }
                    $newIndex = Str::toCamelCase($splittedEndpoint[0]) . 'Image';
                    $identity->setEndpoint($splittedEndpoint[1]);
                    $resortedIdentities[$newIndex][] = $identity;
                }
                unset($identities[$imageIndex]);
                $identities += $resortedIdentities;
                $object->setIdentities($identities);
            }
        }
    }
}
