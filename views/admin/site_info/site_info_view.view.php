<h2 style="margin-top:0px">Site_info Read</h2>
        <table class="table">
	    <tr><td>Site Info Name</td><td><?php echo $site_info_name; ?></td></tr>
	    <tr><td>Site Info Description</td><td><?php echo $site_info_description; ?></td></tr>
	    <tr><td>Site Info Keywords</td><td><?php echo $site_info_keywords; ?></td></tr>
	    <tr><td>Site Info Modified</td><td><?php echo $site_info_modified; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('site_info') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        