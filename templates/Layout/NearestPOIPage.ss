<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
		<% if $Action == 'index' %>
			$Content
			<span class="button small" onclick="nearestPOIs()">Find</span>

			<div id="nearestpoi_$ID" data-nearest-poi data-layer-id="$PointsOfInterestLayer.ID">
			&nbsp;
			</div>
		<% else_if $Action == 'find' %>
			<table id="nearestPOIs">
			<tr>
			<th>Title</th><th>Distance</th>
			<th>Google Map Pin</th><th>Google Map Directions</th>
			</tr>
			<% loop $Nearest %>
			<tr>
			<td class="name">$Name</td>
			<td class="distance"><strong>{$Distance} km</strong></td>
			<td> class="map"<a href="$MapURL" class="button small" target="_googlemap">Location</a></td>
			<td class="directions"><a href="$DirURL" class="button small" target="_googlemap">Directions</a></td>
			</tr>
			<% end_loop %>
			</table>
		<% end_if %>
	</article>
		$Form
		$PageComments
</div>
