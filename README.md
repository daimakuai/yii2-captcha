yii2 captcha
============
yii2 验证码功能，能够处理文字、数字及外文字符集功能。

yii2 captcha with Ability to recognize Arabic and Persian numbers.

![screenshot](https://raw.githubusercontent.com/daimakuai/yii2-captcha/master/screen.jpg)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist daimakuai/yii2-captcha "*"
```

or add

```
"daimakuai/yii2-captcha": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply modify your controler, add or change methode `actions()`:

```php
    public function actions()
    {
        $this->layout = $this->setting['layout'];
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'daimakuai\captcha\CaptchaAction',
                'type' => 'numbers', // 'numbers', 'letters' or 'default' (contains numbers & letters)
                'minLength' => 4,
                'maxLength' => 4,
            ],
        ];
    }
```

在视图里增加
In view
```php
use daimakuai\captcha\Captcha;
<?=
$form->field($model, 'verifyCode')->widget(Captcha::className())
?>

或增加
or add
<?php echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'captcha']); ?>

在后台Action获取验证码并验证，添加如下代码
Where background checks are needed add.

<?php

$check = $this->createAction('captcha')->validate($captchCode, false);
if($check){
	//验证码正确
}else{
	//验证码错误
}
?>