var latlngs = [];
var polvector=[];
var map = L.map('map', {
  'center': [11.01963, -74.85163],
  'zoom': 12,
  'layers': [
    L.tileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
      'attribution': 'Map data &copy; OpenStreetMap contributors'
    })
  ]
});

var realtime = L.realtime({
        url: 'js/geo.json',
        crossOrigin: true,
        type: 'json'
    }, {
        interval: 3 * 1000
    }).addTo(map);


$('#startdatetime-from').datetimepicker({
language: 'en',
format: 'yyyy-MM-dd hh:mm'
});
$(function(){  
	$("#from_date").datetimepicker();  
	$("#to_date").datetimepicker();  
	});  
function consultH(){  

	var from_date = $('#from_date').val();  
	var to_date = $('#to_date').val(); 
	var comparacion = (from_date > to_date); 
		if(comparacion)  
		{  
			alert("Seleccione una fecha válida");
		}  
		else if (from_date != '' && to_date != '') {
			$.ajax({  
				url:"php/filter.php",  
			    method:"POST",  
			    data:{from_date:from_date, to_date:to_date, opcion:0},  
			    success:function(data)  
			    {  
			    	$('#order_table').html(data);  
			    }
			});

			$.ajax({  
				url:"php/filter.php",  
			    method:"POST",  
			    data:{from_date:from_date, to_date:to_date, opcion:1},  
			    success:function(data)  
			    {  
							
							var dat=JSON.parse(data);
							var cont=0;
							var len=dat.length;

							while(cont<len){
								polvector.push ([parseFloat(dat[cont]["latitud"]),parseFloat(dat[cont]["longitud"])]);
								var polyline1 = L.polyline(polvector, {color: 'red',weight: 1, smoothFactor: 1}).addTo(map);
								cont ++;
							}

			    			
			    }
			});

		}else 
			{  
				alert("Seleccione una fecha");  
			}  
	};  

realtime.on('update', function() {
		var fecha = document.getElementById("FechaV");
	  	var latitud = document.getElementById("LatitudV");
		var longitud = document.getElementById("LongitudV");
		
		$.post("js/consulta.php"),
		$.post("php/consulta.php",
		    {
		        id: 1
		    },
		function(data1, status){
		    	console.log(data1);
		    	if (data1!="") {
		    		fecha.value = data1;
		    	}
		        
		});
    	$.post("php/consulta.php",
	    {
	        id: 2
	    },
	    function(data2, status){
	    	console.log(data2);
	    	if (data2!="") {
	    		latitud.value = data2;
	    	}
	    });
	    $.post("php/consulta.php",
	    {
	        id: 3
	    },
	    function(data3, status){
	    	console.log(data3);
	    	if (data3!="") {
	    		longitud.value = data3;
	    	}
	    });
	map.panTo(new L.LatLng(latitud.value,longitud.value));
	latlngs.push ([parseFloat(latitud.value),parseFloat(longitud.value)]);
	var polyline = L.polyline(latlngs, {color: 'blue',weight: 1, smoothFactor: 1}).addTo(map);
});


