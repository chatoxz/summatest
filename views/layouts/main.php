<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Summa Test',
        'brandUrl' => '/site/login',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Ingreso', 'url' => ['/site/login']];
    } else {
        $subMenuItems = array();
        $menuItems[] = ['label' => 'Empresas', 'url' => ['/empresa/index']];
        $subMenuItems[] = ['label' => 'Todos', 'url' => ['/empleado/index']];
        $subMenuItems[] = ['label' => 'Programador', 'url' => ['/programador/index']];
        $subMenuItems[] = ['label' => 'Tipo Programador', 'url' => ['/tipo-programador/index']];
        $subMenuItems[] = ['label' => 'Diseñador', 'url' => ['/disenador/index']];
        $subMenuItems[] = ['label' => 'Tipo Diseñador', 'url' => ['/tipo-disenador/index']];

        $menuItems[] = [
            'class' => '',
            'label' => 'Empleados',
            'items' => $subMenuItems
        ];
    }

    $menuItems[] = Yii::$app->user->isGuest ? (['label' => 'Ingreso', 'url' => ['/site/login']]) :
        (
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        );

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">
            <a href="https://www.linkedin.com/in/sebastian-carreras-7517821b/" target="_blank">
                &copy; Carreras Sebastian
                <img style="height: 25px;margin-bottom: 5px;" src="/img/linkedin2.png">
            </a>
        </p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php
// MODAL PARA USARASE EN TODOS LAS VISTAS
Modal::begin([
    'options' => [
        'tabindex' => false // important for Select2 to work properly
    ],
    'id' => 'modal', 'header' => '<h2>Ahorro Full</h2>', 'size' => ''
]);
echo '<div id="modalContent"></div>';
echo '<div class="alert alert-info resultado hidden" style="margin: 10px 30px;text-align: center"></div>';
Modal::end();
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
