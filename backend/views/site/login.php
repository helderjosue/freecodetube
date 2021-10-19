<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container justify-content-center">
    <h1><?= Html::encode($this->title) ?></h1>
<!--    <div class="d-flex justify-content-center h-100">-->
        <p>Please fill out the following fields to login:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

<!--    </div>-->
</div>

<!---->
<!--<style>-->
<!--    /* Coded with love by Mutiullah Samim */-->
<!--    body,-->
<!--    html {-->
<!--        margin: 0;-->
<!--        padding: 0;-->
<!--        height: 100%;-->
<!--        background: #60a3bc !important;-->
<!--    }-->
<!--    .user_card {-->
<!--        height: 400px;-->
<!--        width: 350px;-->
<!--        margin-top: auto;-->
<!--        margin-bottom: auto;-->
<!--        background: #f39c12;-->
<!--        position: relative;-->
<!--        display: flex;-->
<!--        justify-content: center;-->
<!--        flex-direction: column;-->
<!--        padding: 10px;-->
<!--        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);-->
<!--        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);-->
<!--        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);-->
<!--        border-radius: 5px;-->
<!---->
<!--    }-->
<!--    .brand_logo_container {-->
<!--        position: absolute;-->
<!--        height: 170px;-->
<!--        width: 170px;-->
<!--        top: -75px;-->
<!--        border-radius: 50%;-->
<!--        background: #60a3bc;-->
<!--        padding: 10px;-->
<!--        text-align: center;-->
<!--    }-->
<!--    .brand_logo {-->
<!--        height: 150px;-->
<!--        width: 150px;-->
<!--        border-radius: 50%;-->
<!--        border: 2px solid white;-->
<!--    }-->
<!--    .form_container {-->
<!--        margin-top: 100px;-->
<!--    }-->
<!--    .login_btn {-->
<!--        width: 100%;-->
<!--        background: #c0392b !important;-->
<!--        color: white !important;-->
<!--    }-->
<!--    .login_btn:focus {-->
<!--        box-shadow: none !important;-->
<!--        outline: 0px !important;-->
<!--    }-->
<!--    .login_container {-->
<!--        padding: 0 2rem;-->
<!--    }-->
<!--    .input-group-text {-->
<!--        background: #c0392b !important;-->
<!--        color: white !important;-->
<!--        border: 0 !important;-->
<!--        border-radius: 0.25rem 0 0 0.25rem !important;-->
<!--    }-->
<!--    .input_user,-->
<!--    .input_pass:focus {-->
<!--        box-shadow: none !important;-->
<!--        outline: 0px !important;-->
<!--    }-->
<!--    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {-->
<!--        background-color: #c0392b !important;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div class="container h-100">-->
<!--		<div class="d-flex justify-content-center h-100">-->
<!--			<div class="user_card">-->
<!--				<div class="d-flex justify-content-center">-->
<!--					<div class="brand_logo_container">-->
<!--						<img src="https://cdn.freebiesupply.com/logos/large/2x/pinterest-circle-logo-png-transparent.png" class="brand_logo" alt="Logo">-->
<!--					</div>-->
<!--				</div>-->
<!--				<div class="d-flex justify-content-center form_container">-->
<!--					<form>-->
<!--					 --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!--						<div class="input-group mb-3">-->
<!--							<div class="input-group-append">-->
<!--								<span class="input-group-text"><i class="fas fa-user"></i></span>-->
<!--							</div>-->
<!--							 --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!--						</div>-->
<!--						<div class="input-group mb-2">-->
<!--							<div class="input-group-append">-->
<!--								<span class="input-group-text"><i class="fas fa-key"></i></span>-->
<!--							</div>-->
<!--							--><?//= $form->field($model, 'password')->passwordInput() ?>
<!--						</div>-->
<!--						<div class="form-group">-->
<!--							<div class="custom-control custom-checkbox">-->
<!--								<input type="checkbox" class="custom-control-input" id="customControlInline">-->
<!--								<label class="custom-control-label" for="customControlInline">Remember me</label>-->
<!--								--><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!--							</div>-->
<!--						</div>-->
<!--							<div class="d-flex justify-content-center mt-3 login_container">-->
<!--				 	--><?//= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
<!--				   </div>-->
<!--				   --><?php //ActiveForm::end(); ?>
<!--					</form>-->
<!--				</div>-->
<!---->
<!--				<div class="mt-4">-->
<!--					<div class="d-flex justify-content-center links">-->
<!--						Don't have an account? <a href="#" class="ml-2">Sign Up</a>-->
<!--					</div>-->
<!--					<div class="d-flex justify-content-center links">-->
<!--						<a href="#">Forgot your password?</a>-->
<!--					</div>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!---->
<!---->
<!---->
<!---->
<!---->













<!--<div class="site-login">-->
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
<!---->
<!--    <p>Please fill out the following fields to login:</p>-->
<!---->
<!--    --><?php //$form = ActiveForm::begin(['id' => 'login-form']); ?>
<!---->
<!--    --><?//= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'password')->passwordInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'rememberMe')->checkbox() ?>
<!---->
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
<!--    </div>-->
<!---->
<!--    --><?php //ActiveForm::end(); ?>
<!--</div>-->





