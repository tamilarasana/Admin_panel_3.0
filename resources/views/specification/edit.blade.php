@extends('layouts.master')
@section('title')
@endsection
@section('content')

<div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                <h3 class="text-center text-danger"><b>Add New Spectification</b> </h3>
                 <form action="{{ url('specification-update/'.$specification->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
            <label for="">Spectification</label>
            <select required class="form-control" name="specname_id" id="specname_id">
                @foreach($specname as $key => $data)
                    <option value="{{$data->id}}">{{$data->specname}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
            <label for="">Product</label>
            <select required class="form-control" name="product_id" id="product_id">
               @foreach($product as $key => $data)
                 <option value="{{$data->id}}">{{$data->name}}</option>
               @endforeach
                </select>
            </div>
                <div class="form-group">
                    <label for="">Value</label>
                    <input type="text" name="value" id="value"  value="{{$specification->value}}"  class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <select  class="form-control has-error"  id ="status" name ="status" value="{{$specification->status}}" required>>
                    <option value="">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Deactive</option>
                </select>
                </div>

                    <button type="submit" class="btn btn-danger mt-3 ">Update</button>
                    <a href ="#" class="btn btn-secondary">Close</a>
                </form>
                   </div>
                </div>
            </div>









@endsection
