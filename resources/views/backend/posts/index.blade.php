@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Posts <a href="{{ route('posts.create') }}" class="btn btn-primary float-right">Create
                    Post</a></h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('language.no') }}</th>
                            <th>{{ __('language.title') }}</th>
                            <th>{{ __('language.sbutitle') }}</th>
                            <th>{{ __('language.action') }}</th>
                        </tr>
                    </thead>
                    @foreach ($posts as $post)
                        <tbody>
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', [$post->id]) }}" class="mx-2"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="mx-2 delete" id="{{ $post->id }}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <tfoot>
                        {{ $posts->links() }}
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


@section('script')
    <script>
        $('.delete').click(function(e) {
            e.preventDefault();

            var id = $(this).attr('id');
            var url = '/posts/' + id;

            Swal.fire({
                title: "{{ __('language.areYouSure') }}",
                text: "{{ __('language.youWontBeAbleToRevertThis') }}",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "{{ __('language.deletePost') }}",
                cancelButtonText: "{{ __('language.cancel') }}"
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',

                        success: function(data) {

                            Swal.fire({
                                title: "{{ __('language.deleted') }}",
                                text: "{{ __('language.postHasBeenDeleted') }}",
                                icon: "success"
                            }).then(() => {
                                location.reload();
                            });

                        },

                        error: function(xhr) {
                            console.log(xhr.responseText);

                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong.",
                                icon: "error"
                            });
                        }
                    });

                }

            });
        });
    </script>
@endsection
