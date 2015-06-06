<!DOCTYPE html>
<html>

<head>
	<title>Tool create objects</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/fabric.js"></script>
	<script type="text/javascript" src="js/jquery.tooltip.js"></script>
	<script type="text/javascript" src="js/cards.js"></script>
	<script type="text/javascript" src="js/skills.js"></script>
	<script type="text/javascript" src="js/yumon.js"></script>

	<style type="text/css">
		p{
			margin: 2px 0;
			padding: 2px;
		}
		.FL{
			float: left;
		}
		.mon{
			width: 650px;
			height: 65px;
			overflow: auto;
		}
		.mon .inside{
			width: 1500px;
		}
		.mon img{
			float: left;
			border: 1px solid #999;
		}
		.tipsy { font-size: 12px; position: absolute; padding: 5px; z-index: 100000; }
		  .tipsy-inner { background-color: #000; color: #FFF; max-width: 200px; padding: 5px 8px 4px 8px; text-align: center; }

		  /* Rounded corners */
		  .tipsy-inner { border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; }
		  
		  /* Uncomment for shadow */
		  /*.tipsy-inner { box-shadow: 0 0 5px #000000; -webkit-box-shadow: 0 0 5px #000000; -moz-box-shadow: 0 0 5px #000000; }*/
		  
		  .tipsy-arrow { position: absolute; width: 0; height: 0; line-height: 0; border: 5px dashed #000; }
		  
		  /* Rules to colour arrows */
		  .tipsy-arrow-n { border-bottom-color: #000; }
		  .tipsy-arrow-s { border-top-color: #000; }
		  .tipsy-arrow-e { border-left-color: #000; }
		  .tipsy-arrow-w { border-right-color: #000; }
		  
			.tipsy-n .tipsy-arrow { top: 0px; left: 50%; margin-left: -5px; border-bottom-style: solid; border-top: none; border-left-color: transparent; border-right-color: transparent; }
		    .tipsy-nw .tipsy-arrow { top: 0; left: 10px; border-bottom-style: solid; border-top: none; border-left-color: transparent; border-right-color: transparent;}
		    .tipsy-ne .tipsy-arrow { top: 0; right: 10px; border-bottom-style: solid; border-top: none;  border-left-color: transparent; border-right-color: transparent;}
		  .tipsy-s .tipsy-arrow { bottom: 0; left: 50%; margin-left: -5px; border-top-style: solid; border-bottom: none;  border-left-color: transparent; border-right-color: transparent; }
		    .tipsy-sw .tipsy-arrow { bottom: 0; left: 10px; border-top-style: solid; border-bottom: none;  border-left-color: transparent; border-right-color: transparent; }
		    .tipsy-se .tipsy-arrow { bottom: 0; right: 10px; border-top-style: solid; border-bottom: none; border-left-color: transparent; border-right-color: transparent; }
		  .tipsy-e .tipsy-arrow { right: 0; top: 50%; margin-top: -5px; border-left-style: solid; border-right: none; border-top-color: transparent; border-bottom-color: transparent; }
		  .tipsy-w .tipsy-arrow { left: 0; top: 50%; margin-top: -5px; border-right-style: solid; border-left: none; border-top-color: transparent; border-bottom-color: transparent; }
	
		#yumon{
			position: relative;
			top: 10px;
			left: 0px;
			width: 120px;
			height: 150px;
			border: 1px solid #aaa;
		}
		.rscard{
			position: absolute;
			top: 0px;
			left: 0px;
		}
		.rsmon{
			position: absolute;
			top: 18px;
			left: 20px;
		}
		.txt{
			position: absolute;
  			font-family: cursive;
		}
		.nm{
			top: 2px;
			left: 12px;
			font-size: 10px;
		}
		.lv{
			top: 59px;
			left: 81px;
		}
		.hp{
			top: 82px;
			left: 18px;
			font-size: 14px;
		}
		.dm{
			top: 83px;
			left: 60px;
			font-size: 14px;
		}
		.sk1{
			top: 108px;
			left: 16px;
			font-size: 9px;
		}
		.sk2{
			top: 118px;
			left: 16px;
			font-size: 9px;
		}
		.sk3{
			top: 128px;
			left: 16px;
			font-size: 9px;
		}
		.skill{
			margin-top: 10px;
		}
		#control{

		}
	</style>
	<script type="text/javascript">
	var Skills = <?php echo file_get_contents(getcwd()."/data/skill.json"); ?>;
	</script>
</head>

<body>
<div style="width:50%;">
	<select id="card" class="button FL">
		<option value="0">Metal</option>
		<option value="1">Plant</option>
		<option value="2">Water</option>
		<option value="3">Fire</option>
		<option value="4">Earth</option>
		<option value="5">Insect</option>
		<option value="6">Mistery</option>
		<option value="7">Air</option>
		<option value="8">Mistery</option>
		<option value="9">Air</option>
		<option value="10">Mistery</option>
		<option value="11">Air</option>
	</select>
	<button class="button FL" onclick="addCard();">Add Card</button><br><br>
	<!--div class="FL" style="height:140px;"></div-->
	<div style="width:100%;height:2px;border:1px solid #000;"></div><br>
	<div id="mon1" class="mon">
		<div class="inside"></div>
	</div>
	<div id="mon2" class="mon">
		<div class="inside"></div>
	</div><br>
	<div style="width:100%;height:2px;border:1px solid #000;"></div>
	<div id="panel" style="width:100%;height:150px;margin-top:20px;">
		<!--div id="yumon">
			<img class="rscard" src="">
			<img class="rsmon" src="">
			<div class="txt nm"></div>
			<div class="txt lv">1</div>
			<div class="txt hp">100</div>
			<div class="txt dm">200</div>
			<div class="txt sk1">-skill thu 1</div>
			<div class="txt sk2">-skill thu 2</div>
			<div class="txt sk3">-skill thu 3</div>
		</div-->
		<div class="FL"><canvas id="c" width="100" height="146" ></canvas></div>
		<div id="control" class="FL"></div>
	</div>
	<br>
	<div style="width:100%;height:2px;border:1px solid #000;"></div>
	<br>
	<div class="skill">
		Name :<input id="sname" type="text" name="ten" /><br>
		Value :<input id="svalue" type="text" name="ten" /><br>
		Mana :<input id="smana" type="text" name="ten" /><br>
		Type :<input id="stype" type="text" name="ten" /><br>
		Objects :<input id="smon" type="text" name="ten" /><br>
		<select id="ssmon" class="button">
			<option value="-1">All</option>
			<option value="-2">Seft</option>
			<option value="-3">Team</option>
			<option value="-4">Enemy</option>
			<option value="0">Metal</option>
			<option value="1">Plant</option>
			<option value="2">Water</option>
			<option value="3">Fire</option>
			<option value="4">Earth</option>
			<option value="5">Insect</option>
			<option value="6">Mistery</option>
			<option value="7">Air</option>
			<option value="8">Mistery</option>
			<option value="9">Air</option>
			<option value="10">Mistery</option>
			<option value="11">Air</option>
		</select><br>
		<button class="button" onclick="addMon();">Add Mon</button><button class="button" onclick="saveSkill();">SAVE</button>

	</div>
</div>
</body>
<script type="text/javascript" src="js/app.js"></script>
</html>