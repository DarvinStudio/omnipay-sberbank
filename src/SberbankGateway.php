<?php declare(strict_types=1);
/**
 * @author    Darvin Studio <info@darvin-studio.ru>
 * @copyright Copyright (c) 2018-2020, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\Omnipay\Sberbank;

use Darvin\Omnipay\Sberbank\Message\AuthorizeRequest;
use Darvin\Omnipay\Sberbank\Message\CaptureRequest;
use Darvin\Omnipay\Sberbank\Message\CompleteAuthorizeRequest;
use Darvin\Omnipay\Sberbank\Message\PurchaseRequest;
use Darvin\Omnipay\Sberbank\Message\RefundRequest;
use Darvin\Omnipay\Sberbank\Message\VoidRequest;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Exception\BadMethodCallException;
use Omnipay\Common\Message\RequestInterface;

/**
 * Class Sberbank gateway
 */
class SberbankGateway extends AbstractGateway
{
    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'Sberbank';
    }

    /**
     * @inheritDoc
     */
    public function getDefaultParameters(): array
    {
        return [
            'userName' => '',
            'password' => '',
            'testMode' => false,
        ];
    }

    /**
     * @inheritDoc
     */
    public function authorize(array $options = []): RequestInterface
    {
        return $this->createRequest(AuthorizeRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function completeAuthorize(array $options = []): RequestInterface
    {
        return $this->createRequest(CompleteAuthorizeRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function purchase(array $options = []): RequestInterface
    {
        return $this->createRequest(PurchaseRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function completePurchase(array $options = []): RequestInterface
    {
        return $this->completeAuthorize($options);
    }

    /**
     * @inheritDoc
     */
    public function capture(array $options = []): RequestInterface
    {
        return $this->createRequest(CaptureRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function refund(array $options = []): RequestInterface
    {
        return $this->createRequest(RefundRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function void(array $options = []): RequestInterface
    {
        return $this->createRequest(VoidRequest::class, $options);
    }

    /**
     * @inheritDoc
     */
    public function acceptNotification(array $options = []): RequestInterface
    {
        throw new BadMethodCallException(sprintf('Method "%s" is not supported', __FUNCTION__));
    }

    /**
     * @inheritDoc
     */
    public function fetchTransaction(array $options = []): RequestInterface
    {
        throw new BadMethodCallException(sprintf('Method "%s" is not supported', __FUNCTION__));
    }

    /**
     * @inheritDoc
     */
    public function createCard(array $options = []): RequestInterface
    {
        throw new BadMethodCallException(sprintf('Method "%s" is not supported', __FUNCTION__));
    }

    /**
     * @inheritDoc
     */
    public function updateCard(array $options = []): RequestInterface
    {
        throw new BadMethodCallException(sprintf('Method "%s" is not supported', __FUNCTION__));
    }

    /**
     * @inheritDoc
     */
    public function deleteCard(array $options = []): RequestInterface
    {
        throw new BadMethodCallException(sprintf('Method "%s" is not supported', __FUNCTION__));
    }
}
