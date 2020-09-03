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
use Omnipay\Common\Message\ResponseInterface;

/**
 * Abstract request
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    use CommonRequestTrait;

    /**
     * @return array
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    abstract public function getData(): array;

    /**
     * @return string
     */
    abstract protected function getMethod(): string;

    /**
     * @param AbstractRequest $request
     * @param mixed           $content
     *
     * @return \Omnipay\Sberbank\Message\Response\AbstractResponse
     */
    abstract protected function createResponse(AbstractRequest $request, $content): AbstractResponse;

    /**
     * @param array $data
     *
     * @return \Omnipay\Common\Message\ResponseInterface
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function sendData($data): ResponseInterface
    {
        $data = array_filter(
            $data,
            function($key) { return !$this->isEmptyParameter($key); },
            ARRAY_FILTER_USE_KEY
        );

        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getUrl(),
            $this->getHeaders(),
            http_build_query(array_merge($this->getAccessData(), $data), '', '&')
        );

        $content = json_decode($httpResponse->getBody()->getContents(), true);

        return $this->createResponse($this, $content);
    }

    /**
     * @return string
     */
    protected function getEndPoint(): string
    {
        if (!$this->isEmptyParameter('endPoint')) {
            return $this->getParameter('endPoint');
        }

        return $this->getTestMode()
            ? 'https://3dsec.sberbank.ru/payment/rest/'
            : 'https://securepayments.sberbank.ru/payment/rest/';
    }

    /**
     * @param string|null $endPoint
     *
     * @return self
     */
    public function setEndPoint(?string $endPoint): self
    {
        return $this->setParameter('endPoint', $endPoint);
    }

    /**
     * @return string
     */
    protected function getUrl(): string
    {
        return $this->getEndPoint() . $this->getMethod();
    }

    /**
     * @return array
     */
    protected function getHeaders(): array
    {
        return [
            "content-type" => 'application/x-www-form-urlencoded'
        ];
    }

    /**
     * @return string
     */
    protected function getHttpMethod(): string
    {
        return 'POST';
    }

    /**
     * @param  string $name
     *
     * @return bool
     */
    protected function isEmptyParameter(string $name): bool
    {
        return is_null($this->getParameter($name)) || $this->getParameter($name) === '';
    }

    /**
     * @return string[]
     *
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    protected function getAccessData(): array
    {
        if (!$this->isEmptyParameter('token')) {
            return [
                'token' => $this->getToken(),
            ];
        }

        $this->validate('userName', 'password');

        return [
            'userName' => $this->getUserName(),
            'password' => $this->getPassword(),
        ];
    }
}
