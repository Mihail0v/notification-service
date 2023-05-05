<?php

namespace NotificationService\DeliveryChannel;

use NotificationService\Notification\NotificationInterface;
use NotificationService\Recipient\Recipient;

class SmsDeliveryChannel implements DeliveryChannelInterface
{
    public function __construct(private readonly \stdClass $smsApiService)
    {
    }

    public function notify(NotificationInterface $notification, Recipient $recipient): void
    {
        $this->smsApiService->send($recipient->getPhone(), $notification->getContent());
    }

    public function supports(NotificationInterface $notification, Recipient $recipient): bool
    {
        return $notification->supportsChannel($this)
            && null !== $notification->getContent()
            && null !== $recipient->getPhone();
    }
}
