<script type="text/javascript" src="js/jquery.min.js"></script>
<style type="text/css">
	.board{
		position: relative;

	}
	.cell{
		position: absolute;
		background-color: #666;

	}
	.cell:hover{
		opacity: 0.2;
	}
	.resource .item{
		margin: 2px;
	}
	.resource .item.select{
		border: 1px solid #f00;
	}
</style>
<div class="resource">
	<img class="item grass" src="resource/ground/grass_1_0.png">
	<img class="item grass" src="resource/ground/grass_1_1.png">
	<img class="item grass" src="resource/ground/grass_1_2.png">
	<img class="item grass" src="resource/ground/grass_1_3.png">
	<img class="item grass" src="resource/ground/grass_1_4.png">
	<img class="item grass" src="resource/ground/grass_1_5.png">
	<img class="item grass" src="resource/ground/grass_1_6.png">
	<img class="item grass" src="resource/ground/grass_1_7.png">
	<img class="item grass" src="resource/ground/grass_1_8.png">
</div>
<div class="board">
	
</div>
<script>
	var item = "";
	$(document).ready(function(){
		for(i=0;i<30;i++){
			for(j=0;j<40;j++){
				$(".board").append('<div class="cell" style="width:16px;height:16px;top:'+i*16+'px;left:'+j*16+'px"></div>');
			}
		}
		$(".item").click(function(){
			$(".item").removeClass("select");
			$(this).addClass("select");
			item = $(this).attr("src");
		})	
		$(".cell").click(function(){
			$(this).html("");
			$(this).append('<img src="'+item+'"/>');
		})	
	})
</script>