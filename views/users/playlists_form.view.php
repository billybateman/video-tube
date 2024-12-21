<div id="add_playlist" class="swal2-container swal2-center swal2-fade swal2-shown" style="overflow-y: auto;">
   <div aria-labelledby="swal2-title" aria-describedby="swal2-content" class="swal2-popup swal2-modal swal2-show" tabindex="-1" role="dialog" aria-live="assertive" aria-modal="true" style="display: flex;">
      <div class="swal2-header"> 
         <h2 class="swal2-title" id="swal2-title" style="display: flex;">Add To Channel?</h2>
         <button type="button" class="swal2-close" style="display: none;">×</button>
      </div>
      <div class="swal2-content">
         <div id="swal2-content" style="display: block;">

            <script type="text/javascript">
            $('#update').submit(function() { // catch the form's submit event

                    var formdata = new FormData(this);

                    $.ajax({ // create an AJAX call...
                        type: 'POST',
                        url: $(this).attr('action'),
                        enctype: 'multipart/form-data',
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function(response) { // on success..
                           
                            swal({
                                title: 'Added',
                                text: 'Video has been added to channel!',
                                type: 'success'
                            });

                        }
                    });
                    return false; // cancel original event to prevent form submitting
                });
            </script>
            <form id="update" method="post" action="/users/add_playlist/" enctype="multipart/form-data">
                <input type="hidden" name="videos_id" value="<?php echo $videos_id; ?>">
                
                <div class="setting-card">
                    <div class="row">
                        <div class="col-12">
                        <div class="form-wrap">
                           <select class="form-control" name="channels_id">
                                <?php foreach($playlists as $playlist){ 
                                    $playlist = (array) $playlist;
                                    ?>
                                    <option value="<?php echo $playlist['channels_id']; ?>"><?php echo $playlist['channels_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        </div>
                
                    </div>
                </div>
            
            </form>

         </div>
      </div>
      <div class="swal2-actions" style="display: flex;">
        <button type="button" class="btn-success swal2-styled" onclick="$('#update').submit();" aria-label="">Add</button>
        <button type="button" class="swal2-cancel swal2-styled" onclick="$('#add_playlist').remove();" aria-label="" style="display: inline-block;">Cancel</button></div>
      
   </div>
</div>
   