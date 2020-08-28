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
