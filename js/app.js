Type = ["metal","plant","water","fire","earth","insect","mistery","air"];
var canvas, cardRef, monRef, nmRef, lvRef, hpRef, dmRef, sk1Ref, sk2Ref, sk3Ref;
$(document).ready(function(){

	for (var i = 0; i < parseInt(Mon.length/2); i++) {
		$("#mon1 .inside").append('<img data="'+i+'" class="'+Mon[i].type+'" src="img/mon/'+Mon[i].resource+'" original-title="<p>Name: '+Mon[i].name+'</p> <p>Class: '+Type[Mon[i].type]+'</p>" />');
	};
	for (var i = parseInt(Mon.length/2); i < Mon.length; i++) {
		$("#mon2 .inside").append('<img data="'+i+'" class="'+Mon[i].type+'" src="img/mon/'+Mon[i].resource+'" original-title="<p>Name: '+Mon[i].name+'</p> <p>Class: '+Type[Mon[i].type]+'</p>" />');
	};

	$("#card").change(function(){
		if($(this).val()==-1){
			$("#mon1 .inside img").show();
			$("#mon2 .inside img").show();
			return;
		}
		for (var i = 0; i < Class.length; i++) {
			if(Class[i].type == $(this).val())
			{
				cardRef._element.src = "img/"+Class[i].resource;
				canvas.renderAll();
				canvas.renderAll();
			}
		};
		

		$("#mon1 .inside img").hide();
		$("#mon1 .inside img."+$(this).val()).show();

		$("#mon2 .inside img").hide();
		$("#mon2 .inside img."+$(this).val()).show();
	})
	$(".mon img").click(function(){
		i = parseInt($(this).attr("data"));
		nmRef.text = Mon[i].name;
		monRef._element.src = "img/mon/"+Mon[i].resource;
		canvas.renderAll();
		canvas.renderAll();
	})
	$(".mon img").tipsy({gravity: 'n', html: true});

	canvas = new fabric.Canvas('c');
	fabric.Image.fromURL('img/card_water.png', function(img) {
		img.set({
			left: 0,
			top: 0,
		});
		cardRef = img;
		canvas.add(img);

		fabric.Image.fromURL('img/mon/eevee.png', function(img2) {

			img2.set({
				top: 18,
				left: 20,
			});
			monRef = img2;
			canvas.add(img2);
			var text = new fabric.Text('name', {
				id: "nm",
			    fontSize: 10,
			    top: 3,
			    left: 12,
			    fontFamily: 'cursive',
			});
			nmRef = text;
			canvas.add(text);
			var text1 = new fabric.Text('1', {
				id: "lv",
			    fontSize: 14,
			    top: 62,
			    left: 81,
			    fontFamily: 'cursive',
			});
			lvRef = text1;
			//canvas.add(text1);
			var text2 = new fabric.Text('100', {
				id: "hp",
			    fontSize: 14,
			    top: 82,
			    left: 25,
			    fontFamily: 'cursive',
			});
			hpRef = text2;
			//canvas.add(text2);
			var text3 = new fabric.Text('100', {
				id: "dm",
			    fontSize: 14,
			    top: 83,
			    left: 60,
			    fontFamily: 'cursive',
			});
			dmRef = text3;
			//canvas.add(text3);
			var text4 = new fabric.Text('-skill 1', {
				id: "sk1",
				textAlign: 'left',
			    fontSize: 10,
			    top: 110,
			    left: 10,
			    fontFamily: 'cursive',
			});
			sk1Ref = text4;
			//canvas.add(text4);

			var text5 = new fabric.Text('-skill 2', {
				id: "sk2",
				textAlign: 'left',
			    fontSize: 10,
			    top: 124,
			    left: 10,
			    fontFamily: 'cursive',
			});
			sk2Ref = text5;
			//canvas.add(text5);
		});
	});
	
	$("#listskill1").append('<option value="-1">None</option>');
	$("#listskill2").append('<option value="-1">None</option>');
	for (var i = 0; i < Skills.length; i++) {
		Skills[i]["id"] = Inc[0];
		$("#listskill").append('<option value="'+i+'">'+Skills[i].sname+'</option>');
		$("#listskill1").append('<option value="'+i+'">'+Skills[i].sname+'</option>');
		$("#listskill2").append('<option value="'+i+'">'+Skills[i].sname+'</option>');
	};
	$("#listskill").change(function(){
		showSkill();
	})
})
function saveSkill () {
	if($("#sname").val()=="") return;
	sdata = {
		sname: $("#sname").val(),
		svalue: $("#svalue").val(),
		smana: $("#smana").val(),
		smon: $("#smon").val(),
		stype: $("#stype").val()
	};
	Skills.push(sdata);
	$.post("saveskill.php", {data: JSON.stringify(Skills)}, function(rp){
		alert(rp);
		$("#sname").val("");
		$("#svalue").val("");
		$("#smana").val("");
		$("#smon").val("");
		$("#stype").val("");
	})
}
function deleteSkill(){
	ind = parseInt($('#listskill').val());
	Skills.splice(ind, 1);
	$.post("saveskill.php", {data: JSON.stringify(Skills)}, function(rp){
		alert(rp);
		$("#listskill").html("");
		for (var i = 0; i < Skills.length; i++) {
			$("#listskill").append('<option value="'+i+'">'+Skills[i].sname+'</option>');
		};
	})
}
var editskill = -1;
function showSkill(){
	var ind = parseInt($('#listskill').val());
	editskill = ind;
	$("#sname").val(Skills[ind].sname);
	$("#svalue").val(Skills[ind].svalue);
	$("#smana").val(Skills[ind].smana);
	$("#smon").val(Skills[ind].smon);
	$("#stype").val(Skills[ind].stype);
}
function editSkill(){
	sdata = {
		sname: $("#sname").val(),
		svalue: $("#svalue").val(),
		smana: $("#smana").val(),
		smon: $("#smon").val(),
		stype: $("#stype").val()
	};
	Skills[editskill] = sdata;
	$.post("saveskill.php", {data: JSON.stringify(Skills)}, function(rp){
		alert(rp);
		$("#sname").val("");
		$("#svalue").val("");
		$("#smana").val("");
		$("#smon").val("");
		$("#stype").val("");
	})
}
function addMon(){
	$("#smon").val( $("#smon").val() + $('#ssmon').val()+"," );
}
function applyMon(){
	if($("#sethp").val().length==2)
		hpRef.left = 25;
	else
		hpRef.left = 18;
	hpRef.text = $("#sethp").val();
	dmRef.text = $("#setdame").val();
	sk1Ref.text = $("#listskill1 option:selected").text();
	sk2Ref.text = $("#listskill2 option:selected").text();
	canvas.renderAll();
	canvas.renderAll();
}
function saveMon(){
	card = canvas.toDataURL("png");
	tmpCard = {
		hp: $("#sethp").val(),
		dm: $("#setdame").val(),
		mn: $("#setmana").val(),
		sk1: $("#listskill1 option:selected").text(),
		sk2: $("#listskill2 option:selected").text(),
	}
}
//Mon have healthy and decrease after battle
//Yan for Trainer / Yin for Yumon
//Mon increase Exp if lose or win