<?php

namespace NotificationService\Notification;

use NotificationService\DeliveryChannel\DeliveryChannelInterface;

class Notification implements NotificationInterface
{
    /**
     * @param string[] $channels list class names of channels for this notification
     */
    public function __construct(private readonly array $channels)
    {
    }

    public function getSubject(): ?string
    {
        return 'subject';
    }

    public function getContent(): ?string
    {
        return 'content';
    }

    public function supportsChannel(DeliveryChannelInterface $channel): bool
    {
        return \in_array(\get_class($channel), $this->channels, true);
    }
}
