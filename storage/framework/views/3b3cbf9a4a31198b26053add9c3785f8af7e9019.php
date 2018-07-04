<?php $__env->startSection('css'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_title', __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular); ?>

<?php $__env->startSection('page_header'); ?>
    <h1 class="page-title">
        <i class="<?php echo e($dataType->icon); ?>"></i>
        <?php echo e(__('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular); ?>

    </h1>
    <?php echo $__env->make('voyager::multilingual.language-selector', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    
                    <form role="form"
                            class="form-edit-add"
                            action="<?php if(!is_null($dataTypeContent->getKey())): ?><?php echo e(route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey())); ?><?php else: ?><?php echo e(route('voyager.'.$dataType->slug.'.store')); ?><?php endif; ?>"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <?php if(!is_null($dataTypeContent->getKey())): ?>
                            <?php echo e(method_field("PUT")); ?>

                        <?php endif; ?>

                        <!-- CSRF TOKEN -->
                        <?php echo e(csrf_field()); ?>


                        <div class="panel-body">

                            <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                   <div class="form-group"> 
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::id()); ?>">
                </div>

                    <div class="form-group"> 
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control select2 select2-hidden-accessible">
                        <option disable="true" selected="true">Choose Category</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
    		    	<option value="<?php echo e($category->id); ?>" <?php echo e($editCategory->contains($category) ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
    		    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		        
    		    </select>
    		    </div>
    		    
    		    <?php if(!empty($editSubcategories)): ?>
    		    
    		        <div class="form-group"> 
                    <label for="subcategory_id">Sub Category</label>
    		    <select id="subcategory_id" name="subcategory_id" class="form-control select2 select2-hidden-accessible">
    		        <?php $__currentLoopData = $editSubcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		    	<option value="<?php echo e($subcategory->id); ?>" <?php echo e($editSubcategory->contains($subcategory) ? 'selected' : ''); ?>><?php echo e($subcategory->name); ?></option>
    		    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		    </select>
    		    </div>
    		     
    		    <?php else: ?>
    		    
    		     <div class="form-group"> 
                    <label for="subcategory_id">Sub Category</label>
    		    <select id="subcategory_id" name="subcategory_id" class="form-control select2 select2-hidden-accessible">
    		    	<option disable="true" selected="true">Choose Subcategory</option>
    		    </select>
    		    </div>
    		    
    		    <?php endif; ?>
    		    
    		    
    		    
    		    <?php if(!empty($editChildcategories)): ?>
    		        <div class="form-group"> 
                    <label for="childcategory_id">Child Category</label>
                <select id="childcategory_id" name="childcategory_id" class="form-control select2 select2-hidden-accessible">
    		        <?php $__currentLoopData = $editChildcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		    	<option value="<?php echo e($childcategory->id); ?>" <?php echo e($editChildcategory->contains($childcategory) ? 'selected' : ''); ?>><?php echo e($childcategory->name); ?></option>
    		    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		    </select>
    		    </div>
    		     
    		    <?php else: ?>

                 <div class="form-group"> 
                    <label for="childcategory_id">Child Category</label>
                <select id="childcategory_id" name="childcategory_id" class="form-control select2 select2-hidden-accessible">
                    <option disable="true" selected="true">Choose Child category</option>
                </select>
                </div>
                
                
                <?php endif; ?>
    		    
                            <!-- Adding / Editing -->
                            <?php
                                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                            ?>

                            <?php $__currentLoopData = $dataTypeRows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- GET THE DISPLAY OPTIONS -->
                                <?php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                ?>
                                <?php if($options && isset($options->formfields_custom)): ?>
                                    <?php echo $__env->make('voyager::formfields.custom.' . $options->formfields_custom, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                <?php else: ?>
                                    <div class="form-group <?php if($row->type == 'hidden'): ?> hidden <?php endif; ?> <?php if(isset($display_options->width)): ?><?php echo e('col-md-' . $display_options->width); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>" <?php if(isset($display_options->id)): ?><?php echo e("id=$display_options->id"); ?><?php endif; ?>>
                                        <?php echo e($row->slugify); ?>

                                        <label for="name"><?php echo e($row->display_name); ?></label>
                                        <?php echo $__env->make('voyager::multilingual.input-hidden-bread-edit-add', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php if($row->type == 'relationship'): ?>
                                            <?php echo $__env->make('voyager::formfields.relationship', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php else: ?>
                                            <?php echo app('voyager')->formField($row, $dataType, $dataTypeContent); ?>

                                        <?php endif; ?>

                                        <?php $__currentLoopData = app('voyager')->afterFormFields($row, $dataType, $dataTypeContent); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $after): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $after->handle($row, $dataType, $dataTypeContent); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save"><?php echo e(__('voyager.generic.save')); ?></button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="<?php echo e(route('voyager.upload')); ?>" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="<?php echo e($dataType->slug); ?>">
                        <?php echo e(csrf_field()); ?>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> <?php echo e(__('voyager.generic.are_you_sure')); ?></h4>
                </div>

                <div class="modal-body">
                    <h4><?php echo e(__('voyager.generic.are_you_sure_delete')); ?> '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('voyager.generic.cancel')); ?></button>
                    <button type="button" class="btn btn-danger" id="confirm_delete"><?php echo e(__('voyager.generic.delete_confirm')); ?>

                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            <?php if($isModelTranslatable): ?>
                $('.side-body').multilingual({"editing": true});
            <?php endif; ?>

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '<?php echo e($dataType->slug); ?>',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '<?php echo e(csrf_token()); ?>'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('<?php echo e(route('voyager.media.remove')); ?>', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    
    <script type="text/javascript">
        $('#category_id').on('change',function(e){
            var category_id = e.target.value;
            $.get('/json-subcategories?category_id='+category_id,function(data){
                
                $('#subcategory_id').empty();
                $('#subcategory_id').append('<option value="0" disable="true" selected="true">Choose Subcategory</option>');
                $.each(data,function(index,Obj){
                    $('#subcategory_id').append('<option value="'+ Obj.id +'">'+ Obj.name +'</option>');
                });
            });
        });
    </script>
     <script type="text/javascript">
        $('#subcategory_id').on('change',function(e){
            var subcategory_id = e.target.value;
            $.get('/json-childcategories?subcategory_id='+subcategory_id,function(data){
                
                $('#childcategory_id').empty();
                $('#childcategory_id').append('<option value="0" disable="true" selected="true">Choose Child Category</option>');
                $.each(data,function(index,Obj){
                    $('#childcategory_id').append('<option value="'+ Obj.id +'">'+ Obj.name +'</option>');
                });
            });
        });
    </script>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('voyager::master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>