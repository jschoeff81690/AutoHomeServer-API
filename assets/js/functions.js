function appendModal(display_name, item_name, body) {
	modal = '<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal'+modal_count+'">'  
	  +'<div class="modal-dialog">'
	    +'<div class="modal-content">'
	      +'<div class="modal-header">'
	        +'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
	        +'<h4 class="modal-title">Create a New '+display_name+'</h4>'
	      +'</div>'
	      +'<div class="modal-body">'
	      +body
	      +'</div>'
	      +'<div class="modal-footer">'
	        +'<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>'
	        +'<button type="button" data-dismiss="modal" class="btn btn-primary '+item_name+'-submit" data-'+item_name+'="'+item_name+modal_count+'">Add'+display_name+'</button>'
	      +'</div>'
	    +'</div><!-- /.modal-content -->'
	  +'</div><!-- /.modal-dialog -->'
	+'</div><!-- /.modal -->';

	$('body').append(modal);

	$('#myModal'+modal_count).modal('show');
	modal_count++;
}

function get_alert(content, type) {
	return '<div class="alert alert-'+type+' alert-dismissable">'
		+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
		+content
		+'</div>';

}
function ajax_get_html(location) {
	return $.get( location, function() {
	  console.log( "success" );
	})
	  .fail(function() {
	    console.log( "error" );
	  });
}
function ajax(location, post_data) {
	var tmp = post_data;
	if(typeof tmp === 'object') {
		if(typeof tmp[0] === 'object') {
			var input = {};
			input.name = "ajax";
			input.value = true;
			post_data.push(input);
		}
		else post_data.ajax = true;
	}
	return $.post(location, post_data, function(response) {
		return true;
	},
	"json");
}
function set_response(data){
	AJAX_RESPONSE = data;
	out(AJAX_RESPONSE);
}

function out(data){
	console.log(data);
}