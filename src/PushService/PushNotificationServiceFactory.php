<?php

namespace NotificationService\PushService;

use NotificationService\Recipient\Device\AndroidDevice;
use NotificationService\Recipient\Device\DeviceInterface;
use NotificationService\Recipient\Device\IosDevice;

final class PushNotificationServiceFactory
{
    public function __construct(private readonly \stdClass $androidApi, private readonly \stdClass $iosApi)
    {
    }

    /**
     * @throws \Exception
     */
    public function create(DeviceInterface $device): PushNotificationServiceInterface
    {
        if ($device instanceof AndroidDevice) {
            return new AndroidPushNotificationService($this->androidApi);
        }
        if ($device instanceof IosDevice) {
            return new IosPushNotificationService($this->iosApi);
        }

        throw new \Exception('Could not find a service for device: '.get_class($device));
    }
}
