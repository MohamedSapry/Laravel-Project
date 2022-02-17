<div>

    <label for={{ $fieldType }}>{{ $label }}</label><br>
    <input type = "text" id = {{ $fieldType }} wire:model = "input" wire:keydown="addedAttribute()"><br></br>
    @error('input') <span class="error">{{ $message }}</span><br></br> @enderror
    @if($search == "true" and $input != "")
        <ul>    
            @foreach($options as $option)
                <li wire:click="clickOption( {{ json_encode( $option ) }} )">    
                        <p> {{ $option['name'] }} </p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
