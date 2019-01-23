
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

<!-- Erro via ajax -->
<div class="alert alert-danger print-error-msg" style="display:none">
    <ul></ul>
</div>