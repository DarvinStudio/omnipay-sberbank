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
 * Complete authorize response
 */
class CompleteAuthorizationResponse extends AbstractResponse
{
    /**
     * @return mixed|null
     */
    public function getOrderNumber()
    {
        return $this->data['orderNumber'] ?? null;
    }

    /**
     * @return int|null
     */
    public function getOrderStatus(): ?int
    {
        return $this->data['orderStatus'] ?? null;
    }

    /**
     * @return int
     */
    public function getActionCode(): int
    {
        return $this->data['actionCode'];
    }

    /**
     * @return string|null
     */
    public function getActionCodeDescription(): ?string
    {
        return $this->data['actionCodeDescription'] ?? null;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->data['amount'];
    }

    /**
     * @return int|null
     */
    public function getCurrency(): ?int
    {
        return $this->data['currency'] ?? null;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->data['date'];
    }

    /**
     * @return string|null
     */
    public function getOrderDescription(): ?string
    {
        return $this->data['orderDescription'] ?? null;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->data['ip'];
    }

    /**
     * @return string|null
     */
    public function refundedDate(): ?string
    {
        return $this->data['refundedDate'] ?? null;
    }

    /**
     * @return array
     */
    public function getMerchantOrderParams(): array
    {
        return $this->data['merchantOrderParams'] ?? [];
    }

    /**
     * @return array
     */
    public function getCardAuthInfo(): array
    {
        return $this->data['cardAuthInfo'] ?? [];
    }

    /**
     * @return array
     */
    public function getSecureAuthInfo(): array
    {
        return $this->data['secureAuthInfo'] ?? [];
    }

    /**
     * @return array
     */
    public function getBindingInfo(): array
    {
        return $this->data['bindingInfo'] ?? [];
    }

    /**
     * @return array
     */
    public function getPaymentAmountInfo(): array
    {
        return $this->data['paymentAmountInfo'] ?? [];
    }

    /**
     * @return array
     */
    public function getBankInfo(): array
    {
        return $this->data['bankInfo'] ?? [];
    }

    /**
     * @return array
     */
    public function getPayerData(): array
    {
        return $this->data['payerData'] ?? [];
    }
}
