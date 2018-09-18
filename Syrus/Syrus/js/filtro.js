
$('#startdatetime-from').datetimepicker({
language: 'en',
format: 'yyyy-MM-dd hh:mm'
}); 
$(function(){  
	$("#from_date").datetimepicker();  
	$("#to_date").datetimepicker();  
	});  
$('#filter').click(function(){  
	var from_date = $('#from_date').val();  
	var to_date = $('#to_date').val(); 
	var comparacion = (from_date > to_date); 
		console 
		if(comparacion)  
		{  
			alert("Seleccione una fecha válida");
		}  
		else if (from_date != '' && to_date != '') {
			$.ajax({  
				url:"../php/filter.php",  
			    method:"POST",  
			    data:{from_date:from_date, to_date:to_date},  
			    success:function(data)  
			    {  
			    	$('#order_table').html(data);  
			    }  
		});
		}else 
			{  
				alert("Seleccione una fecha");  
			}  
	});  
;  
