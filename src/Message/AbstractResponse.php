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
 * Abstract response
 */
abstract class AbstractResponse extends \Omnipay\Common\Message\AbstractResponse
{
    /**
     * {@inheritdoc}
     */
    public function getMessage(): ?string
    {
        return $this->data['errorMessage'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getCode(): ?int
    {
        return $this->data['errorCode'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return $this->getCode() === 0;
    }
}
