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

	var canvas = new fabric.Canvas('c');
	fabric.Image.fromURL('img/card_water.png', function(img) {
		img.set({
			left: 0,
			top: 0,
		});
		canvas.add(img);

		fabric.Image.fromURL('img/mon/eevee.png', function(img2) {
			img2.set({
				top: 18,
				left: 20,
			});
			canvas.add(img2);
			var text = new fabric.Text('name', {
				id: "nm",
			    fontSize: 10,
			    top: 1,
			    left: 12,
			    fontFamily: 'cursive',
			});
			canvas.add(text);
			var text1 = new fabric.Text('1', {
				id: "lv",
			    fontSize: 16,
			    top: 59,
			    left: 81,
			    fontFamily: 'cursive',
			});
			canvas.add(text1);
			var text2 = new fabric.Text('100', {
				id: "hp",
			    fontSize: 14,
			    top: 82,
			    left: 18,
			    fontFamily: 'cursive',
			});
			canvas.add(text2);
			var text3 = new fabric.Text('100', {
				id: "dm",
			    fontSize: 14,
			    top: 83,
			    left: 60,
			    fontFamily: 'cursive',
			});
			canvas.add(text3);
			var text4 = new fabric.Text('-skill 1', {
				id: "sk1",
			    fontSize: 9,
			    top: 108,
			    left: 16,
			    fontFamily: 'cursive',
			});
			canvas.add(text4);
		});
	});

})
function saveSkill () {
	sdata = {
		sname: $("#sname").val(),
		svalue: $("#svalue").val(),
		smana: $("#smana").val(),
		smon: $("#smon").val(),
		stype: $("#stype").val()
	};

	$.post("saveskill.php", {data: JSON.stringify(sdata)}, function(rp){
		console.log(rp);
	})
}