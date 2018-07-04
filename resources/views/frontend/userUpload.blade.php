@extends('layouts.home-master')


@section('content')

    <!--  about-page -->
    <div class="about">
        <div class="container">
            <h3 class="w3ls-title w3ls-title1">Sale Product To Us</h3>
            <div class="about-text">
                <p style="color:black;">You can sell us your product but you will get your money after the product is sold.</p>
                
                <div class="clearfix"> </div>
                
                
   <form>
       <div class="form-group">
    <label for="name">Full Name</label>
    <input class="form-control" type="text" placeholder="Your Full Name">
  </div>
  
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  
  <div class="form-group">
    <label for="contact">Contact Number</label>
    <input class="form-control" type="text" name="contact" placeholder="Phone Number">
  </div>
  
  <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
  <div class="form-group">
  <select class="custom-select" class="form-control">
  <option selected>Category</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

<div class="form-group">
<select class="custom-select" class="form-control">
  <option selected>Sub Category</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

<div class="form-group">
<select class="custom-select" class="form-control">
  <option selected>Child Category</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>

<div class="form-group">
    <label for="name">Product Name</label>
    <input class="form-control" type="text" placeholder="Product Name">
  </div>
  
  <div class="form-group">
    <label for="name">Discount</label>
    <input class="form-control" type="text" placeholder="Discount">
  </div>
  
  <div class="form-group">
    <label for="name">Price</label>
    <input class="form-control" type="text" placeholder="Product Price">
  </div>
  
  <div class="form-group">
    <label for="address">Description</label>
    <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  
  <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
  
  
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
            </div>
    
        </div>
    </div>
    <!-- //about-page -->

@endsection