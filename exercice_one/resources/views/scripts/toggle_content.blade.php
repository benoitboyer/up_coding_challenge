<script>
$("#show-motorbikes").click(function(e){
 
        $("#owners").hide();
        $("#motorbikes").show();        
}); 
$("#show-owners").click(function(e){

    $("#motorbikes").hide();
    $("#owners").show();        
    
}); 	
$("#toggle-new-motorbike").click(function(e){
	$("#owner-form-container").hide();
	$("#toggle-new-owner").removeClass("btn-primary ").addClass("btn-secondary");
	$("#toggle-new-motorbike").removeClass('btn-secondary').addClass("btn-primary");
	$("#motorbike-form-container").show();
}); 
$("#toggle-new-owner").click(function(e){
	$("#motorbike-form-container").hide();
	$("#toggle-new-motorbike").removeClass("btn-primary").addClass("btn-secondary");
	$("#toggle-new-owner").removeClass('btn-secondary').addClass("btn-primary");
	$("#owner-form-container").show();
}); 
</script>