@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Season</div>
            <div class ="card-body">
            <form action="{{url('update-season.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Season Name</label>
                        <select required class="form-control" name="season_id" id="season_id">
                            <option value="">Choose Our Season</option>  
                              @foreach($updateseason as $key => $data)
                            <option value="{{$data->id}}">{{$data->season_name}}</option> 
                            @endforeach 
                          
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <select required class="form-control" name="product_id" id="product_id">
                            <option value="">Choose Our Product</option>  
                            @foreach($product as $key => $data)
                            <option value="{{$data->id}}">{{$data->name}}</option> 
                            @endforeach 
                        </select>
                    </div>
                  
                   
                    <div class="modal-footer">
                    <a href ="{{url('update-season.index')}}" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
