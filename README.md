yii2 captcha
============
yii2 captcha with Ability to recognize Arabic and Persian numbers.

![screenshot](http://www.daimakuai.com/tmp/captcha.jpg)

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

In view
```php
use daimakuai\captcha\Captcha;
<?=
$form->field($model, 'verifyCode')->widget(Captcha::className())
?>

<?php echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'captcha']); ?>