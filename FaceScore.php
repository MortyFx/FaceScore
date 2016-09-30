<?php
/**
 * Created by PhpStorm.
 * User: litianyang
 * Date: 16/9/30
 * Time: 下午11:08
 */


class FaceScore{

    public $score;
    public $text;
    public $response_img;

    public function  __construct($image){
        $upload_photo = $this->uploadImage($image);
        $this->getScore($upload_photo);

    }

    public function uploadImage($image){
        $image = base64_encode(file_get_contents($image));
        $res = $this->curl('http://kan.msxiaobing.com/Api/Image/UploadBase64',$image);
        $upload_photo = $res['Host'].$res['Url'];
        return $upload_photo;
    }

    public function curl($url,$data){
        $headers = array(
            'Host:kan.msxiaobing.com',
            'Connection:keep-alive',
            'Accept:*/*',
            'Origin:http://kan.msxiaobing.com',
            'X-Requested-With:XMLHttpRequest',
            'User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.73 Safari/537.36',
            'Content-Type:application/x-www-form-urlencoded; charset=UTF-8',
            'Referer:http://kan.msxiaobing.com/V3/Portal',
            'Accept-Encoding:gzip, deflate',
            'Accept-Language:zh-CN,zh;q=0.8,en-US;q=0.6,en;q=0.4',
            'Expect:'
        );
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 7);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        if(is_array($data)){
            $data = http_build_query($data);
        }
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $output = curl_exec($ch);
        curl_close($ch);
        list($header, $body) = explode("\r\n\r\n", $output);
        return json_decode($body,true);
    }

    public function getScore($upload_photo){
        list($s1, $s2) = explode(' ', microtime());
        $mtime = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
        $data =  array(
            'msgId'=> $mtime,
            'timestamp'=> time(),
            'content[imageUrl]'=> $upload_photo  #上传到微软服务器的图片
        );
        $json = $this->curl('http://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=yanzhi&tid=52a90c91aaeb4af698bec8ae2106cb36',$data);
        $text = $json['content']['text'];
        $pattern = '/\d+\.\d+/';
        preg_match($pattern,$text,$score);
        $score=$score[0];
        $img_url = $json['content']['imageUrl'];
        $this->score = $score;
        $this->text = $text;
        $this->response_img = $img_url;
    }

}

$img_url = 'https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1475252554&di=0a83b9e5c333c2651c0148af86364dc4&src=http://pic.xoyo.com/cms/rt/2011/06/03/01/4.jpg';
$FaceScore = new FaceScore($img_url);
echo $FaceScore->score;
echo '<br>'.$FaceScore->text;echo '<br>';
echo '<img src="'.$FaceScore->response_img.'" />';