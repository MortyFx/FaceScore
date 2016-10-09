<?php
require_once './FaceScore.php';
//正常人脸
$img_url = 'https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1475252554&di=0a83b9e5c333c2651c0148af86364dc4&src=http://pic.xoyo.com/cms/rt/2011/06/03/01/4.jpg';
//$img_url = 'https://www.baidu.com/img/2016_10_09logo_61d59f1e74db0be41ffe1d31fb8edef3.png'; //无人脸
$FaceScore = new FaceScore();
$data = $FaceScore->getScore($img_url);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo</title>
    <meta charset="UTF-8">
    <meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.css" rel="stylesheet">
    <style>
        * {margin:0;padding:0;font-size:12px;}
        body {
            background:#ddd url('data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABQAAD/7gAmQWRvYmUAZMAAAAABAwAVBAMGCg0AAAItAAACbgAAA1kAAASI/9sAhAACAgICAgICAgICAwICAgMEAwICAwQFBAQEBAQFBgUFBQUFBQYGBwcIBwcGCQkKCgkJDAwMDAwMDAwMDAwMDAwMAQMDAwUEBQkGBgkNCwkLDQ8ODg4ODw8MDAwMDA8PDAwMDAwMDwwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz/wgARCABkAEMDAREAAhEBAxEB/8QAlAABAQEBAQAAAAAAAAAAAAAAAAIBAwgBAQAAAAAAAAAAAAAAAAAAAAAQAAICAwEBAAAAAAAAAAAAAAARATEQICEwYBEAAQUBAAAAAAAAAAAAAAAAIAABIVGBEBIBAAAAAAAAAAAAAAAAAAAAYBMAAQIEBQQDAQEAAAAAAAAAAQARITFBURAgYZGh8HGBsTBg0cHh/9oADAMBAAIRAxEAAAH3MDTSTSTTCwSQYdCgCTDTTAAUYaASUDDkdgASUAczoACSgDmdASYDSgczQUaDCQczqDCwSASdACDDoAczoACSgDmdAASUAczoACSgDmf/2gAIAQEAAQUCHmKHhRlZWjOixFI6PaKytYrwitmdOwPRsWqKHAjo8s6LVeUV4RXhFaf/2gAIAQIAAQUC+1//2gAIAQMAAQUC+1//2gAIAQICBj8Ca//aAAgBAwIGPwJr/9oACAEBAQY/AgbkFaoqV8blmwaLBosGhSsNUKSlb2grmjMhosGiwaLBq//aAAgBAQMBPyFiJHwVqHlODIvhwFKaikdMTM+BkiBjynND11QJYPA00AnPXIzzZRUTVg4CZSHZQIztocAAJZOBjNMaXQ5eBkp0rl4GSnSuLO+gUSeAmVh3xp0qnSPJUUz6KWTQWTnQuoW7lMPe6gkX7rViZSPZRV8EzublU6VyMpA6IBwDkKdK5eBkp0rl4GSnSuXgZKdKr//aAAgBAgMBPyH7r//aAAgBAwMBPyH7r//aAAwDAQACEQMRAAAQAgkggEkAAkEgAEAEAkAAgAAAEAAAEgAAkAkEggAEAAkAAAAgAAAEAAAAgAH/2gAIAQEDAT8QrPc5mnCBxoiP3hABwBojIrjPSJAOQAuVcNUhuVZI7HM1oG8zPfEkSgbYHdNQaCn+IJvk0DMd4XkEDdoRfIQwd7ESnlAFzE7IDWS1ltJSDAMLLjPSLzkTvBxJaQDSB/EDli5GgxwAMAAsMTIrjPWJABiARYqamg8QNtkMiuM9fBzIrjPWfkJYF3cKeUABvE/iAAAGAGAkfxSA47QZOAIDXP4FcNgbBAAGAYWGJAIYhxqmiJtIlsURnAGwW4P6pR42KRIxTNYgdwmkAikB3CYJT3S3QLh7owD0TxZ59JyTTgDyO6AS5HkDl5A5deg4khkxIgFjKOkkIBhAWz8yK4z18HMiuM9fBzIrjPWX/wD/2gAIAQIDAT8Q+6//2gAIAQMDAT8Q+6//2Q==') repeat top left;
            font-weight:300;
            -webkit-font-smoothing:antialiased;
        }
        #main{
            max-width: 920px;
            margin: 0 auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="panel panel-default panel-body" id="main">
        <p>
            Array (
        </p>
        <p style="margin-left:10px">
            Score:<?php echo $data['score']; ?>
        </p>
        <p style="margin-left:10px">
            Text:<?php echo $data['text']; ?>
        </p>
        <p style="margin-left:10px">
            ImgUrl:<?php echo $data['img_url']; ?>
        </p>
        <p>
            )
        </p>
        <p>
            <img width="550px" src="<?php echo $data['img_url']; ?>" alt="">
        </p>
    </div>
</body>
</html>





