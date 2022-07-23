@extends("layouts.app")

@section('content')
    <section class="col-md-6 mx-auto my-5 px-3">
        <h1 class="text-center text-primary fw-bold text-capitalize">{{ __('messages.posts.page', ['attrib' => 'edit']) }}</h1>

        <form class="mt-5 col-md-6 mx-auto card p-4" action="{{ route('posts.update', $data->id ?? 0) }}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="Title">Title : </label>
                <input type="text" id="Title" name="title" class="form-control" value="{{ $data->title }}">
            </div>

            <div class="mb-3">
                <label for="Thoughts">Thoughts : </label>
                <textarea id="Thoughts" name="thoughts" class="form-control">{{ $data->title }}</textarea>
            </div>

            <div class="text-end">
                <button class="btn btn-success btn-sm" type="submit">Submit</button>
            </div>
        </form>
    </section>
@endsection
