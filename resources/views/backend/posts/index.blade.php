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
                            <th>Description</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
