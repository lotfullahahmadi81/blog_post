@extends('backend.layout.master')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">{{ __('language.users') }} <a href="{{ route('users.create') }}"
                    class="btn btn-primary float-right">{{ __('language.createUser') }}</a></h5>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('language.no') }}</th>
                            <th>{{ __('language.username') }}</th>
                            <th>{{ __('language.email') }}</th>
                            <th>{{ __('language.profilePicture') }}</th>
                            <th>{{ __('language.action') }}</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->profile->profile_picture }}</td>
                                <td>
                                    <a href="{{ route('users.edit', [$user->id]) }}" class="mx-2"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="#" class="mx-2 delete" id="{{ $user->id }}"><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    <tfoot>
                        {{ $users->links() }}
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
            var url = '/users/' + id;

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
