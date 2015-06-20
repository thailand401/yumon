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
	var ctrl = false;
	var cell1 = false;
	var cell2 = false;
	$(document).ready(function(){
		for(i=0;i<30;i++){
			for(j=0;j<40;j++){
				$(".board").append('<div row="'+i+'" col="'+j+'" class="cell cell'+i+'_'+j+'" style="width:16px;height:16px;top:'+i*16+'px;left:'+j*16+'px"></div>');
			}
		}
		$(".item").click(function(){
			$(".item").removeClass("select");
			$(this).addClass("select");
			item = $(this).attr("src");
		})
		$(".cell").click(function(){
			if(ctrl==false){
				$(this).html("");
				$(this).append('<img src="'+item+'"/>');
			}else{
				if(cell1==false){
					cell1 = this;
				}else{
					cell2 = this;
					var i1 = parseInt( $(cell1).attr("row") );
					var j1 = parseInt( $(cell1).attr("col") );
					var i2 = parseInt( $(cell2).attr("row") );
					var j2 = parseInt( $(cell2).attr("col") );
					for(i=i1;i<=i2;i++){
						for(j=j1;j<=j2;j++){
							$(".cell"+i+"_"+j).html("");
							if(i==i1 && j==j1)
								item = "resource/ground/grass_1_8.png";
							if(i==i1 && j==j1)
								item = "resource/ground/grass_1_8.png";
							if(i==i1 && j==j1)
								item = "resource/ground/grass_1_8.png";
							if(i==i1 && j==j1)
								item = "resource/ground/grass_1_8.png";
							


							$(".cell"+i+"_"+j).append('<img src="'+item+'"/>');
						}
					}
					cell1 = false;
					cell2 = false;
				}
			}
		})
		$(document).keydown("c",function(e) {
		  	if(e.ctrlKey)
		  		ctrl = true;
		  	console.log(ctrl);
		});
		$(document).keyup("c",function(e) {
		  		ctrl = false;
		});
	})
</script>