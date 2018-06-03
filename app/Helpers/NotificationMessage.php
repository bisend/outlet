<?php

namespace App\Helpers;

use JavaScript;
use Session;

/**
 * Trait NotificationMessage
 * @package App\Helpers
 */
trait NotificationMessage
{
    /**
     * Session key
     *
     * @var string
     */
    private $sessionKey = 'NOTIFICATION_MESSAGE';


    /**
     * Stores message into the session
     *
     * @param string $message
     */
    public function storeNotificationMessage($message)
    {
        $storedMessage = $this->getStoredNotificationMessage();
        if ($storedMessage) {
            $message = $storedMessage . '<br/>' . $message;
        }

        Session::put($this->sessionKey, $message);
    }

    /**
     * Adds notification message to the page as JS variable
     *
     * @param string|null $message
     */
    public function addNotificationMessage($message = null)
    {
        $storedMessage = $this->getStoredNotificationMessage();

        if ($message && $storedMessage) {
            $message .= $storedMessage . '<br/>' . $message;
        } else if ($storedMessage) {
            $message = $storedMessage;
        }

        if ($message) {
            JavaScript::put([
                "{$this->sessionKey}" => $message
            ]);
        }
    }

    // -----------------------------------------------------------------------------------------------------------------
    // Helpers

    /**
     * Retrieves stored message in the session
     *
     * @return string
     */
    private function getStoredNotificationMessage()
    {
        $message = null;

        if (Session::has($this->sessionKey)) {
            $message = Session::pull($this->sessionKey);
        }

        return $message;
    }
}
