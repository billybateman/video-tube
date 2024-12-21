<h2 style="margin-top:0px">Site info</h2><form action="/admin/site_info/update_action" method="post">
	    <div class="form-group">
                        <label for="varchar">Name </label>
                        <input type="text" class="form-control" name="site_info_name" id="site_info_name" placeholder="Name" value="<?php echo $site_info_name; ?>" required />
                    </div>
	    <div class="form-group">
                        <label for="site_info_description">Description</label>
                        <textarea class="form-control" rows="3" name="site_info_description" id="site_info_description" placeholder="Description" required ><?php echo $site_info_description; ?></textarea>
                    </div>
	    <div class="form-group">
                        <label for="site_info_keywords">Keywords</label>
                        <textarea class="form-control" rows="3" name="site_info_keywords" id="site_info_keywords" placeholder="Keywords" required ><?php echo $site_info_keywords; ?></textarea>
                    </div>
	    
	    <input type="hidden" name="site_info_id" value="<?php echo $site_info_id; ?>" /> 
	    <button type="submit" class="btn btn-primary">Update</button> 
	    <a href="<?php echo site_url('site_info') ?>" class="btn btn-default">Cancel</a>
	</form>
    