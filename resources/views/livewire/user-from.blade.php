<form wire:submit.prevent="save">
 <fieldset>
  <legend>User</legend>
  
  <input type="text" wire:model="user_name" wire:keydown="listUsers()" placeholder="User Name"><br></br>
  @error('user_name') <span class="error">{{ $message }}</span><br></br> @enderror
  <ul >
    @if($user_name != "")
        @foreach($users as $user)
            <li wire:click="clickName('{{ $user->name }}', '{{ $user->id }}')">
                <p>
                    {{ $user->name }}
                </p>
            </li>
        @endforeach
    @endif
  </ul>

  <input type="text"  wire:model="street_name" placeholder="Street Name"><br></br>
  @error('street_name') <span class="error">{{ $message }}</span><br></br> @enderror

  <input type="text"  wire:model="building_number" placeholder="Building Number"><br></br>
  @error('building_number') <span class="error">{{ $message }}</span><br></br> @enderror
  
  <input type="text"  wire:model="floor" placeholder="Floor"><br></br>
  @error('floor') <span class="error">{{ $message }}</span><br></br> @enderror
  
  <input type="text"  wire:model="number_of_apartment" placeholder="Apartment Number"><br></br>
  @error('number_of_apartment') <span class="error">{{ $message }}</span><br></br> @enderror

  <input type="text"  wire:model="city" wire:keydown="listAreas()" placeholder="Find City"><br></br>
  @error('city') <span class="error">{{ $message }}</span><br></br> @enderror

  <ul>
        @if($city != "")
            @foreach($areas as $area)
                <li wire:click="clickCity('{{ $area->city }}', '{{ $area->country }}', '{{ $area->id }}')">
                    <p>
                        {{ $area->city }}, {{ $area->country }}
                    </p>
                </li>
            @endforeach
        @endif
    </ul>

  <button type="submit"> Save </button>
 </fieldset>
</form>
