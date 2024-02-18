@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{ route('movie.index') }}" class="btn btn-primary">Liệt kê phim</a>
                <div class="card-header">quản lý phim </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!isset($movie))
                    {!! Form::open(['route'=>'movie.store','method'=>'post','enctype'=>'multipart/form-data']) !!}
                    @else
                    {!! Form::open(['route'=>['movie.update', $movie->id],'method'=>'put','enctype'=>'multipart/form-data']) !!}

                    @endif
                   
                    <div class="form-group">
                        {!! Form::label('title', 'Title', []) !!}
                        {!! Form::text('title', isset($movie)?$movie->title:'', ['class'=>'form-control','placeholde'=>'nhập dữ liệu...','id'=>'slug','onkeyup'=>'ChangeToSlug()']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('slug', 'Slug', []) !!}
                        {!! Form::text('slug', isset($movie)?$movie->title:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...','id'=>'convert_slug']) !!}
                    </div>
                    <div class="form-group">
                     {!! Form::label('trailer', 'Trailer', []) !!}
                     {!! Form::text('trailer', isset($movie)?$movie->trailer:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...']) !!}
                 </div>
                    <div class="form-group">
                        {!! Form::label('tên tiếng anh', 'Tên tiếng anh', []) !!}
                        {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                    </div>
                    <div class="form-group">
                     {!! Form::label('thoiluong', 'Thời lượng phim', []) !!}
                     {!! Form::text('thoiluong', isset($movie)?$movie->thoiluong:'', ['class'=>'form-control','placeholder'=>'nhập dữ liệu...']) !!}
                 </div>
                     <div class="form-group">
                        {!! Form::label('description', 'Description', []) !!}
                        {!! Form::textarea('description', isset($movie)?$movie->description:'', ['style'=>'resize:none','class'=>'form-control','placeholde'=>'nhập dữ liệu...']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('tags', 'Tags phim', []) !!}
                        {!! Form::textarea('tags', isset($movie)?$movie->tags:'', ['style'=>'resize:none','class'=>'form-control','placeholde'=>'nhập dữ liệu...']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('active', 'Active', []) !!}
                        {!! Form::select('status',['1'=>'Hiển thị','0'=>'Ẩn'], isset($movie) ? $movie ->status:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Resolution', 'Định dạng', []) !!}
                        {!! Form::select('resolution',['1'=>'SD','0'=>'HD','2'=>'HDcam','3'=>'Cam','4'=>'FullHD','5'=>'Trailler'], isset($movie) ? $movie ->status:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Phude', 'Phụ đề', []) !!}
                        {!! Form::select('phude',['1'=>'Thuyết minh','0'=>'Vietsub'], isset($movie) ? $movie ->phude:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Category', 'category', []) !!}
                        {!! Form::select('category_id',$category, isset($movie) ? $movie ->category:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Country', 'country', []) !!}
                        {!! Form::select('country_id',$country, isset($movie) ? $movie ->country:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Genre', 'genre', []) !!}
                        {!! Form::select('genre_id',$genre, isset($movie) ? $movie ->genre:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Hot', 'hot', []) !!}
                        {!! Form::select('phim_hot', ['1'=>'có','0'=>'không'], isset($movie) ? $movie ->phim_hot:'', ['class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                        {!! Form::label('Image', 'image', []) !!}
                        {!! Form::file('image', ['class'=>'form-control']) !!}
                     </div>
                     @if(isset($movie))
                     <img width="150" src="{{asset('uploads/movie/'.$movie->image)}}">
                   @endif
                     @if (!isset($movie))
                     {!! Form::submit('thêm ', ['class'=>'btn btn-success']) !!}
                     @else
                     {!! Form::submit('sửa ', ['class'=>'btn btn-success']) !!}
                     @endif
                    
                    {!! Form::close() !!}
                </div>
            </div>
           
          
    </div>
</div>
@endsection
