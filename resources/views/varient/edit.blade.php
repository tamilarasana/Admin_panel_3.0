@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Bike Models </div>
            <div class ="card-body">
            <form action="{{ route('varient.update',['varient'=>$varient->id]) }}" method = "post">
            {{csrf_field()}}
          <!-- {{method_field('PUT')}} -->
            <div class="modal-body">
            <div class="form-group">
                <input type ="hidden" name="" value="{{$varient->id}}" >
            <label for="">Category</label>
            <select required class="form-control" name="category_id" id="category_id">
                    @foreach($category as $key => $data)                    
                    <option  {{ $varient->category_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->brand_name}}</option>     
                    @endforeach                                               
                </select>
            </div>
            <div class="form-group">
            <label for="">Bike Model</label>
            <select required class="form-control" name="bikemodel_id" id="bikemodel_id">
                    @foreach($model as $key => $data)
                    <option  {{ $varient->bikemodel_id === $data->id? 'selected' : ''}}  value="{{$data->id}}">{{$data->title}}</option>     
                    @endforeach                                               
                </select>
            </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title"  value="{{$varient->title}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" name="description"   id="description"  row="3" class=" form-control">{{$varient->description}}</textarea>
                </div>
        
            </div>
            <div class="modal-footer">
                <a href ="{{url('varient.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
