<?php

namespace NotificationService\Recipient;

use NotificationService\Recipient\Device\DeviceInterface;

class Recipient
{
    public function __construct(
        private readonly ?DeviceInterface $device,
        private readonly ?string $phone,
        private readonly ?string $email,
    ) {
    }

    public function getDevice(): ?DeviceInterface
    {
        return $this->device;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
