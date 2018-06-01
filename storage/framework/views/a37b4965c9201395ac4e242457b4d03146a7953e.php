<?php $__env->startSection('title', app_name() . ' | '.__('labels.frontend.auth.login_box_title')); ?>

<?php $__env->startSection('content'); ?>
  <!-- begin:: Page -->
  <div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(/assets/app/media/img//bg/bg-3.jpg);">
      <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
        <div class="m-login__container">
          <div class="m-login__logo">
            <a href="#">
              <img src="/assets/demo/default/media/img/logo/akillitv-logo-2.png" width="200" />
            </a>
          </div>
          <div class="m-login__signin">
            <div class="m-login__head">
              <h3 class="m-login__title">
                <?php echo e(__('labels.frontend.auth.login_box_title')); ?>

              </h3>
            </div>
            <?php echo e(html()->form('POST', route('frontend.auth.login.post'))->class('m-login__form m-form')->open()); ?>

                <input name="_token" type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>" />
                <div class="form-group m-form__group">
                            <?php echo e(html()->email('email')
                                ->class('form-control m-input')
                                ->placeholder(__('validation.attributes.frontend.email'))
                                ->attribute('maxlength', 191)
                                ->attribute('autocomplete', 'off')
                                ->required()); ?>


                </div>

                <div class="form-group m-form__group">

                            <?php echo e(html()->password('password')
                                ->class('form-control m-input m-login__form-input--last')
                                ->placeholder(__('validation.attributes.frontend.password'))
                                ->required()); ?>

                </div>

                <div class="form-group m-form__group">
                                <?php echo e(html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember')); ?>

                </div>

                <div class="form-group m-form__group m-login__form-action text-center">
                            <?php echo e(form_submit(__('labels.frontend.auth.login_button'))->class('btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary')); ?>

                </div>

                <div class="m-login__form-action" style="display:none;">
                    <a href="<?php echo e(route('frontend.auth.password.reset')); ?>"><?php echo e(__('labels.frontend.passwords.forgot_password')); ?></a>
                </div>
            <?php echo e(html()->form()->close()); ?>



          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end:: Page -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>