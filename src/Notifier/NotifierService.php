<?php

namespace NotificationService\Notifier;

use NotificationService\DeliveryChannel\DeliveryChannelInterface;
use NotificationService\Notification\NotificationInterface;
use NotificationService\Recipient\Recipient;

class NotifierService implements NotifierServiceInterface
{
    /**
     * @param DeliveryChannelInterface[] $channels
     */
    public function __construct(private readonly array $channels)
    {
    }

    public function send(NotificationInterface $notification, Recipient ...$recipients): void
    {
        foreach ($recipients as $recipient) {
            foreach ($this->channels as $channel) {
                try {
                    // iterate channels until we successfully (without thrown exceptions) send the notification
                    if (!$channel->supports($notification, $recipient)) {
                        continue;
                    }
                    $channel->notify($notification, $recipient);
                    // use only first supported channel to send message
                    return;
                } catch (\Exception $exception) {
                    // log that some service is unavailable
                    // add retries/failover scenarios/etc
                }
            }
        }
    }
}
