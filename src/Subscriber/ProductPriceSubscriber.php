<?php
namespace Jtl\Connector\Core\Subscriber;

use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Definition\Event;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Exception\SubscriberException;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductPrice;
use Jtl\Connector\Core\Model\ProductPriceItem;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductPriceSubscriber implements EventSubscriberInterface
{
    /**
     * @return array
     * @throws \Exception
     */
    public static function getSubscribedEvents()
    {
        return [
            Event::createHandleEventName(Controller::PRODUCT_PRICE, Action::PUSH, Event::BEFORE) => [
                ['prepareProductPrices', 10000]
            ]
        ];
    }

    /**
     * @param RequestEvent $event
     * @throws SubscriberException
     */
    public function prepareProductPrices(RequestEvent $event)
    {
        $request = $event->getRequest();
        if ($request->getController() === Controller::PRODUCT_PRICE && $request->getAction() === Action::PUSH) {
            $prices = $request->getParams();
            $resortedPrices = [];

            /** @var ProductPrice $price */
            foreach ($prices as $price) {
                if ($price instanceof ProductPrice === false) {
                    throw SubscriberException::invalidModelTypeInArray(
                        ProductPrice::class,
                        is_object($price) ? get_class($price) : 'variable'
                    );
                }

                $priceItems = $price->getItems();
                usort($priceItems, function(ProductPriceItem $a, ProductPriceItem $b) {
                    return $a->getQuantity() - $b->getQuantity();
                });

                $price->setItems(...$priceItems);
                $hostId = $price->getProductId()->getHost();
                if (!isset($resortedPrices[$hostId])) {
                    $resortedPrices[$hostId] = (new Product())->setId($price->getProductId());
                }

                $resortedPrices[$hostId]->addPrice($price);
            }

            $request->setParams(array_values($resortedPrices));
        }
    }
}
