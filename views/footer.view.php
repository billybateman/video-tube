</div>
      <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
      <i class="fas fa-angle-up"></i>
      </a>
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="/login">Logout</a>
               </div>
            </div>
         </div>
      </div>
     
      <script src="/assets/frontend/js/bootstrap.bundle.min.js" type="text/javascript"></script>
      <script src="/assets/frontend/js/jquery.easing.min.js" type="text/javascript"></script>
      <script src="/assets/frontend/js/owl.carousel.js" type="text/javascript"></script>
      <?php if(!isset($user)){  ?>
         <script src="/assets/frontend/js/custom.js" type="text/javascript"></script>
      <?php } else { ?>
         <script src="/assets/frontend/js/custom-user.js" type="text/javascript"></script>
      <?php } ?>
   


   <link href="/assets/admin/vendor/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css"/>	
   <script src="/assets/admin/vendor/sweetalert2/dist/sweetalert2.min.js"></script>


</body>

</html>