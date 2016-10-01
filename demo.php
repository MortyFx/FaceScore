<?php
require_once './FaceScore.php';
//凤姐的图片
$img_url = 'https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1475252554&di=0a83b9e5c333c2651c0148af86364dc4&src=http://pic.xoyo.com/cms/rt/2011/06/03/01/4.jpg';
$FaceScore = new FaceScore();
$data = $FaceScore->getScore($img_url);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>
<body>
    <p>
        Score:<?php echo $data['score']; ?>
    </p>
    <p>
        Text:<?php echo $data['text']; ?>
    </p>
    <p>
        ImgUrl:<?php echo $data['img_url']; ?>
    </p>
    <p>
        <img width="550px" src="<?php echo $data['img_url']; ?>" alt="">
    </p>
</body>
</html>





