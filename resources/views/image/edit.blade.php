@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Update Images</div>
            <div class ="card-body">

              <form action="{{ url('image-update/'.$image->id) }}" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                        <!-- {{method_field('PUT')}} -->
                    <div class="form-group">
                        <label for="">Product:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            {{$image->bike->name}}
                    </div>
                    <div class ="for-group">
                        <label for="">Image</label>
                        <input type="file" name="image[]"  id="image" class="form-control"  multiple required>
                        @foreach (explode('|', $image->image) as $image)
                              <img src="{{URL::to($image)}}" height="100px" width="100px" />

                              @endforeach
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
