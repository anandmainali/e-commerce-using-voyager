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
          <a href="{{route('sellUs.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Product</a><br>
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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td colspan="" rowspan="" headers=""></td>
      <td colspan="" rowspan="" headers=""></td>
    </tr>

  </tbody>
</table>
</div>
</div>



    </main><!-- end MAIN -->


@endsection