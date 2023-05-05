<?php

namespace NotificationService\PushService;

use NotificationService\Recipient\Device\DeviceIdentifierAwareInterface;

interface PushNotificationServiceInterface
{
    public function send(
        DeviceIdentifierAwareInterface $deviceIdentifier,
        string $subject,
        string $content,
    ): void;
}
