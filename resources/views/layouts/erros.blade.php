
@if ($errors->any())
<div class='card-footer alert-danger'>
    @foreach ($errors->all() as $error)
        {{ $error }}<br>                                    
    @endforeach
</div>
@else                            
    @if (isset($success))
        <div class='card-footer alert-success'>
            {{ $success }}
        </div>
    @endif                            
@endif 