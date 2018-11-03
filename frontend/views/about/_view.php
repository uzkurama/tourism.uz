<?php

use yii\helpers\Url;


if(Yii::$app->language == 'uz')
  {
    $content = $model->content_uz;
  }
else if(Yii::$app->language == 'ru')
  {
    $content = $model->content_ru;
  }
else if(Yii::$app->language == 'en')
  {
    $content = $model->content_en;
  }
else
  {
    $content = null;    
  }

?>

<div class="row">
	<h1 style="text-align: center;"><?= Yii::t('app', 'Navoiy viloyat turizmni rivojlantirish hududiy boshqarmasi');?></h1>
</div>
<div class="row">
	<div class="col-md-6">
		<p style="color: #000;"><?= $content;?></p>
	</div>
	<div class="col-md-6">
		<?php $items = [
		    [
		        'url' => Yii::$app->request->baseUrl.'/'.$model->pic1,
		        'src' => Yii::$app->request->baseUrl.'/'.$model->pic1,
		        
		    ],
		    [
		        'url' => Yii::$app->request->baseUrl.'/'.$model->pic2,
		        'src' => Yii::$app->request->baseUrl.'/'.$model->pic2,
		    ],
		    [
		        'url' => Yii::$app->request->baseUrl.'/'.$model->pic3,
		        'src' => Yii::$app->request->baseUrl.'/'.$model->pic3,
		        
		    ],
		    [
		        'url' => Yii::$app->request->baseUrl.'/'.$model->pic4,
		        'src' => Yii::$app->request->baseUrl.'/'.$model->pic4,
		        
		    ],
		    [
		        'url' => Yii::$app->request->baseUrl.'/'.$model->pic5,
		        'src' => Yii::$app->request->baseUrl.'/'.$model->pic5,
		        
		    ],
		];?>
		<?= dosamigos\gallery\Carousel::widget([
		    'items' => $items,
		    'showControls' => false,
		]);
		?> 
	</div>
</div>
