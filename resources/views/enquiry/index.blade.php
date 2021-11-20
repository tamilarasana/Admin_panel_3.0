@extends('layouts.master')
@section('title')
@endsection
@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Enquiry List
                    <a href="#" data-toggle="modal" id ="dateshow"  data-target="#mmodalDate"class="btn-sm btn-success float-right">Export to Excel/CSV</a>
                    {{-- <a href="#" data-toggle="modal" data-target="#modal-delete-confirmation"class="btn-sm btn-success float-right">Export to Excel/CSV</a> --}}
                </div>
    <div class ="card-body">
               <div class="table-responsive">
                <table id="form" class="table table-hover">
                <thead class ="thead-dark" style="font-size: 0.7em;">
                            <tr>
                            <!-- <th>Id</th> -->
                                <th>Name</th>
                                <th>Type</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Remarks</th>
                                <th>Location</th>
                                 <th>Created_at</th>
                                {{-- <th>Updated_at</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                                <tr>
                                <!-- <td>{{$form->id}}</td> -->
                                    <td>{{$form->name}}</td>
                                    <td>{{$form->type}}</td>
                                    <td>{{$form->phone}}</td>
                                    <td>{{$form->email}}</td>
                                    <td>{{$form->remarks}}</td>
                                    <td>{{$form->location}}</td>
                                    <td>{{$form->created_at}}</td>
                                    {{-- <td>{{$form->updated_at}}</td> --}}
                                </tr>
                            @endforeach
                        </body>
                    </table>
                    {{ $forms->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Date Model --}}
    <div class="modal fade" id="modalDate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLable" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Your Data?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  action ="{{route('export')}}"method="get" class="pull-left" >
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label>From</label>
                        <input type="date" class="form-control input-sm" id="form" name="from" required/>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <label>To</label>
                        <input type="date" class="form-control input-sm" id="to" name="to" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id ="excel_download_id" class="btn btn-danger ml-2"><i class="fa fa-download"></i>Download</button>
                </div>
            </form>

            </div>
        </div>
    </div>


@endsection
@section('scripts')
<script>
$(document).ready( function () {
    $("#dateshow").click(function(){
      $("#modalDate").modal('show');
});

$("#excel_download_id").click(function(){
      $("#modalDate").modal('hide');
});
} );
</script>


@if(Session::has('success'))
		<script>
			toastr.success("{!! Session::get('success')!!}");
		</script>
	@endif


@endsection

