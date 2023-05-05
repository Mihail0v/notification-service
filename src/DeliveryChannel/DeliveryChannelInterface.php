<?php

namespace NotificationService\DeliveryChannel;

use NotificationService\Notification\NotificationInterface;
use NotificationService\Recipient\Recipient;

interface DeliveryChannelInterface
{
    /**
     * @throws \Exception
     */
    public function notify(NotificationInterface $notification, Recipient $recipient): void;

    public function supports(NotificationInterface $notification, Recipient $recipient): bool;
}
