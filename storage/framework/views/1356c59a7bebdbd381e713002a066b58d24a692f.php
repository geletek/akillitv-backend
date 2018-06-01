<?php echo e(html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open()); ?>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <?php echo e(html()->label(__('validation.attributes.frontend.avatar'))->for('avatar')); ?>


                <div>
                    <input type="radio" name="avatar_type" value="gravatar" <?php echo e($logged_in_user->avatar_type == 'gravatar' ? 'checked' : ''); ?> /> Gravatar
                    <input type="radio" name="avatar_type" value="storage" <?php echo e($logged_in_user->avatar_type == 'storage' ? 'checked' : ''); ?> /> Upload

                    <?php $__currentLoopData = $logged_in_user->providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(strlen($provider->avatar)): ?>
                            <input type="radio" name="avatar_type" value="<?php echo e($provider->provider); ?>" <?php echo e($logged_in_user->avatar_type == $provider->provider ? 'checked' : ''); ?> /> <?php echo e(ucfirst($provider->provider)); ?>

                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div><!--form-group-->

            <div class="form-group hidden" id="avatar_location">
                <?php echo e(html()->file('avatar_location')->class('form-control')); ?>

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <?php echo e(html()->label(__('validation.attributes.frontend.first_name'))->for('first_name')); ?>


                <?php echo e(html()->text('first_name')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.first_name'))
                    ->attribute('maxlength', 191)
                    ->required()
                    ->autofocus()); ?>

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group">
                <?php echo e(html()->label(__('validation.attributes.frontend.last_name'))->for('last_name')); ?>


                <?php echo e(html()->text('last_name')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.last_name'))
                    ->attribute('maxlength', 191)
                    ->required()); ?>

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <?php if($logged_in_user->canChangeEmail()): ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> <?php echo e(__('strings.frontend.user.change_email_notice')); ?>

                </div>

                <div class="form-group">
                    <?php echo e(html()->label(__('validation.attributes.frontend.email'))->for('email')); ?>


                    <?php echo e(html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.email'))
                        ->attribute('maxlength', 191)
                        ->required()); ?>

                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <div class="form-group">
                <?php echo e(html()->label(__('validation.attributes.frontend.timezone'))->for('timezone')); ?>


                <select name="timezone" id="timezone" class="form-control" required="required">
                    <?php $__currentLoopData = timezone_identifiers_list(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($timezone); ?>" <?php echo e($timezone == $logged_in_user->timezone ? 'selected' : ''); ?> <?php echo e($timezone == old('timezone') ? ' selected' : ''); ?>><?php echo e($timezone); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="form-group mb-0 clearfix">
                <?php echo e(form_submit(__('labels.general.buttons.update'))); ?>

            </div><!--form-group-->
        </div><!--col-->
    </div><!--row-->
<?php echo e(html()->closeModelForm()); ?>


<?php $__env->startPush('after-scripts'); ?>
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>