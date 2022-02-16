<div>

    <label for={{ $fieldType }}>{{ $label }}</label><br>
    <input type = "text" id = {{ $fieldType }} wire:model = "input" wire:keydown="addedAttribute()"><br></br>
    @error('input') <span class="error">{{ $message }}</span><br></br> @enderror
    @if($search == "true" and $input != "")
        <ul>    
            @foreach($options as $option)
                <li wire:click="clickOption( {{ json_encode( $option ) }} )">    
                    @if($fieldType == "UserName")
                        <p> {{ $option['name'] }} </p>
                    @elseif($fieldType == "City")
                        <p> {{ $option['city'] }}</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
