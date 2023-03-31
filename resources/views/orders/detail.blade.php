<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    @extends("layouts.app")
    
    @section("content")
    <div class="container">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $order->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $order->created_at->diffForHumans() }}
                    Category: <b> {{ $order->category->name }}</b>
                </div>
                <p class="card-text">{{ $order->body }}</p>
                <a class="btn btn-warning"
                href="{{ url("/orders/delete/$order->id") }}">
                Delete
                </a>
            </div>
        </div>

        <ul class="list-group mb-2">
            <li class="list-group-item active">
                <b> Comments ({{ count($order->comments) }})</b>
            </li>
            @foreach($order->comments as $comment)
            <li class="list-group-item">
                <a href="{{ url ("/comments/delete/$comment->id")}}""
                    class="btn-close float-end">
                </a>
                {{ $comment->content }}
            </li>
            @endforeach
        </ul>

        <form action="{{ url('/comments/add') }}" method="post">
            @csrf
            <input type="hidden" name="order_id"
            value="{{ $order->id }}">
            <textarea name="content" class="form-control mb-2"
            placeholder="New Comment"></textarea>
            <input type="submit" value="Add Comment"
            class="btn btn-secondary">
        </form>
    </div>
    @endsection
</body>
</html>