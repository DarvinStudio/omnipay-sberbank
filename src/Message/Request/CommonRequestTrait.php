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

/**
 * Common request trait
 */
trait CommonRequestTrait
{
    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->getParameter('userName');
    }

    /**
     * @param string|null $userName
     *
     * @return self
     */
    public function setUserName(?string $userName): self
    {
        return $this->setParameter('userName', $userName);
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->getParameter('password');
    }

    /**
     * @param string|null $password
     *
     * @return self
     */
    public function setPassword(?string $password): self
    {
        return $this->setParameter('password', $password);
    }

    /**
     * @return bool
     */
    public function getTestMode(): bool
    {
        return $this->getParameter('testMode') ?? false;
    }

    /**
     * @param bool|null $testMode
     *
     * @return self
     */
    public function setTestMode($value): self
    {
        return $this->setParameter('testMode', (bool) $value);
    }

    /**
     * @return string|null
     */
    public function getOrderNumber(): ?string
    {
        return $this->getParameter('orderNumber');
    }

    /**
     * @param string|null $orderNumber
     *
     * @return self
     */
    public function setOrderNumber(?string $orderNumber): self
    {
        return $this->setParameter('orderNumber', $orderNumber);
    }

    /**
     * @return string|null
     */
    public function getOrderId(): ?string
    {
        return $this->getParameter('orderId');
    }

    /**
     * @param string|null $orderId
     *
     * @return self
     */
    public function setOrderId(?string $orderId): self
    {
        return $this->setParameter('orderId', $orderId);
    }

    /**
     * @return string|null
     */
    public function getLanguage(): ?string
    {
        return $this->getParameter('language');
    }

    /**
     * @param string|null $language
     *
     * @return self
     */
    public function setLanguage(?string $language): self
    {
        return $this->setParameter('language', $language);
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getParameter('description');
    }

    /**
     * @param string|null $description
     *
     * @return self
     */
    public function setDescription($value): self
    {
        $description = str_replace(['%', '+', "\t", "\n"], '', $value);
        $description = trim($description);
        $description = mb_substr($description, 0 , 24);

        return $this->setParameter('description', $description);
    }

    /**
     * @return string|null
     */
    public function getJsonParams(): ?string
    {
        return $this->getParameter('jsonParams');
    }

    /**
     * @param string|null $jsonParams
     *
     * @return self
     */
    public function setJsonParams(?string $jsonParams): self
    {
        return $this->setParameter('jsonParams', $jsonParams);
    }

    /**
     * @return string|null
     */
    public function getFailUrl(): ?string
    {
        return $this->getParameter('failUrl');
    }

    /**
     * @param string|null $failUrl
     *
     * @return self
     */
    public function setFailUrl(?string $failUrl): self
    {
        return $this->setParameter('failUrl', $failUrl);
    }

    /**
     * @return string|null
     */
    public function getPageView(): ?string
    {
        return $this->getParameter('pageView');
    }

    /**
     * @param string|null $pageView
     *
     * @return self
     */
    public function setPageView(?string $pageView): self
    {
        return $this->setParameter('pageView', $pageView);
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->getParameter('clientId');
    }

    /**
     * @param string|null $clientId
     *
     * @return self
     */
    public function setClientId(?string $clientId): self
    {
        return $this->setParameter('clientId', $clientId);
    }

    /**
     * @return string|null
     */
    public function getMerchantLogin(): ?string
    {
        return $this->getParameter('merchantLogin');
    }

    /**
     * @param string|null $merchantLogin
     *
     * @return self
     */
    public function setMerchantLogin(?string $merchantLogin): self
    {
        return $this->setParameter('merchantLogin', $merchantLogin);
    }

    /**
     * @return int|null
     */
    public function getSessionTimeoutSecs(): ?int
    {
        return $this->getParameter('sessionTimeoutSecs');
    }

    /**
     * @param int|null $sessionTimeoutSecs
     *
     * @return self
     */
    public function setSessionTimeoutSecs(?int $sessionTimeoutSecs): self
    {
        return $this->setParameter('sessionTimeoutSecs', $sessionTimeoutSecs);
    }

    /**
     * @return string|null
     */
    public function getExpirationDate(): ?string
    {
        return $this->getParameter('expirationDate');
    }

    /**
     * @param string|null $expirationDate
     *
     * @return self
     */
    public function setExpirationDate(?string $expirationDate): self
    {
        return $this->setParameter('expirationDate', $expirationDate);
    }

    /**
     * @return string|null
     */
    public function getBindingId(): ?string
    {
        return $this->getParameter('bindingId');
    }

    /**
     * @param string|null $bindingId
     *
     * @return self
     */
    public function setBindingId(?string $bindingId): self
    {
        return $this->setParameter('bindingId', $bindingId);
    }

    /**
     * @return string|null
     */
    public function getFeatures(): ?string
    {
        return $this->getParameter('features');
    }

    /**
     * @param string|null $features
     *
     * @return self
     */
    public function setFeatures(?string $features): self
    {
        return $this->setParameter('features', $features);
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getParameter('email');
    }

    /**
     * @param string|null $email
     *
     * @return self
     */
    public function setEmail(?string $email): self
    {
        return $this->setParameter('email', $email);
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->getParameter('phone');
    }

    /**
     * @param string|null $phone
     *
     * @return self
     */
    public function setPhone(?string $phone): self
    {
        return $this->setParameter('phone', $phone);
    }

    /**
     * @return string|null
     */
    public function getTaxSystem(): ?string
    {
        return $this->getParameter('taxSystem');
    }

    /**
     * @param string|null $taxSystem
     *
     * @return self
     */
    public function setTaxSystem(?string $taxSystem): self
    {
        return $this->setParameter('taxSystem', $taxSystem);
    }

    /**
     * @return string|null
     */
    public function getOrderBundle(): ?string
    {
        return $this->getParameter('orderBundle');
    }

    /**
     * @param string|null $orderBundle
     *
     * @return self
     */
    public function setOrderBundle(?string $orderBundle): self
    {
        return $this->setParameter('orderBundle', $orderBundle);
    }
}
