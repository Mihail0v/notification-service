<?php

namespace NotificationService\DeliveryChannel;

use NotificationService\Notification\NotificationInterface;
use NotificationService\PushService\PushNotificationServiceFactory;
use NotificationService\Recipient\Recipient;

class PushDeliveryChannel implements DeliveryChannelInterface
{
    public function __construct(private readonly PushNotificationServiceFactory $pushNotificationServiceFactory)
    {
    }

    public function notify(NotificationInterface $notification, Recipient $recipient): void
    {
        $devicePushNotificationsService = $this->pushNotificationServiceFactory->create($recipient->getDevice());
        $devicePushNotificationsService
            ->send($recipient->getDevice(), $notification->getSubject(), $notification->getContent())
        ;
    }

    public function supports(NotificationInterface $notification, Recipient $recipient): bool
    {
        return $notification->supportsChannel($this)
            && null !== $notification->getSubject()
            && null !== $notification->getContent()
            && null !== $recipient->getDevice();
    }
}
