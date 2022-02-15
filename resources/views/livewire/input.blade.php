<div>

    <label for={{ $label }}></label>
    <input type = "text" id = {{ $label }} wire:model = "input" placeholder = {{ $label }} wire:keydown="addedAttribute()"><br></br>
    @error('input') <span class="error">{{ $message }}</span><br></br> @enderror
    @if($search == "true")
        @if(isset($users) and count($users) > 0 and $input != "" and $label == "UserName")
            <ul >  
                @foreach($users as $user)
                    <li wire:click="clickName('{{ $user->name }}', '{{ $user->id }}')">
                        <p>
                            {{ $user->name }}
                        </p>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif
        
    @if($search == "true")
        @if(count($areas) > 0 and $input != "" and $label == "City")
            <ul>
                @foreach($areas as $area)
                    <li wire:click="clickCity('{{ $area->city }}', '{{ $area->country }}', '{{ $area->id }}')">
                        <p>
                            {{ $area->city }}, {{ $area->country }}
                        </p>
                    </li>
                @endforeach
            </ul>
        @endif
    @endif

</div>
