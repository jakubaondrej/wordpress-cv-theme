var $ = jQuery;
var js_url_action = endpoint;
$("").change(function() {
    var $("")
    
    var form = $("#jakuba_skill_set_type_update").serialize();
  
  
    $.ajax({
        type:'POST',
        data: form,
        dataType : "json",
        url:js_url_action,

        success: function(res){
            $("#sending_driven_test").hide();
            test_content.innerHTML = res.data.html
            $(test_content).fadeIn(500);
        },
        error: function(err){
            $("#sending_driven_test").hide();
            $("#warning_message").html(err);
            $("#warning_message").show();
        },
    })
});
