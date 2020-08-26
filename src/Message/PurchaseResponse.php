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

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Purchase response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * @return string|null
     */
    public function getRedirectUrl(): ?string
    {
        return $this->data['formUrl'] ?? null;
    }
}
