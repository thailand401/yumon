Type = ["metal","plant","water","fire","earth","insect","mistery","air"];
$(document).ready(function(){

	for (var i = 0; i < parseInt(Mon.length/2); i++) {
		$("#mon1 .inside").append('<img data="'+i+'" class="'+Mon[i].type+'" src="img/mon/'+Mon[i].resource+'" original-title="<p>Name: '+Mon[i].name+'</p> <p>Class: '+Type[Mon[i].type]+'</p>" />');
	};
	for (var i = parseInt(Mon.length/2); i < Mon.length; i++) {
		$("#mon2 .inside").append('<img data="'+i+'" class="'+Mon[i].type+'" src="img/mon/'+Mon[i].resource+'" original-title="<p>Name: '+Mon[i].name+'</p> <p>Class: '+Type[Mon[i].type]+'</p>" />');
	};

	$("#card").change(function(){
		$("#mon1 .inside img").hide();
		$("#mon1 .inside img."+$(this).val()).show();

		$("#mon2 .inside img").hide();
		$("#mon2 .inside img."+$(this).val()).show();
	})
	$(".mon img").click(function(){
		i = parseInt($(this).attr("data"));
		$(".rsmon").attr("src", "img/mon/"+Mon[i].resource);
		$(".nm").html(Mon[i].name);
	})
	$(".mon img").tipsy({gravity: 'n', html: true});
})