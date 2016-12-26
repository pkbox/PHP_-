<?php
/**
 * Created by PhpStorm.
 * User: zhaoz
 * Date: 2016/9/29
 * Time: 8:42
 */
namespace Common\Library;

//define your token
define("TOKEN", "liuren");
define('APPID', "wx783cb0c0b67425cd");
define('SECRET',"d15e752c97d29e974a89fef17486713d");

class WeChat
{
    public static function valid(){
        $echoStr = $_GET['echostr'];
        ob_clean();
        if (self::checkSignature()){
            echo $echoStr;
        }else{
            echo 'error!';
        }
    }
    /**
     *  1.接受用户发过来的数据
     */
    public function receiveMessage(){
        //1.接收数据
        // $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $postStr = file_get_contents("php://input");
        //2.转成xml对象
        libxml_disable_entity_loader(true);
        $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
        //3.返回xml对象
        return $postObj;
    }
    /**
     * 2.回复文本消息的函数
     */
    public function responseTextMsg($toUserName,$fromUserName,$content){
        //1.组织xml数据包
        $xmlStr = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[text]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
        $resultStr = sprintf($xmlStr,$fromUserName,$toUserName,time(),$content);
        //2.发送消息
        echo $resultStr;
    }
    /**
     *3.回复图片消息的函数
     */
    public function responseImageMsg(){

    }
    /**
     *4.回复语音消息的函数
     */
    public function responseVoiceMsg(){

    }

    /**
     *5.回复视频消息的函数
     */
    public function responseVedioMsg(){

    }
    /**
     *6.回复图文消息的函数
     */
    public function responseImageTextMsg($toUserName,$fromUserName,$result,$count){
        //1 组织xml数据包
        // $_dbThumb = M('thumb');
        $time = time();
        $tpl = "<xml>
                <ToUserName><![CDATA[$toUserName]]></ToUserName>
                <FromUserName><![CDATA[$fromUserName]]></FromUserName>
                <CreateTime>$time</CreateTime>
                <MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>$count</ArticleCount>
                <Articles>";
        foreach ($result as $tmp){
            $title = $tmp['title'];
           // $description = $tmp['description'];
           // $picurl = $tmp['thumb'];
            $thumb_media_id = $tmp['thumb_media_id'];
            // $resultPicurl = $_dbThumb->where("media_id=$thumb_media_id")->select('url');
            // $picurl = $resultPicurl['0'];
            $picurl = $tmp['thumb_url'];
            $url = $tmp['url'];
            $description = '';
            $tpl .= "<item>
                    <Title><![CDATA[$title]]></Title> 
                    <Description><![CDATA[$description]]></Description>
                    <PicUrl><![CDATA[$picurl]]></PicUrl>
                    <Url><![CDATA[$url]]></Url>
                </item>";
        }
        $tpl .= "</Articles>
                </xml>";
                error_log($tpl,3,'record.log');
        echo $tpl;
    }
    public function responseImageTextMsgs($toUserName,$fromUserName,$result,$count){
        $time = time();
        $tpl = "<xml>
                <ToUserName><![CDATA[$toUserName]]></ToUserName>
                <FromUserName><![CDATA[$fromUserName]]></FromUserName>
                <CreateTime>$time</CreateTime>
                <MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>$count</ArticleCount>
                <Articles>";

        foreach ($result as $tmp){
            $title = $tmp->title;
            $description = $tmp->description;
            $picurl = $tmp->picUrl;
            $url = $tmp->url;
            $tpl .= "<item>
                    <Title><![CDATA[$title]]></Title> 
                    <Description><![CDATA[$description]]></Description>
                    <PicUrl><![CDATA[$picurl]]></PicUrl>
                    <Url><![CDATA[$url]]></Url>
                </item>";
        }
        $tpl .= "</Articles>
                </xml>";
        echo $tpl;
    }
    /**
     *7.回复音乐消息的函数
     */
    public function responseMusicMsg(){

    }
    public function responseMsg()
    {
        //get post data, May be due to the different environments
        $postStr = file_get_contents("php://input");

        //extract post data
        if (!empty($postStr)){
            /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
               the best way is to check the validity of xml by yourself */
            libxml_disable_entity_loader(true);
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
							</xml>";
            if(!empty( $keyword ))
            {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            }else{
                echo "Input something...";
            }
        }else {
            echo "";
            exit;
        }
    }

    private function checkSignature()
    {
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }

        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = TOKEN;
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 创建菜单
     */
    public function createMenu($url,$menu){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $menu );
        $result = curl_exec ($curl);
        curl_close ( $curl );
        if(curl_errno()==0){
            return true;
        }else {
            return false;
        }
    }

    public function getAccessToken(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".APPID."&secret=".SECRET;
        // $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        $response = file_get_contents($url);
        $res = json_decode($response, true);
        return $res['access_token'];
    }
    public function addMedia($url,$filePath,$formData){
        $curl = curl_init ($url);
        $timeout = 5;

        $data= array("media"=>"@{$filePath}",'form-data'=>$formData);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);
        curl_close ( $curl );
        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            return false;
        }
    }
    public function getMediaList($url,$data){
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, 0);//过滤头部
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回，而不是直接输出。
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt($curl,CURLOPT_POST,true); // post传输数据
        curl_setopt($curl,CURLOPT_POSTFIELDS,$data);// post传输数据
        $responseText = curl_exec($curl);
        $res = json_decode($responseText, true);
        curl_close($curl);

        return $res;
    }
    public function addNews($url,$data){
        $timeout = 5;
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result;
        }else {
            dump(curl_errno($curl));
        }
    }
    public function deleteNews($url,$data){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_POST, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        $result = curl_exec ($curl);
        curl_close ( $curl );
        if(curl_errno()==0){
            return true;
        }else {
            return false;
        }    
    }
    /*
     * 拉取并返回用户信息
     */
    public function getUsers(){
        //1 接受code值
        $code=I('code');
        //2 获取access_token的值
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".SECRET."&code=$code&grant_type=authorization_code";
        $curl = curl_init ($url);
        $timeout = 5;
        curl_setopt ( $curl, CURLOPT_GET, 1 );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close($curl);
        if (curl_error()==0){
            $result = json_decode($result);
            //3 拉取用户信息
            $access_token = $result->access_token;
            $refresh_token = $result->refresh_token;
            $openid = $result->openid;
            $url1="https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=wx947c2f1fadd1fcb0&grant_type=refresh_token&refresh_token=$refresh_token";
            $url2="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $curl = curl_init ($url2);
            $timeout = 5;
            curl_setopt ( $curl, CURLOPT_GET, 1 );
            curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
            curl_setopt ( $curl, CURLOPT_CONNECTTIMEOUT, $timeout );
            curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, FALSE );
            curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
            $result2 = curl_exec ($curl);
            if (curl_error()==0) {
                curl_close($curl);
                $result2 = json_decode($result2);
                return $result2;
            }else{
                dump(curl_errno($curl));
            }
        }else{
            dump(curl_errno($curl));
        }
    }
    public function getnews(){
        $ch = curl_init();
        $url = 'http://apis.baidu.com/txapi/huabian/newtop?num=5&page=1';
        $header = array(
            'apikey: 5142529b29a5c3bf3fb770860f21a1f4',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);

        $result = json_decode($res);
        return $result->newslist;
    }
    public function robot($info){
        $info = urlencode($info);
        $ch = curl_init();
        $url = 'http://apis.baidu.com/turing/turing/turing?key=879a6cb3afb84dbf4fc84a1df2ab7319&info='.$info.'&userid=eb2edb736';
        $header = array(
            'apikey: 5142529b29a5c3bf3fb770860f21a1f4',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        $result = json_decode($res);
        return $result->text;
    }
    public function viewMenu($url){
        $curl = curl_init ($url);
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, false );
        $result = curl_exec ($curl);
        curl_close ($curl);
        if(curl_errno()==0){
            $result=json_decode($result,true);
            return $result['menu']['button'];
        }else {
            dump(curl_errno($curl));
        }
    }

}
?>