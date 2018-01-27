<?php
namespace daimakuai\captcha;
use Yii;
use daimakuai\captcha\yii2CaptchaAsset;

class Captcha extends \yii\captcha\Captcha
{
    public $template = '<div class="daimakuai-captcha">{image} {input}</div>';
    public function run()
    {
        $this->registerClientScript();
        parent::run();
    }

    public function registerClientScript()
    {
        yii2CaptchaAsset::register(Yii::$app->getView());
        parent::registerClientScript();
    }
}
