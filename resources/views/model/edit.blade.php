
@extends('layouts.master')
@section('title')
@endsection
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"> Bike Models </div>
            <div class ="card-body">
            <form action="{{ url('model-update/'.$model->id) }}" method = "post" enctype="multipart/form-data" >
            {{csrf_field()}}
          <!-- {{method_field('PUT')}} -->
            <div class="modal-body">
            <div class="form-group">
            <select required class="form-control" name="category_id" id="category_id">

            @foreach($categorys as $category)
            <option  {{ $model->category_id === $category->id? 'selected' : ''}}  value="{{$category->id}}">{{$category->brand_name}}</option>

                     @endforeach
            </select>
            </div>
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title"  value="{{$model->title}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Title</label>
                    <input type="text" name="seo_title" id="seo_title" value="{{$model->seo_title}}" class="form-control" placeholder ="Enter Seo Title" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Keyword</label>
                    <input type="text" name="seo_tag" id="seo_tag" value="{{$model->seo_tag}}" class="form-control" placeholder ="Enter Seo Tag" required>
                </div>
                <div class="form-group">
                    <label for="">Seo Description</label>
                    <textarea type="text" name="seo_desc" id="seo_desc"   row="3"  placeholder = "Enter  Seo Description" class=" form-control" required>{{$model->seo_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea type="text" name="description"   id="description"  row="3" class=" form-control" required>{{$model->description}}</textarea>
                </div>
                <div class ="for-group">
                    <label for="">File</label>
                    <input type="file" name="file" id="file" class="form-control" >
                    <iframe src="{{ asset($model->file) }}" frameborder="1"
                        allowfullscreen="true"  width="100" height="100"></iframe>
                        <label style="font-size: smaller;color: red;">Format: pdf, Max: 2MB</label>
                        @if($errors->has('file'))
                        <span class="text-danger">
                            <li>Oops!  {{$errors->first('file')}}</li>
                        </span>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <a href ="{{url('model.index')}}" class="btn btn-secondary">Close</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
