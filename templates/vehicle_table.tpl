{* smarty *}
<h3>Vehicles</h3>
<table class="table">
	<tr>
		<th>Registration Number</th>
		<th>Make</th>
		<th>Model</th>
		<th>Year</th>
		<th>Mileage</th>
		<th></th>
	</tr>
	{foreach $vehicleList as $vehicle} 
	<tr {if !$vehicle->getStatus()}class="row-error"{/if}>
		<td>{$vehicle->getRegNr()}</td>
		<td>{$vehicle->getMake()}</td>
		<td>{$vehicle->getModel()}</td>
		<td>{$vehicle->getYear()}</td>
		<td>{$vehicle->getMileage()}</td>
		<td><a href="{$smarty.const.FILENAME_VEHICLE}?regNr={$vehicle->getRegNr()}">Edit</a></td>
	</tr>
	{foreachelse}
	<tr>
		<td colspan="5">
			No vehicles registered
		</td> 
	</tr>
	{/foreach}
</table>
<a href="{$smarty.const.FILENAME_VEHICLE}">+ Add Vehicle</a>