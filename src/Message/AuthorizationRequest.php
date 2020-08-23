<?php declare(strict_types=1);
/**
 * @author    Darvin Studio <info@darvin-studio.ru>
 * @copyright Copyright (c) 2018-2020, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darvin\Omnipay\Sberbank\Message;

/**
 * Authorize request
 */
class AuthorizationRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        $this->validate('orderNumber', 'amount', 'returnUrl');

        return [
            'orderNumber'        => $this->getParameter('orderNumber'),
            'amount'             => $this->getAmountInteger(),
            'currency'           => $this->getCurrencyNumeric(),
            'returnUrl'          => $this->getReturnUrl(),
            'failUrl'            => $this->getParameter('failUrl'),
            'description'        => $this->getDescription(),
            'language'           => $this->getParameter('language'),
            'pageView'           => $this->getParameter('pageView'),
            'clientId'           => $this->getParameter('clientId'),
            'merchantLogin'      => $this->getParameter('merchantLogin'),
            'jsonParams'         => $this->getParameter('jsonParams'),
            'sessionTimeoutSecs' => $this->getParameter('sessionTimeoutSecs'),
            'expirationDate'     => $this->getParameter('expirationDate'),
            'bindingId'          => $this->getParameter('bindingId'),
            'features'           => $this->getParameter('features'),
            'email'              => $this->getParameter('email'),
            'phone'              => $this->getParameter('phone'),
            'taxSystem'          => $this->getParameter('taxSystem'),
            'orderBundle'        => $this->getParameter('orderBundle'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMethod(): string
    {
        return $this->getParameter('preAuth') ? 'registerPreAuth.do' : 'register.do';
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(AbstractRequest $request, $content): AbstractResponse
    {
        return new AuthorizationResponse($request, $content);
    }
}
