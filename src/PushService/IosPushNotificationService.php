<?php

namespace NotificationService\PushService;

use NotificationService\Recipient\Device\DeviceIdentifierAwareInterface;

class IosPushNotificationService implements PushNotificationServiceInterface
{
    public function __construct(private readonly \stdClass $api)
    {
    }

    public function send(
        DeviceIdentifierAwareInterface $deviceIdentifier,
        string $subject,
        string $content,
    ): void {
        $this->api->send($deviceIdentifier->getDeviceId(), $subject, $content);
    }
}
