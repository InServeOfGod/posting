@extends("layouts.app")

@section('content')
    <section class="col-md-6 mx-auto my-5 px-3">
        <h1 class="text-center text-primary fw-bold text-capitalize">{{ __('messages.posts.page', ['attrib' => 'index']) }}</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success col-1 fw-bold ms-auto d-block">&plus; Create</a>

        <span class="text-muted text-capitalize">{{ trans_choice('messages.posts.show', count($data), ['count' => count($data)]) }}</span>

        @foreach($data as $datum)
            <div class="card my-5">
                <div class="card-header">
                    <h3 class="card-title text-primary">{{ $datum->name }}</h3>
                    <h5 class="card-subtitle text-secondary fw-bold text-capitalize">{{ $datum->title }}</h5>

                    <div class="text-end">
                        <a href="{{ route('posts.show', $datum->id) }}" class="btn btn-sm btn-primary fw-bold col-1">Show</a>
                        <a href="{{ route('posts.edit', $datum->id) }}" class="btn btn-sm btn-warning fw-bold col-1">Edit</a>

                        @include("posts.delete")
                    </div>
                </div>

                <p class="card-text p-3 font-monospace">
                    {{ $datum->thoughts }}
                </p>
            </div>
        @endforeach
    </section>
@endsection
