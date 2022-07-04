<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;

class SampleController extends Controller
{
    //
    public function index()
    {
        echo "<a href='chatwork'>chatworkメッセージ取得</a>";
        echo "<br />";
        echo "<a href='line'>LINEメッセージ取得</a>";
        echo "<br />";
        echo "<a href='gmail'>GAMILメッセージ取得</a>";
        exit();
    }
    public function chatwork()
    {
        // チャットワークのメッセージの取得方法
        // チャットワークのurlのパラメータにある数値を取得
        // チャットワークからtokenの取得
        // これらをDBに保持してメッセージの表示を行う
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.chatwork.com/v2/rooms/31657683/messages?force=1', [
            'headers' => [
                'Accept' => 'application/json',
                'X-ChatWorkToken' => '23ec7593c3901ea3756b0dd7e81bd24b',
            ],
        ]);
        //echo $response->getBody();
        $decode = json_decode($response->getBody());
        foreach ($decode as $key=>$value) {
            echo $value->body;
            echo "<br />";
        }
        // var_dump($decode);
        exit();
    }
    public function line()
    {
        echo "line";
        echo "<br />";
        echo "lineRegistメソッドに記載";
        echo "<br />";
        echo "linedevelopでグループの作成を行い、友達登録から必要情報の取得はできている";
        echo "<br />";
        echo "DBからデータを取得する処理を作れば完了";
        exit();
    }
    public function lineRegist(Request $request)
    {
        // ユニークなidをパラメータとして仕様
        // var_dump($request->code);
        // トーク内容の履歴取得はできないので、履歴データをDBに保存する

        define("CHANNEL_ACCESS_TOKEN", 'HTEOsSkNdEuvMKmph4h57it8/WMLNxd6m6eAUHktRJLYN1YNSgtBH2xm/6R0mGvWSLq80kUJUuGEyrghhBMu4+EGD6oEO50mRG1dfPdAe3ChT//kYBMpF4Pbf9O0TuPNws0yfoJIg9YrxXD2MSdkygdB04t89/1O/w1cDnyilFU=');
        define("CHANNEL_SECRET", '720b07d197c13941c6ae077d2affe948');
        $contents = file_get_contents('php://input');
        $json = json_decode($contents);
        $event = $json->events[0];
        Log::debug(
            'メッセージをくれたユーザー情報',
            [
                'User_id' => $event->source->userId,
                'Message' => $event->message->text,
                'RequestCode' => $request->code
            ]
        );

        
        $httpClient = new CurlHTTPClient(CHANNEL_ACCESS_TOKEN);
        $bot = new LINEBot($httpClient, ['channelSecret' => CHANNEL_SECRET]);

        // メッセージを書き込んだユーザ情報を取得
        $response = $bot->getProfile($event->source->userId);


        // 以下を解析すると保持情報がとれる
        // DBが準備できたら開発します
        // $event->source->groupIdは取得できなかったので要調査

        // if ($response->isSucceeded()) {
        //     $profile = $response->getJSONDecodedBody();
        //     $user_display_name = $profile['displayName'];
        //     $user_picture_url = $profile['pictureUrl'];
        //     $user_status_message = $profile['statusMessage'];
        //     $fileUrl = "";
        //     // メッセージタイプが画像だった場合は画像を保存
        //     if ($event->message->type == 'image') {
        //         function uploadImageThenGetUrl($rawBody)
        //         {
        //             $im = imagecreatefromstring($rawBody);
        //             if ($im !== false) {
        //                 $filename = date("Ymd-His") . '-' . mt_rand() . '.jpg';
        //                 imagejpeg($im, "images/uploads/" . $filename);
        //             } else {
        //                 error_log("fail to create image.");
        //             }
        //             return $filename;
        //         }
        //         $res = $bot->getMessageContent($event->message->id);
        //         $fileUrl = uploadImageThenGetUrl($res->getRawBody());
        //     }
        // }

        // $pdo = new PDO('mysql:host=ホスト;dbname=DB名;charset=utf8','ユーザ名','パスワード',
        // array(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC));
        // $stmt = $pdo -> prepare("INSERT INTO talks (id, type, group_id, user_id, user_display_name, user_picture_url, user_status_message, talk_type, upload_image_name, time, reply_token, message_id, message_type, message_text, created_at) VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL)");
        // $stmt->execute(array($event->type, $event->source->groupId, $event->source->userId, $user_display_name, $user_picture_url, $user_status_message, $event->source->type, @$fileUrl, $event->timestamp, $event->replyToken, $event->message->id, $event->message->type, $event->message->text));
    
        exit();
    }
    public function gmail()
    {
        $imapPath = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
        //  $mailbox = '{localhost:995/pop3/ssl/novalidate-cert}INBOX';
        $username = 'takahirochiba00807@gmail.com';
        $password = 'Takahiro1234';
        $inbox = imap_open($imapPath, $username, $password) or die('Cannot connect to Gmail:'.imap_last_error());
        echo "gmail";
        exit();
    }
}
