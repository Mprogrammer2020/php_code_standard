$(document).ready(function(){


  $(document).on('change', '.page-limit', function(e){
       	var limit = $(this).val();       
       	url = updateURLQueryString('limit',limit);  
       	window.location.href= url;      
    });
  function updateURLQueryString(param,value) {
    	var url = document.location.href;
	    if(document.location.href.indexOf("?") >= 0) {
	    	if(document.location.href.indexOf(param) >= 0) {	
				url = new URL(document.location.href);
				url.searchParams.set(param, value); 			
				url = url.href;	
			} else {
	    		url = document.location.href+"&"+param+"="+ value;
			}
	    }else{
	        url = document.location.href+"?"+param+"="+ value;
	    }

       return url;
    }
    $(document).on('keyup', '.search_table', function(){
		setTimeout(function(){
			var keyword = $('.search_table').val();
			if(keyword.length >= 2 || keyword.length == 0) {
				var url = returnURLQueryString("search", keyword);
				
				$.ajax({
					type : 'get',
					url: url,
					data: {},
				}).done(function(response) {
				  	$(".main-content").html(response);
				}).fail(function() {
				    swal( "Something went wrong!" );
				});
			}
		},1000);
	});
	 function returnURLQueryString(param,value) {
    	var url = document.location.href;
    	if(document.location.href.indexOf("?") >= 0) {
	    	if(document.location.href.indexOf(param) >= 0) {	
				url = new URL(document.location.href);
				url.searchParams.set(param, value); 			
				url = url.href;	
			} else {
	    		url = document.location.href+"&"+param+"="+ value;
			}
	    }else{
	        url = document.location.href+"?"+param+"="+ value;
	    }

       return url;

    } 

    $(document).on('click', ".delete-item", function() {
		var delete_url = $(this).data('delete-url');
		var delete_title = $(this).data('delete-title');
		var success_title = $(this).data('success-title');

		swal({
			title: "Are you sure?",
			text: delete_title,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				deleteTableData(delete_url, success_title)
			} 
		});
	});
	
	function deleteTableData(delete_url,success_title) {
		$.ajax({
				type : 'GET',
				url: delete_url,
				data: {},
				dataType: "JSON",
			}).done(function(response) {	
				if(response.status == true) {
					swal(success_title, {
						icon: "success",
					});
					setTimeout(function() {
						window.location.reload(true);	    
					},2000);
			    } else {
			    	swal(response.message, {
			    		icon: "warning"
			    	});
			    }

			}).fail(function() {
			    swal( "Something went wrong!" );
			});
	}
});