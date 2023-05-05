<?php

namespace NotificationService\Recipient\Device;

interface DeviceIdentifierAwareInterface
{
    public function getDeviceId(): string;
}
