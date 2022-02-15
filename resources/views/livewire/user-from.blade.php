<form wire:submit.prevent="save">
 <fieldset>
  <legend>User</legend>

  <livewire:input :input="$user_name" label="UserName" errormessage="namefield" search="true"> <!--/**user name */-->

  <livewire:input :input="$street_name" label="StreetName" errormessage="namefield"> <!-- /**street name */  -->

  <livewire:input :input="$building_number" label="BuildingNumber" errormessage="namefield"> <!--/**buliding number */ -->

  <livewire:input :input="$floor" label="Floor" errormessage="numericfield"> <!--/**floor */ -->

  <livewire:input :input="$number_of_apartment" label="ApartmentNumber" errormessage="numericfield"> <!--/**apt */ -->

  <livewire:input :input="$city" label="City" errormessage="namefield" search="true"> <!--/**city */ -->
 
 
    <button type="submit"> Save </button>
 </fieldset>
</form>
