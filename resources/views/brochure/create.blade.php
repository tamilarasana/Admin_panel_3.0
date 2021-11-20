@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Brochure</div>
            <div class ="card-body">
            <form action="{{route('brochure.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Model</label>
                      <select  class="form-control" name="model_id" id="model_id" required>
                      <option value="">Choose Our Model</option>
                      @foreach($model as $key => $data)
                        <option value="{{$data->id}}">{{$data->title}}</option>
                    @endforeach
                  </select>
                    </div>
                    <div class ="for-group">
                        <label for="">File </label>
                        <input type="file" name="file" id="file" class="form-control @error('brand_logo') is-invalid @enderror" required>
                        <div class="invalid-feedback">Please Select your File.</div>
                    </div>

                    <div class="modal-footer">
                    <a href ="{{url('/brochure.index')}}" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
