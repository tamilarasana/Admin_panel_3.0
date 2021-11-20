@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Banner Image </div>
            <div class ="card-body">
            <form action="{{route('banner.update',$banners->id)}}" method = "post" enctype="multipart/form-data">
            <!-- {{method_field('PUT')}} -->
            {{csrf_field()}}
        <div class="modal-body">

            <div class ="for-group">
                <label for="">Image</label>
                <input type="file" name="banner_img" id="banner_img" class="form-control" >
                <img src ="{{asset($banners->banner_img)}}" width ="70px" height="70px" alt="Image">
            </div>
            <div class="form-group">
                <label for="">Position </label>
                <input type="text" name="position" id="position" value="{{$banners->position}}" Placeholder ="Banner Position"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                    <select  class="form-control has-error"  id ="type"name ="type" required>
                        <option value="1" @if($banners->type == 1) selected @endif>Desktop View</option>
                        <option value="2" @if($banners->type == 2) selected @endif> Mobile View</option>
                    </select>

            </div>

            <div class="modal-footer">
                <a href ="{{url('banner.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@if(Session::has('error'))
<script>
toastr.warning("{!! Session::get('error')!!}");
</script>
@endif

@endsection
