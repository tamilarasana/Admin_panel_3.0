@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Bike Model</div>
            <div class ="card-body">
            <form action="{{route('model.store')}}" method = "post"  enctype="multipart/form-data" >
                {{csrf_field()}}
                <div class="modal-body">
            <div class="form-group">
            <label for="">Category</label>
            <select required class="form-control" name="category_id" id="category_id">
                    <option value="">Choose Our Category</option>
                    @foreach($category as $key => $data)
                        <option value="{{$data->id}}">{{$data->brand_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title"  class="form-control" placeholder ="Enter Title" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Title</label>
                    <input type="text" name="seo_title" id="seo_title"  class="form-control" placeholder ="Enter Seo Title" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Tag</label>
                    <input type="text" name="seo_tag" id="meta_tag"  class="form-control" placeholder ="Enter Seo Tag" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Description</label>
                    <textarea type="text" name="seo_desc" id="seo_desc" row="3"  placeholder = "Enter  Seo Description" class=" form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" name="description" id="description" row="3"  placeholder = "Enter Description" class=" form-control" required></textarea>
                </div>

                <div class ="for-group">
                    <label for="">File </label>
                    <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror" required>
                    <div class="invalid-feedback">Please Select your File.</div>
                    <label style="font-size: smaller;color: red;">Format: pdf</label>
                    @if($errors->has('file'))
                    <span class="text-danger">
                        <li>Oops!  {{$errors->first('file')}}</li>
                    </span>
                @endif
                </div>

            </div>


                    <div class="modal-footer">
                    <a href ="{{url('model.index')}}" class="btn btn-secondary">Close</a>
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
