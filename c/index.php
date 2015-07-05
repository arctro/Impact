<html>
	<head>
		<title>Impact</title>
		<link type="text/css" rel="stylesheet" href="../style.css">
		<link rel="icon" href="../resources/favicon/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="../resources/favicon/favicon.ico" type="image/x-icon"/>
		<script src="../Chart.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script>
		//JSON.stringify(data);
		//ac,cd,cw,dw,ff,mo,tv
			var key={
				ac:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=0973a476-eb0c-45e6-9a18-054f74307843",
					id:"_id",
					model:"Model_No",
					brand:"Brand",
					rating:"Star2010_Cool",
					power:"C-Total Cool Rated",
					kwh:false,
					color:"97BBCD",
					highlight:"C7DDE8"
				},
				cd:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=f734c56b-a255-4c4e-a3c1-e835c38b8774",
					id:"_id",
					model:"Model No",
					brand:"Brand",
					rating:"New Star",
					power:"New CEC",
					kwh:true,
					color:"9AD6B9",
					highlight:"C8ECDB"
				},
				dw:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=cbe7057d-e132-4297-b8be-eecf8322d4e6",
					id:"_id",
					model:"Model No",
					brand:"Brand",
					rating:"New Star",
					power:"CEC_",
					kwh:true,
					color:"DAF4B1",
					highlight:"EBFAD4"
				},
				cw:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=eb3b9d8e-f39d-47b7-9db0-309856176951",
					id:"_id",
					model:"Model No",
					brand:"Brand",
					rating:"New Star",
					power:"CEC_",
					kwh:true,
					color:"FFEDB8",
					highlight:"FFF5D8"
				},
				ff:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=0eabca18-49bb-4a9e-8019-28d5d56501c4",
					id:"_id",
					model:"Model No",
					brand:"Brand",
					rating:"Star2009",
					power:"CEC_",
					kwh:true,
					color:"FFD1B8",
					highlight:"FFE6D8"
				},
				tv:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=93a615e5-935e-4713-a4b0-379e3f6dedc9",
					id:"_id",
					model:"Model_No",
					brand:"Brand_Reg",
					rating:"Star",
					power:"Avg_mode_power",
					kwh:true,
					color:"EAA9C5",
					highlight:"F6D0E1"
				},
				mo:{
					data:"https://data.gov.au/api/action/datastore_search?resource_id=f1ea4c89-282c-4d64-b870-10a5ab039030",
					id:"_id",
					model:"Model Number",
					brand:"Brand Name",
					rating:"Star Rating",
					power:"Active Standby Power",
					kwh:false,
					color:"C898D0",
					highlight:"E5C7EA"
				}
			};
			
			var optimal={
				ac:{
					model:"KFR-23GW",
					brand:"ADVANCE",
					rating:"5",
					power:"1.03"
				},
				cd:{
					model:"WT 2780",
					brand:"MIELE",
					rating:"4.0",
					power:"0.21"
				},
				dw:{
					model:"DD60*7",
					brand:"FISHER & PAYKEL",
					rating:"3.5",
					power:"0.36"
				},
				cw:{
					model:"L50600",
					brand:"AEG",
					rating:"4.0",
					power:"0.45"
				},
				ff:{
					model:"GC-049SW",
					brand:"LG",
					rating:"3.5",
					power:"130"
				},
				tv:{
					model:"HG40AC460KW",
					brand:"SAMSUNG",
					rating:"5",
					power:"0.43"
				},
				mo:{
					model:"E221i",
					brand:"HP",
					rating:"4.0",
					power:"0.0331"
				}
			};
			
			var radarActual={ac:getCE(7,false), cd:getCE(1,false), cw:getCE(1,false), dw:getCE(1,false), ff:getCE(79,false), mo:getCE(3,false), tv:getCE(3,false)};
			
			var radar1 = {
			    labels: ["Air Conditioner", "Clothes Dryers", "Clothes Washers", "Dishwashers", "Fridges/Freezers", "Monitors", "Television"],
			    datasets: [
			        {
			            label: "Your average energy use by category",
			            fillColor: "rgba(200,236,219,0.2)",
			            strokeColor: "#9AD6B9",
			            pointColor: "#9AD6B9",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [0, 0, 0, 0, 0, 0, 0]
			        },
			        {
			            label: "Population average energy use by category",
			            fillColor: "rgba(199,221,232,0.2)",
			            strokeColor: "#97BBCD",
			            pointColor: "#97BBCD",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [100,100,100,100,100,100,100]
			        }
			    ]
			};
			var radar2 = {
			    labels: ["Air Conditioner", "Clothes Dryers", "Clothes Washers", "Dishwashers", "Fridges/Freezers", "Monitors", "Television"],
			    datasets: [
			        {
			            label: "Your average energy use by category",
			            fillColor: "rgba(200,236,219,0.2)",
			            strokeColor: "#9AD6B9",
			            pointColor: "#9AD6B9",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [0, 0, 0, 0, 0, 0, 0]
			        },
			        {
			            label: "Population average energy use by category",
			            fillColor: "rgba(199,221,232,0.2)",
			            strokeColor: "#97BBCD",
			            pointColor: "#97BBCD",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [100,100,100,100,100,100,100]
			        }
			    ]
			};
			
			var energyPredictions = [70.2, 67.2, 67.1, 66.4, 65.7, 65.2, 64.3, 64.3, 63.2, 63.3, 63.9, 62.6, 63.3, 63.6, 64.3, 65.4, 65.5, 64.7, 66, 66.4, 67.8, 68.1];
			
			var lineEnergy1 = {
			    labels: ["2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030", "2031", "2032", "2033", "2034", "2035"],
			    datasets: [
			        {
			            label: "Daily payments with current setup (cents)",
			            fillColor: "rgba(199,221,232,0.2)",
			            strokeColor: "#97BBCD",
			            pointColor: "#97BBCD",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [70.2, 67.2, 67.1, 66.4, 65.7, 65.2, 64.3, 64.3, 63.2, 63.3, 63.9, 62.6, 63.3, 63.6, 64.3, 65.4, 65.5, 64.7, 66, 66.4, 67.8, 68.1]
			        },
			        {
			            label: "Daily payments with recommended setup (cents)",
			            fillColor: "rgba(200,236,219,0.2)",
			            strokeColor: "#9AD6B9",
			            pointColor: "#9AD6B9",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "#9AD6B9",
			            data: [0,0,0,0,0,0,0,0]
			        }
			    ]
			};
			var lineEnergy2 = {
			    labels: ["2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030", "2031", "2032", "2033", "2034", "2035"],
			    datasets: [
			        {
			            label: "Daily payments with current setup (cents)",
			            fillColor: "rgba(199,221,232,0.2)",
			            strokeColor: "#97BBCD",
			            pointColor: "#97BBCD",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [70.2, 67.2, 67.1, 66.4, 65.7, 65.2, 64.3, 64.3, 63.2, 63.3, 63.9, 62.6, 63.3, 63.6, 64.3, 65.4, 65.5, 64.7, 66, 66.4, 67.8, 68.1]
			        },
			        {
			            label: "Daily payments with recommended setup (cents)",
			            fillColor: "rgba(200,236,219,0.2)",
			            strokeColor: "#9AD6B9",
			            pointColor: "#9AD6B9",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "#9AD6B9",
			            data: [0,0,0,0,0,0,0,0]
			        }
			    ]
			};
			
			var pieUseageMakeup=[]
			
			var cg="";
			var br="";
			var mo="";
			var moData="";
			var data={ac:[],cd:[],cw:[],dw:[],ff:[],mo:[]};
			var victoria=false;
			
			var selectedData1=[];
			var selectedData2=[];
			
			var compareRadar1;
			var comparePie1;
			var compareLine1;
			
			var compareRadar2;
			var comparePie2;
			var compareLine2;
			
			function getDataName(category,name){
				return key[category][name];
			}
			
			function titleString(string){
				if(typeof string !== 'string'){
					return string;
				}
				var noCapitalize=['a','as','is','it','am'];
				string=string.toLowerCase();
				var words=string.split(" ");
				for(var i=0;i<words.length;i++){
					if(noCapitalize.indexOf(words[i])<0){
						words[i]=words[i].capitalizeFirstLetter();
					}
				}
				return words.join(" ");
			}
			
			String.prototype.capitalizeFirstLetter = function() {
			    return this.charAt(0).toUpperCase() + this.slice(1);
			}
			
			function kwhToKw(kwh,hours){
				return kwh/hours;
			}
			
			function sortByKey(array, key) {
				return array.sort(function(a, b) {
					var x = a[key]; var y = b[key];
					return ((x < y) ? -1 : ((x > y) ? 1 : 0));
				});
			}
			
			function getCE(num,usevic){
				if (typeof usevic === 'undefined') { usevic = victoria; }
				if(usevic){
					return num*1675;
				}else{
					return num*865;
				}
			}
			
			function safeDivide(num,divide){
				if(divide==0||num==0){
					return 0;
				}
				return num/divide;
			}
			
			function generateStars(rating,outof,shownum,size){
				if(typeof rating !== 'float'||typeof rating !== 'int'){
					rating=parseFloat(rating);
					if(typeof rating === 'undefined'){
						return "<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/>";
					}
				}
				rating=Math.round(rating);
				ratio=outof/shownum;
				outof=Math.round(outof/ratio);
				rating=rating/ratio;
				var returnHTML="<span>";
				for(var i=0;i<outof;i++){
					if(rating>=1){
						returnHTML+="<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:"+size+"px;' align='middle'/>";
						rating-=1;
					}else if(rating>=0.5){
						returnHTML+="<img src='http://arctro.com/toiletsact/resources/half.png' style='float:left;height:"+size+"px;' align='middle'/>";
						rating-=0.5;
					}else{
						returnHTML+="<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/>";
					}
				}
				return returnHTML+"</span>";
			}
			
			function guid() {
			  function s4() {
			    return Math.floor((1 + Math.random()) * 0x10000)
			      .toString(16)
			      .substring(1);
			  }
			  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
			    s4() + '-' + s4() + s4() + s4();
			}
			
			$(document).ready(function(){
				var cw = $('.s-equal').width();
				$('.s-equal').css({'height':cw+'px'});
				var cw = $('.s-half').width();
				$('.s-half').css({'height':(cw/2)+'px'});
				
				var ctx = document.getElementById("radar-averagecompare1").getContext("2d");
				compareRadar1 = new Chart(ctx).Radar(radar1);
				
				var ctx = document.getElementById("line-price1").getContext("2d");
				var myLineChart1 = new Chart(ctx).Line(lineEnergy1);
				
				var ctx = document.getElementById("radar-averagecompare2").getContext("2d");
				compareRadar2 = new Chart(ctx).Radar(radar2);
				
				var ctx = document.getElementById("line-price2").getContext("2d");
				var myLineChart2 = new Chart(ctx).Line(lineEnergy2);
				//var myBarChart = new Chart(ctx).Bar(bar);
				console.log("/impact/api?request=LOAD_DATA&access_id=<?php echo $_GET['id1']; ?>");
				$.ajax({
					url: "/impact/api?request=LOAD_DATA&access_id=<?php echo $_GET['id1']; ?>",
					success: function(result) {
						var res=JSON.parse(result);
						selectedData1=res['data'][0];
						console.log(selectedData1);
						for(var i=0;i<selectedData1.length;i++){
							$("#data-table1").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+selectedData1[i]['unique_id']+"\")'/></td><td>"+cgToCatagory(selectedData1[i]['category'])+"</td><td>"+titleString(selectedData1[i]['brand'])+"</td><td>"+selectedData1[i]['model']+"</td><td>"+generateStars(selectedData1[i]['rating'],5,5,20)+"</td><td>"+Math.round(selectedData1[i]['power']*selectedData1[i]['time'])+"</td><td>"+Math.round(getCE(selectedData1[i]['power']*selectedData1[i]['time']))+"</td><td>"+Math.round(selectedData1[i]['power']*0.76*selectedData1[i]['time'])+"</td></tr>")
							//$("#data-table").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+selectedData[i]['unique_id']+"\")'/></td><td>"+selectedData[i]['cg']+"</td><td>"+selectedData[i]['brand']+"</td><td>"+selectedData[i]['model']+"</td><td>"+generateStars(moData[0][selectedData[i]['rating'],5,5,20)+"</td><td>"+Math.round(selectedData[i]['power']*selectedData[i]['time'])+"</td><td>"+Math.round(getCE(selectedData[i]['power']*selectedData[i]['time']))+"</td><td>"+Math.round(selectedData[i]['power']*0.76*selectedData[i]['time'])+"</td></tr>");
						}
						$.ajax({
							url: "/impact/api?request=LOAD_DATA&access_id=<?php echo $_GET['id2']; ?>",
							success: function(result) {
								var res=JSON.parse(result);
								selectedData2=res['data'][0];
								console.log(selectedData2);
								generateGraphs();
								for(var i=0;i<selectedData2.length;i++){
									$("#data-table2").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+selectedData2[i]['unique_id']+"\")'/></td><td>"+cgToCatagory(selectedData2[i]['category'])+"</td><td>"+titleString(selectedData2[i]['brand'])+"</td><td>"+selectedData2[i]['model']+"</td><td>"+generateStars(selectedData2[i]['rating'],5,5,20)+"</td><td>"+Math.round(selectedData2[i]['power']*selectedData2[i]['time'])+"</td><td>"+Math.round(getCE(selectedData2[i]['power']*selectedData2[i]['time']))+"</td><td>"+Math.round(selectedData2[i]['power']*0.76*selectedData2[i]['time'])+"</td></tr>")
								}
							},
							error: function(xhr, status, error) {
								$("#sd-back").css("display","block");
								$("#sd-container").html("<h1>Error Loading Data!</h1>");
								$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
							}
						});
					},
					error: function(xhr, status, error) {
						$("#sd-back").css("display","block");
						$("#sd-container").html("<h1>Error Loading Data!</h1>");
						$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
					}
				});
			});
			
			function generateGraphs(){
				var sortedSelectedData1=sortByKey(selectedData1,"category");
				var piedata1=[];
				for(var i=0;i<sortedSelectedData1.length;i++){
					if(sortedSelectedData1[i]['show']){
						piedata1.push({
					        value: sortedSelectedData1[i]["power"]*sortedSelectedData1[i]["time"],
					        color:"#"+key[sortedSelectedData1[i]["category"]]["color"],
					        highlight:"#"+key[sortedSelectedData1[i]["category"]]["highlight"],
					        label: sortedSelectedData1[i]["category"] + ": " + sortedSelectedData1[i]["model"]
				    	});
					}
				}
				$("#pie-useagemakeup1").html("");
				var ctx = document.getElementById("pie-useagemakeup1").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				comparePie1 = new Chart(ctx).Pie(piedata1);
				
				var cgCount1={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData1.length;i++){
					if(sortedSelectedData1[i]['show']){
						cgCount1[sortedSelectedData1[i]["category"]]+=parseFloat(sortedSelectedData1[i]["power"])*sortedSelectedData1[i]["time"];
					}
				}
				radar1["datasets"][0]["data"][0]=(getCE(cgCount1["ac"])/radarActual["ac"])*100;
				radar1["datasets"][0]["data"][1]=(getCE(cgCount1["cd"])/radarActual["cd"])*100;
				radar1["datasets"][0]["data"][2]=(getCE(cgCount1["cw"])/radarActual["cw"])*100;
				radar1["datasets"][0]["data"][3]=(getCE(cgCount1["dw"])/radarActual["dw"])*100;
				radar1["datasets"][0]["data"][4]=(getCE(cgCount1["ff"])/radarActual["ff"])*100;
				radar1["datasets"][0]["data"][5]=(getCE(cgCount1["mo"])/radarActual["mo"])*100;
				radar1["datasets"][0]["data"][6]=(getCE(cgCount1["tv"])/radarActual["tv"])*100;
				
				$("#radar-averagecompare1").html("");
				var ctx = document.getElementById("radar-averagecompare1").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareRadar1 = new Chart(ctx).Radar(radar1);
				
				var total=0;
				
				for(var i=0;i<sortedSelectedData1.length;i++){
					total+=parseFloat(sortedSelectedData1[i]["power"])*sortedSelectedData1[i]["time"];
				}
				var currentEnergyPredictions1=energyPredictions.slice();
				for(var i=0;i<currentEnergyPredictions1.length;i++){
					currentEnergyPredictions1[i]=currentEnergyPredictions1[i]*total;
				}
				
				var energyCount1={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData1.length;i++){
					energyCount1[selectedData1[i]["category"]]++;
				}
				var totalOptimal1=0;
				var optimalEnergyPredictions1=energyPredictions.slice();
				for(var i=0;i<Object.keys(optimal).length;i++){
					totalOptimal1+=energyCount1[Object.keys(energyCount1)[i]]*optimal[Object.keys(energyCount1)[i]]['power'];
				}
				for(var i=0;i<optimalEnergyPredictions1.length;i++){
					optimalEnergyPredictions1[i]=optimalEnergyPredictions1[i]*totalOptimal1;
				}
				
				lineEnergy1['datasets'][0]['data']=currentEnergyPredictions1;
				lineEnergy1['datasets'][1]['data']=optimalEnergyPredictions1;
				
				$("#line-price").html("");
				var ctx = document.getElementById("line-price1").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareLine1 = new Chart(ctx).Line(lineEnergy1);
				
				
				
				
				
				var sortedSelectedData2=sortByKey(selectedData2,"category");
				var piedata2=[];
				for(var i=0;i<sortedSelectedData2.length;i++){
					if(sortedSelectedData2[i]['show']){
						piedata2.push({
					        value: sortedSelectedData2[i]["power"]*sortedSelectedData2[i]["time"],
					        color:"#"+key[sortedSelectedData2[i]["category"]]["color"],
					        highlight:"#"+key[sortedSelectedData2[i]["category"]]["highlight"],
					        label: sortedSelectedData2[i]["category"] + ": " + sortedSelectedData2[i]["model"]
				    	});
					}
				}
				$("#pie-useagemakeup2").html("");
				var ctx = document.getElementById("pie-useagemakeup2").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				comparePie2 = new Chart(ctx).Pie(piedata2);
				
				var cgCount2={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData2.length;i++){
					if(sortedSelectedData2[i]['show']){
						cgCount2[sortedSelectedData2[i]["category"]]+=parseFloat(sortedSelectedData2[i]["power"])*sortedSelectedData2[i]["time"];
					}
				}
				radar2["datasets"][0]["data"][0]=(getCE(cgCount2["ac"])/radarActual["ac"])*100;
				radar2["datasets"][0]["data"][1]=(getCE(cgCount2["cd"])/radarActual["cd"])*100;
				radar2["datasets"][0]["data"][2]=(getCE(cgCount2["cw"])/radarActual["cw"])*100;
				radar2["datasets"][0]["data"][3]=(getCE(cgCount2["dw"])/radarActual["dw"])*100;
				radar2["datasets"][0]["data"][4]=(getCE(cgCount2["ff"])/radarActual["ff"])*100;
				radar2["datasets"][0]["data"][5]=(getCE(cgCount2["mo"])/radarActual["mo"])*100;
				radar2["datasets"][0]["data"][6]=(getCE(cgCount2["tv"])/radarActual["tv"])*100;
				
				$("#radar-averagecompare2").html("");
				var ctx = document.getElementById("radar-averagecompare2").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareRadar2 = new Chart(ctx).Radar(radar2);
				
				var total=0;
				
				for(var i=0;i<sortedSelectedData2.length;i++){
					total+=parseFloat(sortedSelectedData2[i]["power"])*sortedSelectedData2[i]["time"];
				}
				var currentEnergyPredictions2=energyPredictions.slice();
				for(var i=0;i<currentEnergyPredictions2.length;i++){
					currentEnergyPredictions2[i]=currentEnergyPredictions2[i]*total;
				}
				
				var energyCount2={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData2.length;i++){
					energyCount2[selectedData2[i]["category"]]++;
				}
				var totalOptimal2=0;
				var optimalEnergyPredictions2=energyPredictions.slice();
				for(var i=0;i<Object.keys(optimal).length;i++){
					totalOptimal2+=energyCount2[Object.keys(energyCount2)[i]]*optimal[Object.keys(energyCount2)[i]]['power'];
				}
				for(var i=0;i<optimalEnergyPredictions2.length;i++){
					optimalEnergyPredictions2[i]=optimalEnergyPredictions2[i]*totalOptimal2;
				}
				
				lineEnergy2['datasets'][0]['data']=currentEnergyPredictions2;
				lineEnergy2['datasets'][1]['data']=optimalEnergyPredictions2;
				
				$("#line-price").html("");
				var ctx = document.getElementById("line-price2").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareLine2 = new Chart(ctx).Line(lineEnergy2);
			}
			
			function toggleData(id){
				for(var i=0;i<selectedData.length;i++){
					console.log(id + " " + selectedData[i]['id']);
					if(selectedData[i]['id']==id){
						if(selectedData[i]['show']==true||selectedData[i]['show']=="true"){
							selectedData[i]['show']=false;
						}else{
							selectedData[i]['show']=true;
						}
						generateGraphs();
					}
				}
			}
			
			function cgToCatagory(cg){
				if(cg=="ac"){
					return "Air Conditioner";
				}
				if(cg=="cd"){
					return "Clothes Dryer";
				}
				if(cg=="cw"){
					return "Clothes Washer";
				}
				if(cg=="dw"){
					return "Dish Washer";
				}
				if(cg=="ff"){
					return "Fridge/Freezer";
				}
				if(cg=="mo"){
					return "Monitor";
				}
				if(cg=="tv"){
					return "Television";
				}
				return cg;
			}
			
			function scrollTo(elementid){
				$('html, body').animate({
                	scrollTop: $(elementid).offset().top
                })
			}
			function closeSD(){
				$("#save-dialog").html("<div id='sd-container' class='' style='padding:10px;width:calc(100% - 20px)'></div>");
				$("#save-dialog").css("display","none");
				$("#sd-back").css("display","none");
			}
			function redirectTo(url){
				window.location=url;
			}
			
			function deleteDataRequest(){
				var deleteCode="";
				$("#sd-back").css("display","block");
				$("#save-dialog").css("display","block");
				$("#sd-container").html("<h1>Delete Data</h1><p>Enter delete code:</p><input type='text' id='delete-code' class='fill-wb' value=''/>");
				$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='deleteData()'>Delete</div>");
				$("#save-dialog").append("<div class='' style='padding:20px;background-color:#B0E7A7;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
			}
			function deleteData(deleteCode){
				$.ajax({
					url: "/impact/api?request=DELETE_DATA&access_id=<?php echo $_GET['access_id']; ?>&delete_code="+$("#delete-code").val(),
					success: function(result) {
						redirectTo("http://arctro.com/impact")
					}
				});
			}
		</script>
	</head>
	<body>
		<div id="save-dialog" class="center shadow-menu" style="width:250px;background-color:#FFFFFF;position:fixed;z-index:10;display:none;">
			<div id="sd-container" class="" style="padding:10px;width:calc(100% - 20px)">
				
			</div>
		</div>
		<div id="sd-back" class="fill-wb fill-hb" style="position:fixed;background-color:#151515;opacity:0.5;display:none;z-index:9;" onclick="closeSD()"></div>
		<div id="header" class="fill-w shadow-menu bc-w center-content-w bg-w" style="">
			<div class="body-width center-content-w">
				<img src="../resources/impact_logo_horizontal.png" class="" alt="logo" style="height:100px;margin:10px;"/>
			</div>
			<div class="color-g" style="background-image:url(../resources/patterns/fancypants.jpg);height:33px;">
				<ul class="center-content-h menu" style="font-size:25px;height:99%;">
					<li style="margin-left:0px" onclick="redirectTo('http://arctro.com/impact')">Home</li>
					<li onclick="scrollTo('#about')">About</li>
					<li onclick="scrollTo('#calculate')">Calculate</li>
					<li onclick="scrollTo('#results')">Results</li>
				</ul>
			</div>
		</div>
		<div class="content shadow-card" id="about">
			<h1>About</h1>
			<p>Impact helps measure, analyse and compare carbon emmissions for household devices.</p>
		</div>
		<div class="content shadow-card" id="calculate">
			<h1>Calculate</h1>
			<table class="outline fill-wb" id="data-table1">
				<tr class="t-ac">
					<td><b>Enabled</b></td>
					<td><b>Category</b></td>
					<td><b>Brand Name</b></td>
					<td><b>Model Number</b></td>
					<td style="min-width:140px"><b>Star Rating</b></td>
					<td><b>Daily Power Useage (KWH)</b></td>
					<td><b>Daily Carbon Emissions (g)</b></td>
					<td><b>Daily Cost (AUD Cents)</b></td>
				</tr>
			</table>
			<br/>
			<table class="outline fill-wb" id="data-table2">
				<tr class="t-ac">
					<td><b>Enabled</b></td>
					<td><b>Category</b></td>
					<td><b>Brand Name</b></td>
					<td><b>Model Number</b></td>
					<td style="min-width:140px"><b>Star Rating</b></td>
					<td><b>Daily Power Useage (KWH)</b></td>
					<td><b>Daily Carbon Emissions (g)</b></td>
					<td><b>Daily Cost (AUD Cents)</b></td>
				</tr>
			</table>
		</div>
		<div class="content shadow-card clearfix" style="text-align:center;" id="results">
			<h1 style="text-align:left;">Results</h1>
			<table style="width:100%;">
				<tr colspan="3">
					<h2>Breakdown of energy usage</h2>
				</tr>
				<tr>
					<td style="width:calc(50% - 75px)">
						<canvas id="pie-useagemakeup1" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top" style="width:150px">
						<table>
							<tr><td><div style="display:inline-block;background-color:#97BBCD;width:20px;height:20px;"></div></td><td> Air Conditioner</td></tr>
							<tr><td><div style="display:inline-block;background-color:#9AD6B9;width:20px;height:20px;"></div></td><td> Clothers Dryer</td></tr>
							<tr><td><div style="display:inline-block;background-color:#FFEDB8;width:20px;height:20px;"></div></td><td> Clothers Washer</td></tr>
							<tr><td><div style="display:inline-block;background-color:#DAF4B1;width:20px;height:20px;"></div></td><td> Dishwasher</td></tr>
							<tr><td><div style="display:inline-block;background-color:#FFD1B8;width:20px;height:20px;"></div></td><td> Fridge/Freezer</td></tr>
							<tr><td><div style="display:inline-block;background-color:#EAA9C5;width:20px;height:20px;"></div></td><td> Television</td></tr>
							<tr><td><div style="display:inline-block;background-color:#C898D0;width:20px;height:20px;"></div></td><td> Monitor</td></tr>
						</table>
					</td>
					<td style="width:calc(50% - 75px)">
						<canvas id="pie-useagemakeup2" class="s-half fill-wb"></canvas>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr colspan="3">
					<h2>Comparison to average carbon emissions</h2>
				</tr>
				<tr>
					<td style="width:calc(50% - 75px)">
						<canvas id="radar-averagecompare1" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top" style="width:150px">
						<table>
							<tr><td><div style="display:inline-block;background-color:#97BBCD;width:20px;height:20px;"></div></td><td> Your Carbon Emissions</td></tr>
							<tr><td><div style="display:inline-block;background-color:#9AD6B9;width:20px;height:20px;"></div></td><td> Average Carbon Emissions</td></tr>
						</table>
					</td>
					<td style="width:calc(50% - 75px)">
						<canvas id="radar-averagecompare2" class="s-half fill-wb"></canvas>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr colspan="3">
					<h2>Energy price predictions (Cents per Day)</h2>
				</tr>
				<tr>
					<td style="width:calc(50% - 75px)">
						<canvas id="line-price1" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top" style="width:150px;">
						<table>
							<tr><td><div style="display:inline-block;background-color:#97BBCD;width:20px;height:20px;"></div></td><td> Your predicted daily cost</td></tr>
							<tr><td><div style="display:inline-block;background-color:#9AD6B9;width:20px;height:20px;"></div></td><td> Optimum predicted daily cost</td></tr>
						</table>
					</td>
					<td style="width:calc(50% - 75px)">
						<canvas id="line-price2" class="s-half fill-wb"></canvas>
					</td>
				</tr>
			</table>
		</div>
		<div class="fill-w center-content shadow-card" style="background-color:#9AD6B9;color:#FFFFFF;font-size:10px;height:40px">
			<p>&copy; 2015 <a href="http://arctro.com">Arctro</a>. All rights reserved.<br/><span style="font-size:5px"><a href="http://www.abc.net.au/news/2013-07-25/australia-nuclear-future/4843498">Carbon Emissions Data</a></span></p>
		</div>
	</body>
</html>