$(document).ready(function(){

	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		//alert(current_pwd);
		$.ajax({
			type:'post',
			url: '/admin/check-current-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				//alert(resp);
				if(resp=="false"){
					$("#chkCurrentpwd").html("<font color=red> Contraseña actual incorrecta</font>");
				}else if(resp=="true"){
					$("#chkCurrentpwd").html("<font color=green> Contraseña actual correcta</font>");
				}
			},error:function(){
				alert("Error");
			}
		});
	});

	$(".updateSectionStatus").click(function(){
		var status = $(this).text();
		var section_id = $(this).attr("section_id");
		$.ajax({
			type:'post',
			url:'/admin/update-section-status',
			data:{status:status,section_id:section_id},
			success:function(resp){
				if(resp['status']==0){
					$("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Inactivo</a>");
				}else if(resp['status']==1){
					$("#section-"+section_id).html("<a class='updateSectionStatus' href='javascript:void(0)'>Activo</a>")
				}
			},error:function(){
				alert("Error");
			}
		});
	});

		$(".updateCategoryStatus").click(function(){
		var status = $(this).text();
		var category_id = $(this).attr("category_id");
		$.ajax({
			type:'post',
			url:'/admin/update-category-status',
			data:{status:status,category_id:category_id},
			success:function(resp){
				if(resp['status']==0){
					$("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Inactivo</a>");
				}else if(resp['status']==1){
					$("#category-"+category_id).html("<a class='updateCategoryStatus' href='javascript:void(0)'>Activo</a>")
				}
			},error:function(){
				alert("Error");
			}
		});
	});

		$("#section_ids").change(function(){
			var section_ids = $(this).val();
			alert(section_ids);
			/*$.ajax({
				type:'post',
				url:'/admin/append-categories-level',
				data:{section_id:section_id},
				success:function(resp){
					$("#appendCategoriesLevel").html(resp);
				},error:function(){
					alert("Error");
				}
			});*/
		});


		$(".updateMonitorStatus").click(function(){
		var status = $(this).text();
		var monitor_id = $(this).attr("monitor_id");
		$.ajax({
			type:'post',
			url:'/admin/update-monitor-status',
			data:{status:status,monitor_id:monitor_id},
			success:function(resp){
				if(resp['status']==0){
					$("#monitor-"+monitor_id).html("<a class='updateMonitorStatus' href='javascript:void(0)'>Inactivo</a>");
				}else if(resp['status']==1){
					$("#monitor-"+monitor_id).html("<a class='updateMonitorStatus' href='javascript:void(0)'>Activo</a>")
				}
			},error:function(){
				alert("Error");
			}
		});
	});
});


