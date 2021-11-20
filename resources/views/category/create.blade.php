@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Banner Image</div>
            <div class ="card-body">
            <form action="{{route('category.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Brand Name</label>
                        <input type="text" name="brand_name"  class="form-control" Placeholder ="Enter Your Brand Name" required>   
                    </div>

                    <div class ="for-group">
                        <label for="">Image</label>
                        <input type="file" name="brand_logo" id="brand_logo" class="form-control @error('brand_logo') is-invalid @enderror" required>
                        <div class="invalid-feedback">Please Select your Image.</div>               
                    </div>

                    <div class="form-group">
                        <label for="">About Brand </label>
                        <input type="text" name="about_brand" id="about_brand"  Placeholder ="About Brand"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>                
                        <select  class="form-control has-error"  id ="status" name ="status" required>>
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>              
                        </select>
                    </div>
                    <div class="modal-footer">
                    <a href ="{{url('category.index')}}" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
