<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
</head>
<body>
    <h1>Order List</h1>

    @extends("layouts.app")
    
    @section("content")
    <div class="container">
        @if(session('info'))
        <div class="alert alert-info">
            {{ session('info') }}
        </div>
        @endif
        
        {{ $orders ->links() }}

        @foreach($orders as $order)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $order->title }}</h5>
                <div class="card-subtitle mb-2 text-muted small">
                    {{ $order->created_at->diffForHumans() }}
                </div>
                
                <p class="card-text">{{ $order->body }}</p>
                <a class="card-link" 
                href="{{ url("/orders/detail/$order->id") }}">
                View Detail &raquo;
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
</body>
</html>