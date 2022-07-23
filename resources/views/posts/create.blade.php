@extends("layouts.app")

@section('content')
    <section class="col-md-6 mx-auto my-5 px-3">
        <h1 class="text-center text-primary fw-bold text-capitalize">{{ __('messages.posts.page', ['attrib' => 'create']) }}</h1>

        <form class="mt-5 col-md-6 mx-auto card p-4" action="{{ route('posts.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="Title">Title : </label>
                <input type="text" id="Title" name="title" class="form-control @error('title')is-invalid @enderror" value="{{ old('title') }}">
                @error('title')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Thoughts">Thoughts : </label>
                <textarea id="Thoughts" name="thoughts" class="form-control @error('thoughts')is-invalid @enderror">{{ old('thoughts') }}</textarea>

                @error('thoughts')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="text-end">
                <button class="btn btn-success btn-sm" type="submit">Submit</button>
            </div>
        </form>
    </section>
@endsection
