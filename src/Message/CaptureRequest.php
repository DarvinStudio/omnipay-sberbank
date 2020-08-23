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
 * Capture request
 */
class CaptureRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        $this->validate('orderId', 'amount');

        return [
            'orderId' => $this->getParameter('orderId'),
            'amount'  => $this->getAmountInteger(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMethod(): string
    {
        return 'deposit.do';
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(AbstractRequest $request, $content): AbstractResponse
    {
        return new CaptureResponse($request, $content);
    }
}
