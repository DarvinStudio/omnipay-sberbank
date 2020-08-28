<?php declare(strict_types=1);
/**
 * @author    Darvin Studio <info@darvin-studio.ru>
 * @copyright Copyright (c) 2018-2020, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Sberbank;

use Omnipay\Sberbank\Message\Request\AuthorizeRequest;
use Omnipay\Sberbank\Message\Request\CaptureRequest;
use Omnipay\Sberbank\Message\Request\CompleteAuthorizeRequest;
use Omnipay\Sberbank\Message\Request\CompletePurchaseRequest;
use Omnipay\Sberbank\Message\Request\PurchaseRequest;
use Omnipay\Sberbank\Message\Request\RefundRequest;
use Omnipay\Sberbank\Message\Request\VoidRequest;
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
        return $this->createRequest(CompletePurchaseRequest::class, $options);
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
