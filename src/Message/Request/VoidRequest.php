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
use Omnipay\Sberbank\Message\Response\VoidResponse;

/**
 * Void request
 */
class VoidRequest extends AbstractRequest
{
    /**
     * @inheritDoc
     */
    public function getData(): array
    {
        $this->validate('orderId');

        return [
            'orderId'  => $this->getOrderId(),
            'language' => $this->getLanguage(),
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getMethod(): string
    {
        return 'reverse.do';
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(AbstractRequest $request, $content): AbstractResponse
    {
        return new VoidResponse($request, $content);
    }
}
