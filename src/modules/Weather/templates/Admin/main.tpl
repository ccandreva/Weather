{ include file="Admin/menu.tpl" }

<h3>NOAA Zones</h3>
<table>
    <tr>
	<th>ID</th>
	<th>Description</th>
	<th>URL</th>
    </tr>
    {foreach from=$zones item='zone'}
    <tr>
	<td>{$zone.id}</td>
	<td><a href="{modurl modname="weather" type="admin" func="editNOAAZone" id=$zone.id }">{$zone.description}</a></td>
	<td>{$zone.url}</td>
    </tr>
    {/foreach}
</table>
