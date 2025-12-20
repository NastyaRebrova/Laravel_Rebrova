@extends('layout')
@section('content')
    @foreach($errors->all() as $error)
        <ul class="list-group mb-3">
            <li class="list-group-item list-group-item-danger">{{$error}}</li>
        </ul>
    @endforeach
    
    <form action="/comment/update/{{$comment->id}}" method="POST">
        @CSRF
        <div class="mb-3">
            <label for="text" class="form-label">Edit comment</label>
            <textarea name="text" id="text" class="form-control">{{$comment->text}}</textarea>
        </div>
        <input type="hidden" name="article_id" value="{{$comment->article_id}}">
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection