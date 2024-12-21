<h2 style="margin-top:0px">Site_info</h2><form action="/admin/site_info/create_action" method="post">
	    <div class="form-group">
                        <label for="varchar">Name </label>
                        <input type="text" class="form-control" name="site_info_name" id="site_info_name" placeholder="Name" value="" required />
                    </div>
	    <div class="form-group">
                        <label for="site_info_description">Description</label>
                        <textarea class="form-control" rows="3" name="site_info_description" id="site_info_description" placeholder="Description" required ></textarea>
                    </div>
	    <div class="form-group">
                        <label for="site_info_keywords">Keywords</label>
                        <textarea class="form-control" rows="3" name="site_info_keywords" id="site_info_keywords" placeholder="Keywords" required ></textarea>
                    </div>
	   
	    <button type="submit" class="btn btn-primary">Create</button> 
	    <a href="<?php echo site_url('site_info') ?>" class="btn btn-default">Cancel</a>
	</form>
    