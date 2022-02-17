@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifica Post: {{$post->title}}</div>
                <div class="card-body">
                    <form action="{{route("posts.update", $post->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Titolo:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del post" value="{{old("title") ?? $post->title}}">
                            @error("title")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="6" name="content" placeholder="Inserisci il contenuto del post">{{old("content") ?? $post->content}}</textarea>
                            @error("content")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            @php
                                $checked = old("published") ?? $post->published;
                            @endphp
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{$checked ? "checked" : ""}}>
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error("published")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Modifica post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection