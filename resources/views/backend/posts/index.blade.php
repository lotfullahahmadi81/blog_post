@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Posts <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">Create
                    Post</a></h5>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>NO</th>
                            <th>Title</th>
                            <th>SubTitle</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>
                                    <a href="{{route('posts.edit',[$post->id])}}" class="mx-2"><i class="fa fa-edit"></i></a>
                                    <a href="" class="mx-2"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
