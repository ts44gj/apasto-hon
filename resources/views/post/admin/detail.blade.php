@include('layouts.admin.app')
@section('title','編集')

@section('content')

    <a href="{{route('admin.home.index')}}">
        <button class="btn btn-danger" type="submit">store_home</button>
    </a>

    {{old($post->image)}}

    <form method="POST" action="{{route('posts.update', $post->id) }}">
            @csrf
            @method('PUT')
        <fieldset class="mb-4">
             <img class="img-responsive" src="{{ asset($post -> image) }}">

            <div class="form-group">
                    <label for="text">
                        text
                    </label>
                    <input
                        id="text"
                        name="text"
                        class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"
                        value="{{ old('text') ?: $post->text }}"
                        type="text"
                    >
                    @if ($errors->has('text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('text') }}
                        </div>
                    @endif
                </div>


            <button type="submit" class="btn btn-primary">
                        編集する
                    </button>
                </div>
            </fieldset>
        </form>
</div>
