var modal_count = 0;
var this_block_count = 1;
var that_block_count = 1;
var selected_monitor_id = 0;
var selected_actor_id = 0;

$(document).ready(function() {
    init_color_pickers();
    init_flat_form_items();
    recipe_modals();

    add_modal('.addDevice', "Device", "devices", base_url + "devices/form_view", base_url + "devices/ajax_add");
    $('.action-form').change(function() {
        $(this).submit();
    });
});

function recipe_modals() {
    //forms for recipes
    add_modal_callback('.getThisBlock', "If This Happens Block", "this_block", base_url + "recipes/this_form_view", base_url + "recipes/this_ajax_get", get_this_block_callback);
    add_modal_callback('.getThatBlock', "If That Happens Block", "that_block", base_url + "recipes/that_form_view", base_url + "recipes/that_ajax_get", get_that_block_callback);

    add_modal_callback('.addThisBlock', "If This Happens Block", "this_block", base_url + "recipes/this_form_view", base_url + "recipes/this_ajax_add", this_block_callback);
    add_modal_callback('.addThatBlock', "If That Happens Block", "that_block", base_url + "recipes/that_form_view", base_url + "recipes/that_ajax_add", that_block_callback);
    add_modal('.addRecipe', "New Recipe", "add_recipe", base_url + "recipes/add_recipe_form_view", base_url + "recipes/ajax_add");
    //containers for this and that blocks
    $('.thatBlockContainer').on("click", function(event) {
        event.preventDefault();
        var link = $(this).attr("href");
        if (link != "#") {
            ajax_get_html(link)
                .done(get_that_block_container_callback);
        }
        $('#that_block_container_modal').modal('show');
    });
    $('.thisBlockContainer').on("click", function(event) {
        event.preventDefault();
        var link = $(this).attr("href");
        if (link != "#") {
            ajax_get_html(link)
                .done(get_this_block_container_callback);
        }
        $('#this_block_container_modal').modal('show');
    });

}

function init_flat_form_items() {

    $("select").selectpicker({
        style: 'btn-hg btn-primary',
        menuStyle: 'dropdown-inverse'
    });
    $("input[data-toggle='checkbox']").checkbox();


}


function init_color_pickers() {

    //colorpicker for Devices	
    var $box1 = $('#colorPicker');
    $box1.tinycolorpicker();
    var picker1 = $box1.data("plugin_tinycolorpicker");
    $box1.bind("change", function() {

        var red, green, blue;
        var rgb = picker1.colorRGB;
        var length = rgb.length;
        rgb = rgb.substring(4, length - 1);
        rgb = rgb.split(',');
        r = parseInt(rgb[0]);
        g = parseInt(rgb[1]);
        b = parseInt(rgb[2]);
        color = {
            red: r,
            green: g,
            blue: b
        };
        color = JSON.stringify(color);
        console.log(color);

        $('#color-picker-set').attr('value', color);
    });


    //colorpicker foir the dashboard
    var $box = $('#colorPicker2');
    $box.tinycolorpicker();
    var picker = $box.data("plugin_tinycolorpicker");
    $box.bind("change", function() {

        var red, green, blue;
        var rgb = picker.colorRGB;
        var length = rgb.length;
        rgb = rgb.substring(4, length - 1);
        rgb = rgb.split(',');
        r = parseInt(rgb[0]);
        g = parseInt(rgb[1]);
        b = parseInt(rgb[2]);
        color = {
            red: r,
            green: g,
            blue: b
        };
        color = JSON.stringify(color);
        console.log(color);

        $('#color-picker-set').attr('value', color);
    });

}



function add_modal_callback(class_name, display_name, item_name, getLocation, postLocation, callback) {
    $(class_name).on("click", function(event) {
        event.preventDefault();
        var link = $(this);
        var form_count = modal_count;
        ajax_get_html(getLocation + "/" + modal_count)
            .done(function(data) { //if successfully retrieved form
                // appendModal("Device","device",data);
                appendModal(display_name, item_name, data);

                $("input[data-toggle='checkbox']").checkbox();
                $("select").selectpicker({
                    style: 'btn-hg btn-primary',
                    menuStyle: 'dropdown-inverse'
                });
                //handle the actors in this block form
                $('#actor-select-' + form_count).change(function(event) {
                    $('#actor-action-' + form_count + '-' + selected_actor_id).addClass('hidden');
                    selected_actor_id = $('#actor-select-' + form_count + " option:selected").attr('value');
                    console.log(selected_actor_id);
                    console.log($('#actor-action-' + form_count + '-' + selected_actor_id));
                    $('#actor-action-' + form_count + '-' + selected_actor_id).removeClass('hidden');
                });
                //handle the monitors in this block form
                $('#monitor-select-' + form_count).change(function(event) {
                    $('#monitor-condition-' + form_count + '-' + selected_monitor_id).addClass('hidden');
                    $('#monitor-value-' + form_count + '-' + selected_monitor_id).addClass('hidden');
                    selected_monitor_id = $('#monitor-select-' + form_count + " option:selected").attr('value');
                    console.log(selected_monitor_id);
                    console.log($('#monitor-condition-' + form_count + '-' + selected_monitor_id));
                    $('#monitor-condition-' + form_count + '-' + selected_monitor_id).removeClass('hidden');
                    $('#monitor-value-' + form_count + '-' + selected_monitor_id).removeClass('hidden');
                });
                $('.' + item_name + '-submit').on("click", function(event) {
                    event.preventDefault();
                    id = $(this).attr('data-' + item_name);
                    $('#' + id + ' .hidden').remove();
                    form_data = $('#' + id).serialize();
                    console.log(form_data);
                    var ajaxObj = ajax(postLocation + "/" + modal_count, form_data);
                    ajaxObj.done(callback);
                });
            });
    });
}

function add_modal(class_name, display_name, item_name, getLocation, postLocation) {
    $(class_name).on("click", function(event) {
        event.preventDefault();
        var link = $(this);

        ajax_get_html(getLocation + "/" + modal_count)
            .done(function(data) { //if successfully retrieved form
                // appendModal("Device","device",data);
                appendModal(display_name, item_name, data);

                $("input[data-toggle='checkbox']").checkbox();
                $("select").selectpicker({
                    style: 'btn-hg btn-primary',
                    menuStyle: 'dropdown-inverse'
                });
                $('.' + item_name + '-submit').on("click", function(event) {
                    event.preventDefault();
                    id = $(this).attr('data-' + item_name);
                    form_data = $('#' + id).serialize();
                    console.log(postLocation);
                    console.log(form_data);
                    var ajaxObj = ajax(postLocation, form_data);
                    ajaxObj.done(function(data) {
                        console.log(data);
                        response = JSON.parse(data);
                        console.log(JSON.parse(data));
                        console.log(response.object);
                        console.log(response.success);
                        var alert = '<div class="row"><div class="col-md-8 col-md-offset-2">';
                        if (!response.success) {
                            alert += get_alert(response.message, "danger");
                        } else {
                            alert += get_alert(response.message, "success");
                        }
                        alert += '</div></div>';
                        $('#main-content .wrapper').prepend(alert);
                    });
                });
            });
    });
}
