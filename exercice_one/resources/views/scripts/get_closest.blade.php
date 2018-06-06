<script>
$("#get-closest").click(function(){
    $.get("{{route('get-closest')}}", function(data, status){
        
        $("#closest-alert").show();
        $("#closest-owner").html(data[0] +" is the closest owner.</br> Distance: "+data[1].toFixed(3)+" miles away.");
    });
}); 	

</script>