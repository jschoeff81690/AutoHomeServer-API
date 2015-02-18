var modal_count = 0;
var project_tabs = new Array("tasks","messages","teamplayers");
$( document ).ready(function() {
	add_modal('.addDevice',"Device","devices", base_url+"devices/form_view",base_url+"devices/ajax_add");
	
});


function add_modal(class_name, display_name, item_name, getLocation, postLocation) {
	$(class_name).on("click", function(event) {
		event.preventDefault();
		var link = $(this);

		ajax_get_html(getLocation)
		.done(function(data) {//if successfully retrieved form
			//alert($data);
			// appendModal("Device","device",data);
			appendModal(display_name,item_name, data);
			$('.'+item_name+'-submit').on("click", function(event) {
				event.preventDefault();
				id = link.attr('data-'+item_name);
				console.log(id);
				form_data = $('#'+id).serialize();
				console.log(form_data);
				var ajaxObj = ajax(postLocation, form_data);
				ajaxObj.success(function(data){
					console.log(data);
					var alert = '<div class="row"><div class="col-md-8 col-md-offset-2">';
					if(data.error) {
						alert += get_alert(data.message,"danger");
					}
					else {
						alert += get_alert(data.message,"success");
					}
					alert += '</div></div>';
					link.parent().parent().parent().after(alert);
				});
			});
		});


		// body = form_callback(item_name);
		// appendModal(display_name,item_name,body);
		// link = $(this);
		// $('.'+item_name+'-submit').on("click", function(event) {
		// 	event.preventDefault();
		// 	id = $(this).attr('data-'+item_name);
		// 	form_data = $('#'+id).serialize();
		// 	var ajaxObj = ajax(base_url+item_name+"/ajax_add", form_data);
		// 	ajaxObj.success(function(data){
		// 		console.log(data);
		// 		var alert = '<div class="row"><div class="col-md-8 col-md-offset-2">';
		// 		if(data.error) {
		// 			alert += get_alert(data.message,"danger");
		// 		}
		// 		else {
		// 			alert += get_alert(data.message,"success");
		// 		}
		// 		alert += '</div></div>';
		// 		link.parent().parent().parent().after(alert);
		// 	});
		// });
	});
}


function get_task_form(project_id) {
		return '<div class="row">'
	      +'<form id="task'+modal_count+'" class="form-horizontal col-md-12 create_task" role="form" method="POST">'
			+'<div class="form-group">'
			+'<label class="col-md-4 control-label" for="task_name">Task</label>'
			+'<div class="col-md-8"><input name="task_name" type="text" class="form-control" placeholder="theTask" required autofocus></div>'
			+'</div>'
			+'<div class="form-group">'
			+'<label class="col-md-4 control-label" for="task_details">Task Details</label>'
			+'<div class="col-md-8"><input name="task_details" type="text" class="form-control"placeholder="theDetails" required></div>'
			+'</div>'
			+'<div class="form-group">'
			+'<label class="control-label col-md-4" for="month">Due Date</label>'
			+'<div class="col-md-3">'
			+'<select class="form-control" name="month">'
			+'<option value="01">January</option>'
			+'<option value="02">February</option>'
			+'<option value="03">March</option>'
			+'<option value="04">April</option>'
			+'<option value="05">May</option>'
			+'<option value="06">June</option>'
			+'<option value="07">July</option>'
			+'<option value="08">August</option>'
			+'<option value="09">September</option>'
			+'<option value="10">October</option>'
			+'<option value="11">November</option>'
			+'<option value="12">December</option>'
			+'</select>'
			+'</div>'
			+'<div class="col-md-2">'
			+'<select class="form-control" name="day">'
			+'<option value="1">1</option>'
			+'<option value="2">2</option>'
			+'<option value="3">3</option>'
			+'<option value="4">4</option>'
			+'<option value="5">5</option>'
			+'<option value="6">6</option>'
			+'<option value="7">7</option>'
			+'<option value="8">8</option>'
			+'<option value="9">9</option>'
			+'<option value="10">10</option>'
			+'<option value="11">11</option>'
			+'<option value="12">12</option>'
			+'<option value="13">13</option>'
			+'<option value="14">14</option>'
			+'<option value="15">15</option>'
			+'<option value="16">16</option>'
			+'<option value="17">17</option>'
			+'<option value="18">18</option>'
			+'<option value="19">19</option>'
			+'<option value="20">20</option>'
			+'<option value="21">21</option>'
			+'<option value="22">22</option>'
			+'<option value="23">23</option>'
			+'<option value="24">24</option>'
			+'<option value="25">25</option>'
			+'<option value="26">26</option>'
			+'<option value="27">27</option>'
			+'<option value="28">28</option>'
			+'<option value="29">29</option>'
			+'<option value="30">30</option>'
			+'<option value="31">31</option>'
			+'</select>'
			+'</div>'
			+'<div class="col-md-3">'
			+'<select class="form-control" name="year">'
			+'<option value="2014">2014</option>'
			+'<option value="2015">2015</option>'
			+'<option value="2016">2016</option>'
			+'<option value="2017">2017</option>'
			+'<option value="2018">2018</option>'
			+'<option value="2019">2019</option>'
			+'<option value="2020">2020</option>'
			+'<option value="2021">2021</option>'
			+'<option value="2022">2022</option>'
			+'<option value="2023">2023</option>'
			+'<option value="2024">2024</option>'
			+'<option value="2025">2025</option>'
			+'</select>'
			+'</div>'
			+'</div>'
			+'<input type="hidden" value="'+project_id+'" name="project_id">'
			+'</form>'
	      +'</div>';
}

function get_message_form(project_id, user_id) {
	return '<div class="row">'
	      +'<form id="message'+modal_count+'" class="form-horizontal col-md-12 create_message" role="form" method="POST">'
			+'<div class="form-group">'
			+'<div class="col-md-12"><textarea rows="3" name="message" type="text" class="form-control" placeholder="theMessage" required autofocus></textarea></div>'
			+'</div>'
			+'<input type="hidden" value="'+project_id+'" name="project_id">'
			+'<input type="hidden" value="'+user_id+'" name="user_id">'
			+'</form>'
	      +'</div>';
}