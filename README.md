# FaceScore
微软小冰 —— 测颜值接口

## 使用
```php 
  
require_once './FaceScore.php';
$FaceScore = new FaceScore();
$img_url = 'https://ss0.bdstatic.com/94oJfD_bAAcT8t7mm9GUKT-xh_/timg?image&quality=100&size=b4000_4000&sec=1475252554&di=0a83b9e5c333c2651c0148af86364dc4&src=http://pic.xoyo.com/cms/rt/2011/06/03/01/4.jpg';
$data = $FaceScore->getScore($img_url);
  
```

## 返回数组
	Array ( 

		[score] => 2.9 

		[text] => 菇凉颜值2.9分，帅哥哥都喜欢这种没心机的萌白甜~ 

		[img_url] => http://mediaplatform.trafficmanager.cn/image/fetchimage?key=UQAfAC8ABAAAAFcAFgAGABYASgA1AEYANwA1AEIANQBBAEYAMgA0AEYARQBEADkAMQBGADcANgAxADkANgA4AEIAMAAxADMAQgA1ADkAMwA5AEUA 

		)

## 预览
(http://github.com/Patrick-95/FaceScore/raw/master/screenshot.jpeg)

