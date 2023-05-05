<?php

namespace NotificationService\Notification;

use NotificationService\DeliveryChannel\DeliveryChannelInterface;

interface NotificationInterface
{
    public function getSubject(): ?string;

    public function getContent(): ?string;

    public function supportsChannel(DeliveryChannelInterface $channel): bool;
}
