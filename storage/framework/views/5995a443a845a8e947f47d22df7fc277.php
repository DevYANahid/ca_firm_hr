<?php
    $chatgpt = Utility::getValByName('enable_chatgpt');
?>

<?php echo e(Form::model($training, ['route' => ['training.update', $training->id], 'method' => 'PUT'])); ?>

<div class="modal-body">

    <?php if($chatgpt == 'on'): ?>
    <div class="card-footer text-end">
        <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
            data-url="<?php echo e(route('generate', ['training'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
            title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
            <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

        </a>
    </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('branch', __('Branch'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('branch', $branches, null, ['class' => 'form-control select2', 'required' => 'required', 'id' => 'branch'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer_option', __('Trainer Option'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('trainer_option', $options, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_type', __('Training Type'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('training_type', $trainingTypes, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('trainer', __('Trainer'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::select('trainer', $trainers, null, ['class' => 'form-control select2', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('training_cost', __('Training Cost'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::number('training_cost', null, ['class' => 'form-control', 'step' => '0.01', 'required' => 'required'])); ?>

            </div>
        </div>
        <div class="col-md-12">
            

            <div class="form-group">
                <?php echo e(Form::label('employee', __('Employee*'), ['class' => 'col-form-label'])); ?>

                <div class="employee_div">
                    <select name="employee" id="employee" class="form-control " required>     
                    </select>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('start_date', null, ['class' => 'form-control d_week','autocomplete'=>'off'])); ?>

            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'col-form-label'])); ?>

                <?php echo e(Form::text('end_date', null, ['class' => 'form-control d_week','autocomplete'=>'off'])); ?>

            </div>
        </div>
        <div class="form-group col-lg-12">
            <?php echo e(Form::label('description', __('Description'), ['class' => 'col-form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => __('Description'),'rows'=>'3'])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <input type="button" value="Cancel" class="btn btn-light" data-bs-dismiss="modal">
    <input type="submit" value="<?php echo e(__('Update')); ?>" class="btn btn-primary">
</div>
<?php echo e(Form::close()); ?>


<script>
    $('#branch').on('change', function() {
        var branch_id = this.value;

        $.ajax({
                url: "<?php echo e(route('getemployee')); ?>",
                type: "post",
                data:{
                    "branch_id": branch_id,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },

                cache: false,
                success: function(data) {

                    $('#employee').html('<option value="">Select Employee</option>');
                    $.each(data.employee, function (key, value) {
                        $("#employee").append('<option value="' + value.id + '">' + value.name + '</option>');
                    });

                }
            })
        });
</script><?php /**PATH C:\Users\User\Desktop\CA-Firm-HR-main\resources\views/training/edit.blade.php ENDPATH**/ ?>