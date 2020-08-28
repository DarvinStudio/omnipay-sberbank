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

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Abstract response
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * @inheritDoc
     */
    public function getMessage(): ?string
    {
        return $this->data['errorMessage'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function getCode(): ?int
    {
        return $this->data['errorCode'] ?? null;
    }

    /**
     * @inheritDoc
     */
    public function isSuccessful(): bool
    {
        return $this->getCode() === 0;
    }

    /**
     * @inheritDoc
     */
    public function isRedirect(): bool
    {
        return array_key_exists('formUrl', $this->data) && $this instanceof RedirectResponseInterface;
    }

    /**
     * @inheritDoc
     */
    public function getTransactionReference(): ?string
    {
        return $this->data['orderId'] ?? null;
    }
}
