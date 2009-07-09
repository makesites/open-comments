

(function($) {

$(document).ready(function(){
	var options = loadConfig();
	$("#open-comments").loadComments(options);
});


$.fn.loadComments = function(options){
	$.ajax({
		url: options.script_dir, 
		data: ({ path: options.page_path}), 
		cache: false, 
		success: function(html){
			$("#open-comments").html(html);
		}
	});
};

function loadConfig(){

	// 1. the default extension of the web pages
	$ext = "html";
	// 2. find the controller script relative to the javascript file
	$script_dir = $("#open-comments-script").attr("src");
	$script_dir = $script_dir.substring(0, $script_dir.indexOf("/assets/"));
	$script_dir = $script_dir+"/app/controllers/oc_exec.php";
	// 3. get the path of the page
	$page_path = window.location.href.match(/^http:\/\/(.*?)\/(.*?)$/)[2];
	// an extra condition if the path ends with a slash
	$page_path += ($page_path.substr(-1) == "/") ? "index."+$ext : "";
	var options = {
		script_dir: $script_dir,
		page_path: $page_path
	};
	
	return options;

}

})(jQuery);