<?php
namespace Home\Controller;

use Think\Controller;
use Common\Library\WeChat;

class IndexController extends Controller
{
    public function index()
    {
        $wechatObj = new WeChat();//微信类对象

//接受用户发过来的数据
        $xmlObj = $wechatObj->receiveMessage();
//判断用户发送数据类型
        $type = $xmlObj->MsgType;
        $fromUserName = $xmlObj->FromUserName;
        $toUserName = $xmlObj->ToUserName;
        switch ($type){
            case 'text':
                $content = $xmlObj->Content;
                $result = $wechatObj->robot($content);
                $wechatObj->responseTextMsg($toUserName,$fromUserName,$result);
                break;
            case 'image':
                //将图片信息存储在数据库中
                break;
            case 'event':
                switch ($xmlObj->Event) {
                    case 'CLICK':
                        $key = $xmlObj->EventKey;
                        switch ($key) {
                            case 'news':
                                $result=$wechatObj->getnews();
                                $wechatObj->responseImageTextMsgs($fromUserName,$toUserName,$result,count($result));
                                break;
                        }
                        break;
                    case 'subscribe':
                        error_log(date('Y-m-d H:i:s').$fromUserName.'关注成功'."\r\n",3,'record.log');
                        break;
                    case 'unsubscribe':
                        error_log(date('Y-m-d H:i:s').$fromUserName.'取消关注'."\r\n",3,'record.log');
                        break;
                    case 'SCAN':
                        $wechatObj->responseTextMsg($toUserName, $fromUserName, '欢迎回来');
                        break;
                    case 'LOCATION':
                }
                break;
        }
    }
    public function test(){
        $wechat = new WeChat();
        $acc = $wechat->getAccessToken();
        dump($acc);
    }
}