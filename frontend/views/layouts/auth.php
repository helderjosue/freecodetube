<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php');
?>


<div class="wrap h-100 d-flex flex-column">
  <!-- NAVBAR RETIRADA DAQUI -->
  <!-- header estava aqui -->

  <!-- CRIACAO DO SIDEBAR E APLICACAO DE ESTILOS -->
  <main class="d-flex">

    <!-- <div class="content-wrapper p-3">  content-wrapper faz o form ter full width-->
    <div class=" p-3">

      <?= Alert::widget() ?>
      <?= $content ?>
    </div>

  </main>

</div>

<?php $this->endContent(); ?>