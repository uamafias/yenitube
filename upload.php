<?php  
require_once("includes/header.php"); 
require_once("includes/classes/VideoDetailsFormsProvider.php"); 
?>
                           
<div class="column">
<?php

$formProvider = new VideoDetailsFormProvider($con);
echo $formProvider->createUploadForm();
echo uniqid();
?>


</div>

<script>
$("form").submit(function(){
    $("#loadingModal").modal("show");
   
});


</script>    


<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="loadingModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        Please wait this might take a while.
        <img src="assets/images/icons/loading-spinner.gif" alt="Loading-Spinner GIF">
      </div>
    </div>
  </div>
</div>



<?php  require_once("includes/footer.php"); ?>                   