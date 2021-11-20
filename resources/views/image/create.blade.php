@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Images</div>
            <div class ="card-body">
             <form action="/post" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                        <label for="">Product</label>
                        <select  class="form-control" name="product_id" id="product_id" required>
                            <option value="">Choose Our Services</option>
                                @foreach($product as $key => $data)
                                    <option value="{{$data->id}}">{{$data->name}}</option> 
                                @endforeach                                                              
                        </select> 
                    </div>      	
                    <div class ="for-group">image
                        <label for="">Image</label>
                        <input type="file" name="image[]" id="image" class="form-control"  multiple required>
                    </div>
                    <div class="modal-footer">
                        <a href ="{{url('image.index')}}" class="btn btn-secondary mt-3">Close</a>
                        <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                    </div>
                 </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
