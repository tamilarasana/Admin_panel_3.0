

@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="continer">
    <div class="row">    
        <div class="col-md-12">          
            <div class="card">
                <div class="card-header"> Add New Spectification 
                </div>
                <div class ="card-body">
                    <div class="table-responsive">
                    @if($page_type == "add")                     
                    <form action="{{route('colour.store')}}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{ url('colours-update/'.$colours-> colours_id) }}" method="post" enctype="multipart/form-data">
                    @endif 
                    @csrf
                        <table class="table table-hover">
                        <thead class ="thead-dark" style="font-size: 0.7em;">
                            <tr>                               
                                <th>Colour Name</th>
                                <th>Colour Code</th>                                                                                       
                            </tr>
                        </thead>
                        <tbody>                                                          
                            <input type="hidden" name="product_id"   value="{{$colours->id}}" >
                            <input type="hidden" name="bikemodel_id"   value="{{$colours->bikemodel_id}}" >
                            <input type="hidden" name="varient_id"   value="{{$colours->varient_id}}" >
                        @if($page_type == "add")
                        <td>
                            <input type="text" name="colour_name"  value=""  placeholder ="Enter your Value" class="form-control" required></td>                                           </td>
                        <td>
                        <input type="text" name="colour_code"  value ="" placeholder ="Enter your Value" class="form-control" required></td>                   
                        </td>
                        @else
                        <input type="hidden" name="id" value="{{$colours->colours_id}}">
                        <td>
                            <input type="text" name="colour_name"   value="{{$colours->colour_name}}" placeholder ="Enter your Value" class="form-control" required></td>                                           </td>
                        <td>
                        <input type="text" name="colour_code"  value ="{{$colours->colour_code}}" placeholder ="Enter your Value" class="form-control" required></td>                   
                        </td>                        
                        @endif                      
                        </body>
                        </table>
                            <div class="modal-footer">
                                <a href ="{{route('bike.index')}}" class="btn btn-secondary">Close</a>
                                <button type="submit" class="btn btn-danger sm-3 ">Submit</button>
                            </div>
                    </form>
                </div>
            </div>         
        </div>
    </div>
</div>


@endsection

@section('scripts')



