<?php declare(strict_types=1);
/**
 * @author    Darvin Studio <info@darvin-studio.ru>
 * @copyright Copyright (c) 2018-2020, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Sberbank\Message\Request;

use Omnipay\Sberbank\Message\Response\AbstractResponse;
use Omnipay\Sberbank\Message\Response\PurchaseResponse;

/**
 * Purchase request
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * @return array
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData(): array
    {
        $this->validate('orderNumber', 'amount', 'returnUrl');

        return [
            'orderNumber'        => $this->getOrderNumber(),
            'amount'             => $this->getAmountInteger(),
            'currency'           => $this->getCurrencyNumeric(),
            'returnUrl'          => $this->getReturnUrl(),
            'failUrl'            => $this->getFailUrl(),
            'description'        => $this->getDescription(),
            'language'           => $this->getLanguage(),
            'pageView'           => $this->getPageView(),
            'clientId'           => $this->getClientId(),
            'merchantLogin'      => $this->getMerchantLogin(),
            'jsonParams'         => $this->getJsonParams(),
            'sessionTimeoutSecs' => $this->getSessionTimeoutSecs(),
            'expirationDate'     => $this->getExpirationDate(),
            'bindingId'          => $this->getBindingId(),
            'features'           => $this->getFeatures(),
            'email'              => $this->getEmail(),
            'phone'              => $this->getPhone(),
            'taxSystem'          => $this->getTaxSystem(),
            'orderBundle'        => $this->getOrderBundle(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMethod(): string
    {
        return 'register.do';
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(AbstractRequest $request, $content): AbstractResponse
    {
        return new PurchaseResponse($request, $content);
    }
}
