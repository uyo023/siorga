@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $item)
            <li>
                {{ $item }}
            </li>
        @endforeach
    </ul>
</div>
    
@endif

@if (Session::get('succes'))
    <div class="alert succes">{{ Session::get('succes') }}</div>
@endif