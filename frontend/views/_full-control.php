<?php
use yii\bootstrap\Html;
?>
<div class="row form-group">
    <div class="col-xs-12 col-md-6">
        <?=$this->render('_region', ['model' => $regions])?>
    </div>
    <div class="col-xs-12 col-md-6">
        <?=$this->render('_school', ['model' => $schools])?>
    </div>
    <div class="col-xs-12" style="padding-top: 24px; font-size: .9em;">
        <p>Если Вашего учебного заведения нет в списке, обратитесь в Техническую поддержку проекта <a href="mailto:predpr@subscribe.test.ru" style="color: #069; text-decoration: underline;">predpr@subscribe.test.ru</a></p>
    </div>
</div>
