@extends('admin.master')
@section('content')
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Tables</h2>
                           </div>
                        </div>
                     </div>


                     <!-- row -->
                     <div class="row">


                        <!-- table section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>All Product</h2>
                                 </div>
                              </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                 <div class="d-flex justify.content.end">
                                 <a href="{{url('create-Product')}} class="btn btn-primary></a>
                                    <table class="table mt-2">
                                       <thread>
                                          <tr>
                                             <th scope="col">id</th>
                                             <th scope="col">Name</th>
                                             <th scope="col">Description</th>
                                             <th scope="col">Price</th>
                                             <th scope="col">Quantity</th>
                                             <th scope="col">image</th>
                                             <th scope="col">Status</th>
                                             <th scope="col">Action</th>
                                          </tr>
                                       </thread>
                                       <tbody>
                                       @foreach($products as $product)
                                       <tr>
                                       <td>{{$product->id}}</td>
                                       <td>{{$product->name}}</td>
                                       <td>{{$product->description}}</td>
                                       <td>{{$product->price}}</td>
                                       <td>{{$product->quantity}}</td>
                                       <td><img src="{{asset('productsImages/'.$product->image)}}" width="200px" alt=""></td>
                                       <td>{{$product->status}}</td>
                                       <td>
                                          <a href="{{url('edit-product/'.$product->id)}}" class="btn btn-warning">Edit</a>
                                          <a href="{{url('delete-product/'.$product->id)}}" class="btn btn-danger">Delete</a>
                                       </td>
                                       
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    </table>
                                 </div>
                                 <div class="col-md-2></div>
                              </div>
                           </div>
                        </div>
                        <!-- table section -->
                        @endsection