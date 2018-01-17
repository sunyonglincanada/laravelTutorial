@extends('layouts.master')


@section('content')
    <div class="col-sm-8 blog-main">
        <h1>Publish a Post</h1>



        <form method="POST" ACTION="/posts">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publish</button>
        </form>



    </div>

@endsection