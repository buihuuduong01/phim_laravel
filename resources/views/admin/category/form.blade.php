@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">quản lý danh mục</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($category))
                    {!! Form::open(['route'=>'category.store','method'=>'post']) !!}
                    @else
                    {!! Form::open(['route'=>['category.update', $category->id],'method'=>'put']) !!}

                    @endif
                   
                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($category)?$category->title:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($category)?$category->title:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...','id'=>'convert_slug']) !!}
                    </div>
                     <div class="form-group">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', isset($category)?$category->description:'', ['style'=>'resize:none','class'=>'form-control','placeholde'=>'nhập dữ liệu...','id'=>'description']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('active', 'Active', []) !!}
                        {!! Form::select('status',['1'=>'Hiển thị','0'=>'Ẩn'], isset($category) ? $category ->status:'', ['class'=>'form-control']) !!}
                     </div>
                     @if (!isset($category))
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
                    @foreach($list as $key =>$cate)
                  <tr id="{{ $cate->id }}">
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $cate->title }}</td>
                    <td>{{ $cate->description }}</td>
                    <td>{{ $cate->slug }}</td>
                    <td>
                        @if ($cate->status)
                            Hiển thị 
                        @else
                            Ẩn
                        @endif
                    </td>
                    <td>
                        {!! Form::open([
                            'method'=>'delete','route'=>['category.destroy',$cate->id,'onsubmit'=>'return confirm("xóa")'] ]) !!}
                            {!! Form::submit('xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('category.edit',$cate->id) }}" class="btn btn-warning">sửa</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
