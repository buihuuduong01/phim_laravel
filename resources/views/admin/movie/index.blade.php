@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       
        <div class="col-md-12">
            <a href="{{ route('movie.create') }}" class="btn btn-primary">Thêm phim</a>
           
            <table class="table" id="tablephim">
                <thead>
                  <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Title</th>
                    <th scope="col">Tags</th>
                    {{-- <th scope="col">Trailler</th> --}}
                    <th scope="col">Thời lượng phim</th>
                    <th scope="col">Image</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Định dạng</th>
                    <th scope="col">Phụ đề</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Slug</th>
                    <th scope="col">Active/Inactive</th>
                    <th scope="col">Category</th>
                    <th scope="col">Country</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Năm phim</th>
                    <th scope="col">Season</th>
                    <th scope="col">Top views</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Ngày cập nhật</th>
                    <th scope="col">Manage</th>
                  </tr>
                </thead>
                <tbody class="order_position">
                    @foreach($list as $key =>$movie)
                  <tr id="{{ $movie->id }}">
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->tags }}</td>
                    <td>{{ $movie->thoiluong }}</td>
                    <td> <img width="66%" src="{{ asset('uploads/movie/'.$movie->image)  }}"> </td>
                    <td>
                        @if ($movie->phim_hot==0)
                        Không
                    @else
                       Có
                    @endif
                    </td>
                    <td>
                        @if ($movie->resolution==0)
                        HD
                    @elseif ($movie->resolution==1)
                       SD
                       @elseif ($movie->resolution==2)
                       HDCam
                       @elseif ($movie->resolution==3)
                       Cam
                       @elseif ($movie->resolution==4)
                       Full Hd
                       @else
                       Trailler
                    @endif
                    </td>
                    <td>
                        @if ($movie->phude==0)
                        Vietsub
                       @else
                       Thuyết minh
                    @endif
                    </td>
                    
                    {{-- <td>{{ $movie->description }}</td> --}}
                    <td>{{ $movie->slug }}</td>
                    <td>
                        @if ($movie->status)
                            Hiển thị 
                        @else
                            Ẩn
                        @endif
                    </td>
                    <td>{{ $movie->category->title }}</td>
                    <td>{{ $movie->country->title }}</td>
                    <td>{{ $movie->genre->title }}</td>
                     <td>
                        <form method="post">
                            @csrf
                        {{ Form::selectYear('year', 2000, 2022, isset($movie->year)?$movie->year :'', ['class' => 'select-year', 'id' => $movie->id]) }}
                        </form>
                    </td>
                    <td>
                        <form method="post">
                            @csrf
                        {{ Form::selectRange('season', 0, 20,isset($movie->season)?$movie->season :'0', ['class' => 'select-season', 'id' => $movie->id]) }}
                        </form>
                    </td>
                    <td>
                        {!! Form::select('topview',['1'=>'Tuần','0'=>'Ngày','2'=>'Tháng'], isset($movie->topview) ? $movie ->topview:'', ['class'=>'select-topview','id'=>$movie->id]) !!}
                    </td>
                    <td>{{ $movie->ngaytao }}</td>
                    <td>{{ $movie->ngaycapnhat }}</td>
                    <td>
                        {!! Form::open([
                            'method'=>'delete','route'=>['movie.destroy',$movie->id,'onsubmit'=>'return confirm("xóa")'] ]) !!}
                            {!! Form::submit('xóa', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('movie.edit',$movie->id) }}" class="btn btn-warning">sửa</a>
                    </td>
                   
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection
