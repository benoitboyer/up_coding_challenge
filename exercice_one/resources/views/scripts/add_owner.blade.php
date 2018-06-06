<script>


$(document).ready(function(){
	
    $('#owner-btn').click(function(e){
        e.preventDefault();
        var name = $('#name').val();
        var token = $('#token-owner').val();
        var location = $('#location').val();
        var motorbike_id = $('#select-motorbike option:selected').val();
        console.log(motorbike_id);
        

        $.ajax({
    		dataType: 'json',
    		type:'POST',
    		url: '{{url("/create-owner")}}',
    		data: { 

    			'name' : name,
    			'_token' : token,
    			'location' : location,
    			'motorbike_id' : motorbike_id 
    		},

    		success: function(data) {
    			//get the option text of created owner
    			var motorbike_info = $('#select-motorbike option:selected').text();
    			//Add the form input to the owner table
    			$("#new-owner-tr").append("<tr><td>"+name+"</td><td>"+motorbike_info+"</td><td>"+location+" </td></tr>");
                
                //display sucess message but clear all previous messages first
                
                $("#error-owner").empty().hide();
                $("#error-motorbike").empty().hide();
                $("#sucess-motorbike").empty().hide();
                $("#sucess-owner").empty();
				$("#sucess-owner").append("Owner sucessfully added").show();                

				//remove is-invalid class for each input
				$("#name").removeClass('is-invalid');
                $("#location").removeClass("is-invalid");
                $("#select-motorbike").removeClass("is-invalid"); 

				//reset the form value
				$('#owner-form').trigger('reset');

               
          	},
          	error: function (data) {
                
                //create a list with the validation errors sent by the controller
                
                var errors = "<ul>";

                for (error in data.responseJSON) {
                    errors += "<li>"+data.responseJSON[error] + "</li>" ;
                }
                errors +="</ul>";

                //add class is-invalid for each input with an error and is-valid for valid-one
                if(typeof data.responseJSON['name']!="undefined"){$('#name').addClass("is-invalid");}
                else{$('#name').removeClass("is-invalid").addClass("is-valid");}

                if(typeof data.responseJSON['location']!="undefined"){$('#location').addClass("is-invalid");}
                else{$('#location').removeClass("is-invalid").addClass("is-valid");}

                if(typeof data.responseJSON['motorbike_id']!="undefined"){$('#select-motorbike').addClass("is-invalid");}
                else{$('#select-motorbike').removeClass("is-invalid").addClass("is-valid");}

                //clear all sucess or error alert

                $("#sucess-motorbike").empty().hide();
                $("#sucess-owner").empty().hide();
                $("#error-motorbike").empty().hide();
                $("#error-owner").empty();
                $("#error-owner").append(errors);
                $("#error-owner").show();
            }
		});
	});
});
</script>
	
	
