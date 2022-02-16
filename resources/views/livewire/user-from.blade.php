<form wire:submit.prevent="save">
 <fieldset>
  <legend>User</legend>

  <livewire:input :input="$user_name" fieldType="UserName" label="User Name" errormessage="namefield" search="true" selectedFieldEvent="selectuser" listOptionsEvent="user"> <!--/**user name */-->

  <livewire:input :input="$street_name" fieldType="StreetName" label="Street Name" errormessage="namefield" > <!-- /**street name */  -->

  <livewire:input :input="$building_number" fieldType="BuildingNumber" label="Building Number" errormessage="namefield"> <!--/**buliding number */ -->

  <livewire:input :input="$floor" fieldType="Floor" label="Floor" errormessage="numericfield"> <!--/**floor */ -->

  <livewire:input :input="$number_of_apartment" fieldType="ApartmentNumber" label="Apartment Number" errormessage="numericfield"> <!--/**apt */ -->

  <livewire:input :input="$city" fieldType="City" label="City" errormessage="namefield" search="true" selectedFieldEvent="selectcity" listOptionsEvent="city"> <!--/**city */ -->

    <button type="submit"> Save </button>
 </fieldset>
</form>
