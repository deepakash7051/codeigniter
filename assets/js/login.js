$("#_login").click(function(e){
	e.preventDefault();
	var url = $("#loginForm").attr("action");
	var data = $("#loginForm").serialize();	
	$.ajax({
		url:url,
		data:data,
		method:"post",
		dataType:'json',
		success:function(html){
			if(html.error == true){
				alert_danger(html.message)
			}else if(html.error == false){
				alert_success(html.message);
			}
		}
	});
});