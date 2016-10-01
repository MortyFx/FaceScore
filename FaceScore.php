<?php
/**
 * Author: Patrick95
 * Date: 16/9/30
 */
class FaceScore
{
    public $upload_url = 'http://kan.msxiaobing.com/Api/Image/UploadBase64';
    public $score_url = 'http://kan.msxiaobing.com/Api/ImageAnalyze/Process?service=yanzhi&tid=52a90c91aaeb4af698bec8ae2106cb36';

    /**
     * 上传本地图片到微软服务器
     * @param $image
     * @return string
     */
    public function uploadImage($image)
    {
        $image = base64_encode(file_get_contents($image));
        $res = $this->curl($this->upload_url, $image);
        $upload_photo = $res['Host'] . $res['Url'];
        return $upload_photo;
    }

    /**
     * 获取照片颜值
     * @param $image
     * @return array
     */
    public function getScore($image)
    {
        $upload_photo = $this->uploadImage($image);
        list($s1, $s2) = explode(' ', microtime());
        $mtime = (float)sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
        $data = array(
            'msgId' => $mtime,
            'timestamp' => time(),
            'content[imageUrl]' => $upload_photo  #上传到微软服务器的图片
        );
        $res = $this->curl($this->score_url, $data);
        $text = $res['content']['text'];
        $pattern = '/\d+\.\d+/';
        preg_match($pattern, $text, $score);
        $data = array(
            'score' => $score[0],
            'text' => $text,
            'img_url' => $res['content']['imageUrl']
        );
        return $data;
    }

    /**
     * CURL
     * @param $url
     * @param $data
     * @return mixed
     */
    public function curl($url, $data)
    {
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
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 7);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        if (is_array($data)) {
            $data = http_build_query($data);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        curl_close($ch);
        list($header, $body) = explode("\r\n\r\n", $output);
        return json_decode($body, true);
    }
}