<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
?>
<div class="password-reset">
    <p>Здравствуйте, поздравляем с регистрацией в testing.subscribe.test.ru</p>

    <p>Ваш логин:  <?=$user->email?></p>
    <p>Ваш пароль: <?=$password?></p>

    <p>Ссылка для входа в систему: <?= Html::a(Html::encode($resetLink), $resetLink) ?></p>

</div>