<?php

namespace NotificationService\Recipient\Device;

class IosDevice implements DeviceInterface
{
    public function getDeviceId(): string
    {
        return '';
    }
}
