@extends("layouts.app")

@section('content')
    <section class="col-md-6 mx-auto my-5 px-3">
        <h1 class="text-center text-primary fw-bold text-capitalize">{{ __('messages.posts.page', ['attrib' => 'show']) }}</h1>

        @foreach($data as $datum)
            <div class="table-responsive-md mt-3">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>{{ $datum->name }}</td>
                    </tr>

                    <tr>
                        <td>Title</td>
                        <td>{{ $datum->title }}</td>
                    </tr>

                    <tr>
                        <td>Thoughts</td>
                        <td>{{ $datum->thoughts }}</td>
                    </tr>
                </table>
            </div>

            <div class="text-end mt-1">
                <a href="{{ route('posts.edit', $datum->id) }}" class="btn btn-sm btn-warning fw-bold col-1">Edit</a>
                @include('posts.delete')
            </div>
        @endforeach
    </section>
@endsection
