@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    
                    <form role="form"
                            class="form-edit-add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                   <div class="form-group"> 
                    <input type="hidden" name="user_id" value="{{Auth::id()}}">
                </div>

                    <div class="form-group"> 
                    <label for="category_id">Category</label>
                    <select id="category_id" name="category_id" class="form-control select2 select2-hidden-accessible">
                        <option disable="true" selected="true">Choose Category</option>
                        @foreach($categories as $category)
                        
    		    	<option value="{{$category->id}}" {{ $editCategory->contains($category) ? 'selected' : '' }}>{{$category->name}}</option>
    		    	@endforeach
    		        
    		    </select>
    		    </div>
    		    
    		    @if(!empty($editSubcategories))
    		    
    		        <div class="form-group"> 
                    <label for="subcategory_id">Sub Category</label>
    		    <select id="subcategory_id" name="subcategory_id" class="form-control select2 select2-hidden-accessible">
    		        @foreach($editSubcategories as $subcategory)
    		    	<option value="{{$subcategory->id}}" {{ $editSubcategory->contains($subcategory) ? 'selected' : '' }}>{{$subcategory->name}}</option>
    		    	@endforeach
    		    </select>
    		    </div>
    		     
    		    @else
    		    
    		     <div class="form-group"> 
                    <label for="subcategory_id">Sub Category</label>
    		    <select id="subcategory_id" name="subcategory_id" class="form-control select2 select2-hidden-accessible">
    		    	<option disable="true" selected="true">Choose Subcategory</option>
    		    </select>
    		    </div>
    		    
    		    @endif
    		    
    		    
    		    
    		    @if(!empty($editChildcategories))
    		        <div class="form-group"> 
                    <label for="childcategory_id">Child Category</label>
                <select id="childcategory_id" name="childcategory_id" class="form-control select2 select2-hidden-accessible">
    		        @foreach($editChildcategories as $childcategory)
    		    	<option value="{{$childcategory->id}}" {{ $editChildcategory->contains($childcategory) ? 'selected' : '' }}>{{$childcategory->name}}</option>
    		    	@endforeach
    		    </select>
    		    </div>
    		     
    		    @else

                 <div class="form-group"> 
                    <label for="childcategory_id">Child Category</label>
                <select id="childcategory_id" name="childcategory_id" class="form-control select2 select2-hidden-accessible">
                    <option disable="true" selected="true">Choose Child category</option>
                </select>
                </div>
                
                
                @endif
    		    
                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                            @endphp

                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                @if ($options && isset($options->formfields_custom))
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif @if(isset($display_options->width)){{ 'col-md-' . $display_options->width }}@else{{ '' }}@endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        {{ $row->slugify }}
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden-bread-edit-add')
                                        @if($row->type == 'relationship')
                                            @include('voyager::formfields.relationship')
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager.generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
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
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager.generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager.generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager.generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager.generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@section('javascript')
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

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
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
    
@stop
