$( document ).ready(function() {
    $("#login_submit").click(function(){
		$.ajax({
		    url: 'api/user',
		    type: 'POST',
		    data: {data: 'test', data2: 'test2'},
		    success: function(result) {
		        alert(result);
		        if(result=='OK'){
		        	document.location.href="home"
		        }
		    },
		    error: function(result) {
		        alert('mince');
		    }
		});
	});
});
