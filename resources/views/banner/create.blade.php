@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Banner Image</div>
            <div class ="card-body">
            <form action="{{route('banner.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
                    <div class ="for-group">
                        <label for="">Banner Image</label>
                        <input type="file" name="banner_img" id="banner_img" class="form-control @error('brand_logo') is-invalid @enderror" required>
                        <div class="invalid-feedback">Please Select your Banner Image.</div>
                    </div>

                    <div class="form-group">
                        <label for="">Position </label>
                        <input type="text" name="position" id="position"  Placeholder ="Banner Position"  class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Type</label>
                        <select  class="form-control has-error"  id ="type" name ="type" required>>
                            <option value="">Select Your Type</option>
                            <option value="1">Desktop View </option>
                            <option value="2">Mobile View</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                    <a href ="{{url('/banner.index')}}" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
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
toastr.warning("{!! Session::get('error') !!}");
</script>
@endif

@endsection
