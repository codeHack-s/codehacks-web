<!--Check if there are any messages within the session-->
@if(session('success'))
    <div class="alert rounded mt-3 alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert rounded mt-3 alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
