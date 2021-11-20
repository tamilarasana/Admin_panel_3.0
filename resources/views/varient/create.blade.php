@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add New Varients</div>
            <div class ="card-body">
            <form action="{{route('varient.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}

                <div class="modal-body">
            <div class="form-group">
                <label for="">Category</label>
                    <select  class="form-control" name="category_id" id="category_id" required>
                    <option value="">Choose Our Category</option>
                    @foreach($category as $key => $data)
                        <option value="{{$data->id}}">{{$data->brand_name}}</option> 
                    @endforeach                                                              
                </select>
            </div>
            <div class="form-group">
                <label for="">Bike Model</label>
                <select  class="form-control" name="bikemodel_id" id="bikemodel_id" required>
                  <option value="">Choose Our Model</option> 
                  @foreach($model as $key => $data)
                        <option value="{{$data->id}}">{{$data->title}}</option> 
                    @endforeach                                                             
               </select>
            </div>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" id="title" placeholder ="Enter Title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea type="text" name="description" id="description" row="3" placeholder = "Enter Description" class=" form-control" required></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="">Status</label>                
                <select  class="form-control has-error"  id ="status" name ="status">
                    <option value="">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>              
                </select>
            </div> -->
                

                    <div class="modal-footer">
                    <a href ="{{url('varient.index')}}" class="btn btn-secondary">Close</a>
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
