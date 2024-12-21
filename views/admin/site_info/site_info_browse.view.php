
        <h2>Sites</h2>
            <div class="col-md-4">
                <a href="/admin/site_info/create" title="Create" class="btn btn-primary">Create</a>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php //echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="/admin/site_info/" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php if(isset($q)){ echo $q; } ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="/admin/site_info" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Site Info Name</th>
		<th>Site Info Description</th>
		<th>Site Info Keywords</th>
		<th>Site Info Modified</th>
		
            </tr><?php
            foreach ($site_info_data as $site_info)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $site_info->site_info_name ?></td>
		      <td><?php echo $site_info->site_info_description ?></td>
		      <td><?php echo $site_info->site_info_keywords ?></td>
		      <td><?php echo $site_info->site_info_modified ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>