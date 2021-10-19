<style>
  aside .nav-pills .nav-link {
    border-radius: 0;
    color: #444444;
  }

  aside .nav-pills .nav-link:hover {
    background: rgba(0, 0, 0, 0.05);
  }

  aside .nav-pills .nav-link.active {

    background: rgba(0, 0, 0, 0.05);
    color: #b90000;
    border-left: 4px solid #b90000;
  }

  aside {
    min-width: 200px;
  }

  .content-wrapper {
    flex: 1;
  }

  main {
    flex: 1;
  }
</style>
<aside class="shadow">

  <?php

  echo \yii\bootstrap4\Nav::widget([

    'options' => [
      'class' => 'd-flex flex-column nav-pills'
    ],
    'items' => [
      [
        'label' => 'Dashboard', 'url' => ['/video/index']
      ],
      [
        'label' => 'History', 'url' => ['/video/history']
      ]
    ]
  ]) ?>
</aside>
