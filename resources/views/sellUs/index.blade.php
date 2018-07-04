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
          <a href="{{route('sellUs.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a><br><br>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
    @if(count($products) > 0)
    @foreach($products as $key=>$product)
    <tr>
      <td scope="row">{{++$key}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->new_price}}</td>
      <td>
        @if($product->status == 0)
      <span class="label label-danger">Not Active</span>
      @else
      <span class="label label-success">Active</span>
      @endif

      </td>
      <td><img src="{{productImage($product->image)}}" height="60px" width="60px" alt=""></td>
      <td class="center" style="width: 100px;">
                        <div style="float: left;">
                        <a href='{{route('sellUs.edit',$product->id)}}'>
                            <button class="btn btn-primary btn-xs">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                    </div>
                    <div style="float: right;">
                      <form action="{{route('sellUs.delete',$product->id)}}" method="post">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger btn-xs" onclick='confirm("Are you sure to delete?")'><i class="fa fa-trash"></i></button>
                      </form>
                        
                    </div>
                      </td>
    </tr>
    @endforeach
    @else
    <tr>
      <td colspan="100%" align="center"><h2>No products found.</h2></td>
    </tr>
  @endif
  {{ $products->links() }}
  </tbody>
  
</table>
</div>
</div>



    </main><!-- end MAIN -->


@endsection