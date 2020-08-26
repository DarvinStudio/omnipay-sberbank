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

use Omnipay\Common\Exception\InvalidRequestException;

/**
 * Complete authorize request
 */
class CompleteAuthorizeRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        if ($this->isEmptyParameter('orderId') && $this->isEmptyParameter('orderNumber')) {
            throw new InvalidRequestException("The orderId or orderNumber must specified");
        }

        return [
            'orderId'     => $this->getParameter('orderId'),
            'orderNumber' => $this->getParameter('orderNumber'),
            'language'    => $this->getParameter('language'),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMethod(): string
    {
        return 'getOrderStatusExtended.do';
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(AbstractRequest $request, $content): AbstractResponse
    {
        return new CompleteAuthorizeResponse($request, $content);
    }
}
