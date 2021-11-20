@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Bike Models </div>
            <div class ="card-body">
            <form action="{{ url('category-update/'.$category->id) }}" method = "post" enctype="multipart/form-data">
            <!-- {{method_field('PUT')}} -->
            {{csrf_field()}}
        <div class="modal-body">
            <div class="form-group">
                <label for="">Brand Name</label>
                <input type="text" name="brand_name" id="brand_name"  value="{{$category->brand_name}}" class="form-control" required>
            </div>

            <div class ="for-group">
                <label for="">Image</label>
                <input type="file" name="brand_logo" id="brand_logo" class="form-control">
                <img src ="{{asset('uploads/Logo/'.$category->brand_logo)}}" width ="70px" height="70px" alt="Image">
            </div>

            <div class="form-group">
                <label for="">About Brand </label>
                <input type="text" name="about_brand" id="about_brand" value="{{$category->about_brand}}"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select  class="form-control has-error"  id ="status" name ="status" required>>
                    <option value="1" @if($category->status == 1) selected @endif>Active</option>
                    <option value="0" @if($category->status == 0) selected @endif>Deactive</option>
                </select>
            </div>

            <div class="modal-footer">
                <a href ="{{url('category.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
