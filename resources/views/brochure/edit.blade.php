@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Banner Image </div>
            <div class ="card-body">
            <form action="{{route('brochure.update',$brochure->id)}}" method = "post" enctype="multipart/form-data">
            <!-- {{method_field('PUT')}} -->
            {{csrf_field()}}
        <div class="modal-body">


            <div class="form-group">
                <label for="">Bike Model</label>
                <select required class="form-control" name="model_id" id="model_id">
                        @foreach($model as $key => $data)
                        <option  {{ $brochure->model_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->title}}</option>
                        @endforeach
                    </select>
                </div>
            <div class ="for-group">
                <label for="">File</label>
                <input type="file" name="file" id="file" class="form-control" >
                <iframe src="{{ asset($brochure->file) }}" frameborder="1"
                    allowfullscreen="true"  width="100" height="100"></iframe>
            </div>
            <div class="modal-footer">
                <a href ="{{url('brochure.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>






@endsection

@section('scripts')
