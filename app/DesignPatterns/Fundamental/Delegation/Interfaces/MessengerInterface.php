<?php

namespace App\DesignPatterns\Fundamental\Delegation\Interfaces;

/**
 * Interface MessengerInterface
 *
 * @package App\DesignPatterns\Fundamental\Delegation\Interfaces
 */
interface MessengerInterface
{
    /**
     * @param string $value
     *
     * @return mixed
     */
    public function setSender($value): MessengerInterface;

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function setRecipient($value): MessengerInterface;

    /**
     * @param string $value
     *
     * @return mixed
     */
    public function setMessage($value): MessengerInterface;

    /**
     * @return bool
     */
    public function send(): bool;
}
