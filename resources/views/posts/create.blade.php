
<div class="card">
    <div class="card-header">{{ __('Create Post') }}</div>

    <div class="card-body">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post" action="{{ route('posts.store') }}">

            <!-- CROSS Site Request Forgery Protection -->
            @csrf
            {{-- @method=post --}}

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="name" id="name">

                <!-- Error -->
                @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="message" id="message" rows="4"></textarea>

                <!-- Error -->
                @if ($errors->has('description'))
                <div class="text-danger">
                    {{ $errors->first('description') }}
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
</div>

