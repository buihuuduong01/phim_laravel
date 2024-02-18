@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">quản lý thể loại </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($genre))
                    {!! Form::open(['route'=>'genre.store','method'=>'post']) !!}
                    @else
                    {!! Form::open(['route'=>['genre.update', $genre->id],'method'=>'put']) !!}

                    @endif
                   
                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($genre)?$genre->title:'', ['class'=>'form-control','placeholde'=>'nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($category)?$category->title:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...','id'=>'convert_slug']) !!}
                    </div>
                     <div class="form-group">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', isset($genre)?$genre->description:'', ['style'=>'resize:none','class'=>'form-control','placeholde'=>'nhập dữ liệu...']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('active', 'Active', []) !!}
                        {!! Form::select('status',['1'=>'Hiển thị','0'=>'Ẩn'], isset($genre) ? $genre ->status:'', ['class'=>'form-control']) !!}
                     </div>
                    
                     @if (!isset($genre))
                     {!! Form::submit('thêm ', ['class'=>'btn btn-success']) !!}
                     @else
                     {!! Form::submit('sửa ', ['class'=>'btn btn-success']) !!}
                     @endif
                    
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody class="order_position">
                    @foreach($list as $key =>$genre)
                  <tr id="{{ $genre->id }}">
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $genre->title }}</td>
                    <td>{{ $genre->description }}</td>
                    <td>{{ $genre->slug }}</td>
                    <td>
                        @if ($genre->status)
                            Hiển thị 
                        @else
                            Ẩn
                        @endif
                    </td>
                    <td>
                        {!! Form::open([
                            'method'=>'delete','route'=>['genre.destroy',$genre->id,'onsubmit'=>'return confirm("xóa")'] ]) !!}
                            {!! Form::submit('xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('genre.edit',$genre->id) }}" class="btn btn-warning">sửa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
