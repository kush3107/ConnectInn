<?php
/**
 * Created by PhpStorm.
 * User: kushagra
 * Date: 11/12/17
 * Time: 11:16 PM
 */

namespace App\Services;


use Auth;
use Carbon\Carbon;
use Curl\Curl;
use Firebase\FirebaseLib;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class MessagingService
{
    const DB_BASE_PATH = 'https://connectinn-tk.firebaseio.com/';
    const DB_CHAT_BASE_PATH = '/root/chats';

    protected $firebase;

    public function __construct()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(realpath('../connectinn-firebase.json'));
        $this->firebase = (new Factory())->withServiceAccount($serviceAccount)
            ->withDatabaseUri(self::DB_BASE_PATH)
            ->create();
    }

    public function sendMessage($message, $fromUserId, $toUserId)
    {
        $db = $this->firebase->getDatabase();
        $path = $this->getPath($fromUserId, $toUserId);
        $db->getReference($path)->push([
            'message' => $message,
            'timestamp' => Carbon::now()->timestamp
        ]);
    }

    private function getPath($fromUserId, $toUserId)
    {
        return self::DB_CHAT_BASE_PATH . '/user_' . $fromUserId . '_' . $toUserId . '/';
    }
}