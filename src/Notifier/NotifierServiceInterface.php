<?php

namespace NotificationService\Notifier;

use NotificationService\Notification\NotificationInterface;
use NotificationService\Recipient\Recipient;

interface NotifierServiceInterface
{
    public function send(NotificationInterface $notification, Recipient ...$recipients): void;
}
