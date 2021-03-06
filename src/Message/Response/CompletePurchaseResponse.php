<?php declare(strict_types=1);
/**
 * @author    Darvin Studio <info@darvin-studio.ru>
 * @copyright Copyright (c) 2018-2020, Darvin Studio
 * @link      https://www.darvin-studio.ru
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\Sberbank\Message\Response;

/**
 * Complete purchase response
 */
class CompletePurchaseResponse extends AbstractResponse
{
    use CompleteResponseTrait;

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return '0' === $this->getCode() && 2 === $this->data['orderStatus'];
    }
}
