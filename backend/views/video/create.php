<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Video */

$this->title = 'Create Video';
$this->params['breadcrumbs'][] = ['label' => 'Videos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="d-flex flex-column justify-content-center align-items-center">

        <div class="upload-icon">
            <i class="fas fa-upload"></i>
        </div>

        <br>
        <p class="m-0"> Arraste e solte um video aqui dentro</p>

        <p class="text-muted"> Seu video sera privado ate que voce publique ele</p>

        <!-- <button for class="btn btn-primary btn-file">
        Select file
        <input type="file" id="videoFile" name="video" style="visibility:hidden;">
        </button> -->

        <?php \yii\bootstrap4\ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]) ?>

        <div>
            <label for="videoFile" class="btn btn-primary btn-file">Select File</label>
            <input id="videoFile" style="visibility:hidden;" type="file" name="video">

            <?php \yii\bootstrap4\ActiveForm::end() ?>
        </div>
    </div>
</div>