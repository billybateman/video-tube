<?php 
$arr = get_defined_vars();

// print $b
print_r($arr);
?>

<h2 style="margin-top:0px">Users Types > View</h2>
        <table class="table">
	    <tr><td>Name</td><td><?php echo $users_types_name; ?></td></tr>
	    <tr><td>Value</td><td><?php echo $users_types_value; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('users_types') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        