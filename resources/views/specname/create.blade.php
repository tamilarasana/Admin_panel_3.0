@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Add Specification</div>
            <div class ="card-body">
            <form action="{{route('specname.store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                    <label for="">Spectification Name</label>
                    <input type="text" name="specname" id="specname" placeholder="Enter Specification Name"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Status</label>                
                    <select  class="form-control has-error"  id ="status" name ="status" required>>
                    <option value="">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>              
                </select>
                </div>                      	
                    
                    <button type="submit" class="btn btn-danger mt-3 ">Submit</button>
                    <a href ="{{url('specname.index')}}" class="btn btn-secondary mt-3">Close</a>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
