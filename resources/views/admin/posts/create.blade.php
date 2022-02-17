@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nuovo Post</div>
                <div class="card-body">
                    <form action="{{route("posts.store")}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titolo:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Inserisci il nome del post" value="{{old("title")}}">
                            @error("title")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Contenuto:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="6" name="content" placeholder="Inserisci il contenuto del post">{{old("content")}}</textarea>
                            @error("content")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria:</label>
                            <select class="custom-select @error('category_id') is-invalid @enderror" id="category" name="category_id">
                                <option value="">Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{old("category_id") == "$category->id" ? "selected" : ""}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input @error('published') is-invalid @enderror" id="published" name="published" {{old("published") ? "checked" : ""}}>
                            <label class="form-check-label" for="published">Pubblica</label>
                            @error("published")
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <a href="{{route("posts.store")}}"><button type="submit" class="btn btn-primary">Crea post</button></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection