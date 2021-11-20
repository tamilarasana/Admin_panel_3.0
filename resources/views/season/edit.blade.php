@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Bike Season </div>
            <div class ="card-body">
            <form action="{{url('season-update/'.$seasons->id)}}" method = "post" enctype="multipart/form-data">
            <!-- {{method_field('PUT')}} -->
            {{csrf_field()}}
            <div class="modal-body">
                    <div class="form-group">
                        <label for="">Season Name</label>
                        <input type="text" name="season_name"  value="{{$seasons->season_name}}" class="form-control" Placeholder ="Enter Your Season Name" required>   
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" id="description" row="3"  placeholder = "Enter Description" class=" form-control" required>{{$seasons->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Blog Position</label>
                        <input type="text" name="b_position"   value ="{{$seasons->b_position}}" class="form-control" Placeholder ="Enter Blog Position" required>   
                    </div>
                    <div class="form-group">
                        <label for="">Index Position</label>
                        <input type="text" name="i_position" value ="{{$seasons->i_position}}"  class="form-control" Placeholder ="Enter Your Index Position" required>   
                    </div>   
            <div class="modal-footer">
                <a href ="{{url('season.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
