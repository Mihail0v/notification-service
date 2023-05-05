<?php

namespace NotificationService\DeliveryChannel;

use NotificationService\Notification\NotificationInterface;
use NotificationService\Recipient\Recipient;

class EmailDeliveryChannel implements DeliveryChannelInterface
{
    public function __construct(private readonly \stdClass $emailService)
    {
    }

    public function notify(NotificationInterface $notification, Recipient $recipient): void
    {
        $this->emailService
            ->setTo($recipient->getEmail())
            ->setSubject($notification->getSubject())
            ->setContent($notification->getContent())
            ->send()
        ;
    }

    public function supports(NotificationInterface $notification, Recipient $recipient): bool
    {
        return $notification->supportsChannel($this)
            && null !== $notification->getContent()
            && null !== $notification->getSubject()
            && null !== $recipient->getEmail();
    }
}
