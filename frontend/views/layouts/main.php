<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php');
?>




<!-- CRIACAO DO SIDEBAR E APLICACAO DE ESTILOS -->
<main class="d-flex">
    <?php echo $this->render('sidebar') ?>

    <div class="content-wrapper p-3">

        <?= Alert::widget() ?>
        <?= $content ?>


</main>

</div>

<?php $this->endContent(); ?>