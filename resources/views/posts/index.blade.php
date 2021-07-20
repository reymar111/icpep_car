@extends('layouts.app')

@section('content')
<posts-component></posts-component>
{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body">
                <posts-component></posts-component>
                    <table class= table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                {{-- <div class="card-footer"> --}}
                {{-- {{ $posts->onEachSide(5)->links() }} --}}
                {{-- </div> --}}
            {{-- </div>
        </div>

        <div class="col-md-4">
            @include('posts.create')
        </div>
    </div>
</div> --}}
@endsection
