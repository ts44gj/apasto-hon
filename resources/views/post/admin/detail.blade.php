@include('layouts.admin.app')
@section('title', '編集')

@section('content')

    <a href="{{ route('admin_Timeline') }}">
        <button class="btn btn-danger" type="submit">store_home</button>
    </a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img-top">
                                <div class="row justify-content-center">
                                    {{ old($post->image) }}
                                </div>
                            </div>
                            <form method="POST" action="{{ route('posts.update', $post->id) }}">
                                @csrf
                                @method('PUT')
                                <fieldset class="mb-4">
                                    <img class="image-resize" width="600px" height="auto"
                                                        src="{{ asset($post->image) }}">
                                    <div class="form-group">
                                        <input id="text" name="text"
                                            class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}"
                                            value="{{ old('text') ?: $post->text }}" type="text">
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
                </div>
            </div>
        </div>
    </div>
