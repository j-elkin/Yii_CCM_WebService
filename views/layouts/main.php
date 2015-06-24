<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

//use yii\widgets\Menu;//Importante para los menus

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="icon" href="/Yii_CCM_WebService/views/images/logo.jpg">
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                //'encodeLabels' => false,
                'brandLabel' => '<span class="glyphicon glyphicon-home"></span> XX CONGRESO COLOMBIANO DE MATEMÁTICAS',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
            //echo Menu::widget([
                'encodeLabels' => false,//importante para mostrar los iconos
                'options' => [
                    'class' => 'navbar-nav navbar-right',
                    'data-tag' => 'yii2-menu',
                ],
                'items' => [
                    //['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'About', 'url' => ['/site/about']],
                    //['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => '<span class="glyphicon glyphicon-list-alt"></span> Inscripciones', 'url' => ['/persona-evento/index']],
                    
                    ['label' => 'Personas',  'items' => [
                        ['label' => 'Persona', 'url' => ['/persona/index']],
                        ['label' => 'Almuerzo', 'url' => '#'],                    
                    ]],

                    ['label' => 'Eventos', 'items'=> [
                        ['label' => 'Evento', 'url' => ['/evento/index']],
                        ['label' => 'Ubicación', 'url' => ['/ubicacion/index']],
                        ['label' => 'Memoria', 'url' => ['/memoria/index']],
                    ]],



                    ['label' => 'Administración', 'items' => [

                        ['label' => 'CCM', 'url' => ['/ccm/index']],
                        '<li class="divider"></li>',
                        ['label' => 'Tipo Área', 'url' => ['/tipo-area/index']],
                        ['label' => 'Tipo Evento', 'url' => ['/tipo-evento/index']],
                        
                        '<li class="divider"></li>',
                        ['label' => 'Institución', 'url' => ['/institucion/index']],
                        ['label' => 'País de Procedencia', 'url' => ['/pais-procedencia/index']],
                        ['label' => 'Tipo Documento', 'url' => ['/tipo-doc/index']],
                        ['label' => 'Tipo Persona', 'url' => ['/tipo-persona/index']],

                    ]],

                    //login
                    /*Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],*/
                ],
                //'activeCssClass'=>'activeclass',

            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <!-- <p class="pull-left">&copy; Congreso Colombiano de Matemáticas <?= date('Y') ?></p> -->
            <p class="pull-left">Congreso Colombiano de Matemáticas <?= date('Y') ?></p>
            <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
