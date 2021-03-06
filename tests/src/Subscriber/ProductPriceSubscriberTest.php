<?php

namespace Jtl\Connector\Core\Test\Subscriber;

use Jtl\Connector\Core\Application\Request;
use Jtl\Connector\Core\Definition\Action;
use Jtl\Connector\Core\Definition\Controller;
use Jtl\Connector\Core\Event\RequestEvent;
use Jtl\Connector\Core\Exception\SubscriberException;
use Jtl\Connector\Core\Model\Category;
use Jtl\Connector\Core\Model\Product;
use Jtl\Connector\Core\Model\ProductPrice;
use Jtl\Connector\Core\Model\ProductPriceItem;
use Jtl\Connector\Core\Subscriber\ProductPriceSubscriber;
use Jtl\Connector\Core\Test\TestCase;

/**
 * Class PrepareProductPricesSubscriberTest
 * @package Jtl\Connector\Core\Test\Subscriber
 */
class ProductPriceSubscriberTest extends TestCase
{
    /**
     * @throws SubscriberException
     */
    public function testPrepareProductPrices()
    {
        $subscriber = new ProductPriceSubscriber();

        $params = [
            (new ProductPrice())->setProductId($firstProductId = $this->createIdentity())->addItem(new ProductPriceItem()),
            (new ProductPrice())->setProductId($secondProductId = $this->createIdentity()),
            (new ProductPrice())->setProductId($firstProductId),
            (new ProductPrice())->setProductId($secondProductId)
        ];

        $firstProduct = new Product();
        $firstProduct->setId($firstProductId);
        $firstProduct->addPrice($params[0]);
        $firstProduct->addPrice($params[2]);

        $secondProduct = new Product();
        $secondProduct->setId($secondProductId);
        $secondProduct->addPrice($params[1]);
        $secondProduct->addPrice($params[3]);


        $request = new Request(Controller::PRODUCT_PRICE, Action::PUSH, $params);

        $event = new RequestEvent($request);

        $subscriber->prepareProductPrices($event);

        $expected = [
            $firstProduct,
            $secondProduct
        ];

        $this->assertEquals($expected, $request->getParams());
    }

    /**
     * @throws SubscriberException
     * @throws \ReflectionException
     */
    public function testPrepareProductPricesNotMatchingDifferentControllers()
    {
        $controllers = Controller::getControllers();

        unset($controllers[array_search(Controller::PRODUCT_PRICE, $controllers, true)]);

        $subscriber = new ProductPriceSubscriber();

        foreach ($controllers as $controller) {
            $params = [
                $id = $this->createIdentity()
            ];

            $request = new Request($controller, Action::PUSH, $params);
            $event = new RequestEvent($request);

            $subscriber->prepareProductPrices($event);

            $expected = [
                $id
            ];

            $this->assertEquals($expected, $request->getParams());
        }
    }

    /**
     * @dataProvider productPriceParamsDataProvider
     *
     * @param $params
     * @param $expected
     * @throws SubscriberException
     */
    public function testPrepareProductPricesThrowsExceptionWhenInvalidModelIsInArray($params, $expected)
    {
        $this->expectExceptionObject(SubscriberException::invalidModelTypeInArray($expected[0], $expected[1]));

        $subscriber = new ProductPriceSubscriber();

        $request = new Request(Controller::PRODUCT_PRICE, Action::PUSH, $params);
        $event = new RequestEvent($request);

        $subscriber->prepareProductPrices($event);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function productPriceParamsDataProvider(): array
    {
        return [
            [
                [
                    (new ProductPrice())->setProductId($this->createIdentity()),
                    (new Category())->setId($this->createIdentity())
                ],
                [ProductPrice::class, Category::class]
            ],
            [
                [10, new Product()],
                [ProductPrice::class, 'variable']
            ],
            [
                [[]],
                [ProductPrice::class, 'variable']
            ],
            [
                [new \stdClass()],
                [ProductPrice::class, \stdClass::class]
            ]
        ];
    }
}
