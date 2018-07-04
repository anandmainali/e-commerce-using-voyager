  @extends('layouts.home-master')

  @section('class')
  page-product grid-view @endsection

  @section('content')     


  <!-- MAIN -->
  <main class="site-main product-list product-grid">
    <div class="container">
        <ol class="breadcrumb-page">
            <li><a href="{{route('/')}}">Home </a></li>
            <li class="active"><a href="#">Sell Products  </a></li>
        </ol>
    </div>
    <br><br>
  
 
    <div class="container">

        <div class="row">
          <h2>Seller Information</h2>
          <h4><span class="label label-info">All the information of seller is taken from the profile. So, make sure to update the profile data correctly. We will use it to contact you when the product is sold.</span></h4>
          
          
          <hr>
<form class="form-horizontal" action="{{route('sellUs.store')}}" method="post" enctype="multipart/form-data">
  {{csrf_field()}}
  <h2>Product Information</h2>
          <h6>*All fields are required.</h6>
          <hr><br>

          <div class="form-group"> 
                    <label for="category_id" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                    <select id="category_id" name="category_id" class="form-control select2 select2-hidden-accessible">
                        <option disable="true" selected="true">Choose Category</option>
                        @foreach($categories as $category)
                        
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
                
            </select>
          </div>
            </div>

            
             <div class="form-group"> 
                    <label for="subcategory_id" class="col-sm-2 control-label">Sub Category</label> 
                    <div class="col-sm-10">
            <select id="subcategory_id" name="subcategory_id" class="form-control select2 select2-hidden-accessible">
              <option disable="true" selected="true">Choose Subcategory</option>
            </select>
          </div>
            </div>
            

                 <div class="form-group"> 
                    <label for="childcategory_id" class="col-sm-2 control-label">Child Category</label>
                    <div class="col-sm-10">
                <select id="childcategory_id" name="childcategory_id" class="form-control select2 select2-hidden-accessible">
                    <option disable="true" selected="true">Choose Child category</option>
                </select>
              </div>
                </div>

                <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="name" placeholder="Product Name">
    </div>
  </div>
  <div class="form-group">
    <label for="discount" class="col-sm-2 control-label">Discount</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="discount" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Product Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="new_price" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="price" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea name="description" class="form-control" rows="5" placeholder="Product Description"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="image" class="col-sm-2 control-label">Product Image</label>
    <div class="col-sm-10">
      <input type="file" name="image" class="form-control">
    </div>
  </div>

  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary pull-right">Submit</button>
    </div>
  </div>
</form>











          </div>
    </div>
    </main><!-- end MAIN -->



@endsection

@section('extra-js')
<script type="text/javascript">
        $('#category_id').on('change',function(e){
            var category_id = e.target.value;
            console.log(category_id);
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

    @endsection