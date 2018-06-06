<script>

$(document).ready(function(){
	
    $('#motorbike-btn').click(function(e){
        e.preventDefault();
        var brand = $('#brand').val();
        var token = $('[name="_token"]').val();
        var colour = $('#colour').val();
        var model_year = $('#model_year').val();
        

        $.ajax({
    		dataType: 'json',
    		type:'POST',
    		url: '{{url("/create-motorbike")}}',
    		data: { 

    			'brand' : brand,
    			'_token' : token,
    			'colour' : colour,
    			'model_year' : model_year 
    		},

    		success: function(data) {
                
                var motorbike_id=data.motorbike_id;
                var brand = $('#brand').val();
                var colour = $('#colour').val();
                var model_year = $('#model_year').val();

                //add the motorbike datas to the motorbike table
                $("#new-motorbike-tr").append("<tr><td>"+brand+"</td><td>"+colour+"</td><td>"+model_year+" </td></tr>");
                
                //Show success message

                $("#sucess-owner").empty().hide();
                $("#sucess-motorbike").empty().hide();

                $("#error-motorbike").empty().hide();
                $("#error-owner").empty().hide();

                $("#brand").removeClass('is-invalid');
                $("#colour").removeClass("is-invalid");
                $("#model_year").removeClass("is-invalid");

                $("#sucess-motorbike").append("Motorbike sucessfully added");
                $("#sucess-motorbike").show();

                //reset form's input value
                $('#motorbike-form').trigger('reset');

                //add the id of the motorbike to the owner formselect field 
                $('#select-motorbike').append('<option value="'+motorbike_id+'">'+brand+ ' '+colour+' Year '+model_year+'</option>');
               
          	},
          	error: function (data) {
                
                //get the error and put them in the errors string 

                var errors = "<ul>";

                for (error in data.responseJSON) {
                    errors += "<li>"+data.responseJSON[error] + "</li>" ;
                }
                errors +="</ul>";

                //Trigger is-valid or is-invalid on each input
                if(typeof data.responseJSON['brand']!="undefined"){$('#brand').addClass("is-invalid");}
                else{$('#brand').removeClass("is-invalid").addClass("is-valid");}

                if(typeof data.responseJSON['colour']!="undefined"){$('#colour').addClass("is-invalid");}
                else{$('#colour').removeClass("is-invalid").addClass("is-valid");}

                if(typeof data.responseJSON['model_year']!="undefined"){$('#model_year').addClass("is-invalid");}
                else{$('#model_year').removeClass("is-invalid").addClass("is-valid");}


                //show erros message

                $("#sucess-motorbike").empty().hide();
                $("#sucess-owner").empty().hide();
                $("#error-owner").empty().hide();
                $("#error-motorbike").empty();

                //display the error alertwith the errors
                $("#error-motorbike").append(errors);
                $("#error-motorbike").show();
            }
		});
	});
});
</script>