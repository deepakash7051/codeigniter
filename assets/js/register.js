$('#_register').on('click', function (e) {
	e.preventDefault();
	var data = $("#regForm").serialize();
	var url = $("#regForm").attr('action');
	$.ajax({
		url:url,
		data:data,
		method:"post",
		dataType:'json',
		success:function(html){
			if(html.error == true){
				alert_danger(html.message);
			}else if(html.error == false){
				alert_success(html.message);
			}
		}
	});
});
