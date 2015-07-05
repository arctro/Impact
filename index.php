<html>
	<head>
		<title>Impact</title>
		<link type="text/css" rel="stylesheet" href="style.css">
		<link rel="icon" href="resources/favicon/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" href="resources/favicon/favicon.ico" type="image/x-icon"/>
		<script src="Chart.js"></script>
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
			
			var radar = {
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
			
			var lineEnergy = {
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
			            data: [70.2, 67.2, 67.1, 66.4, 65.7, 65.2, 64.3, 64.3, 63.2, 63.3, 63.9, 62.6, 63.3, 63.6, 64.3, 65.4, 65.5, 64.7, 66, 66.4, 67.8, 68.1]
			        }
			    ]
			};
			
			var piedata=[];
			//2.9285714286
			
			var pieUseageMakeup=[]
			
			var cg="";
			var br="";
			var mo="";
			var moData="";
			var data={ac:[],cd:[],cw:[],dw:[],ff:[],mo:[],tv:[]};
			var victoria=false;
			
			var selectedData=[];
			
			var compareRadar;
			var comparePie;
			var compareLine;
			
			function getBrands(data,category){
				var results=[];
				for(var i=0;i<data[category]["result"]["records"].length;i++){
					var brand=data[category]["result"]["records"][i][getDataName(category,"brand")].toLowerCase();
					if(results.indexOf(brand)<0){
						results.push(brand);
					}
				}
				return results;
			}
			function getProducts(data,brand){
				var results=[];
				for(var i=0;i<data[cg]["result"]["records"].length;i++){
					var brandTemp=data[cg]["result"]["records"][i][getDataName(cg,"brand")].toLowerCase();
					if(brandTemp==brand.toLowerCase()){
						results.push(data[cg]["result"]["records"][i]);
					}
				}
				return results;
			}
			function getModels(data,model){
				var results=[];
				for(var i=0;i<data[cg]["result"]["records"].length;i++){
					var modelTemp=data[cg]["result"]["records"][i][getDataName(cg,"model")].toLowerCase();
					if(modelTemp==model.toLowerCase()){
						results.push(data[cg]["result"]["records"][i]);
					}
				}
				return results;
			}
			
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
			
			function clearSelection(upto){
				var brand=$("#brand");
				var model=$("#model");
				var button=$("#add");
				var hours=$("#hours");
				var hoursLabel=$("#hours-label");
				
				if(typeof brand !== 'undefined' && upto >= 2){
					brand.html("");
					brand.css("display","none");
				}
				if(typeof model !== 'undefined' && upto >= 1){
					model.html("");
					model.css("display","none");
				}
				if(typeof button !== 'undefined' && upto >= 0){
					button.css("display","none");
					hours.css("display","none");
					hoursLabel.css("display","none");
				}
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
				
				var ctx = document.getElementById("radar-averagecompare").getContext("2d");
				compareRadar = new Chart(ctx).Radar(radar);
				
				var ctx = document.getElementById("line-price").getContext("2d");
				compareLine = new Chart(ctx).Line(lineEnergy);
				
				var ctx = document.getElementById("pie-useagemakeup").getContext("2d");
				comparePie = new Chart(ctx).Pie(piedata);
				//var myBarChart = new Chart(ctx).Bar(bar);
			});
			
			function selectcategory(){
				clearSelection(2);
				console.log($("#category").val());
				if($("#category").val()!=""){
					cg=$("#category").val();
					if(data[cg].length<1){
						console.log(cg);
						$("#save-dialog").css("display","block");
						$("#sd-back").css("display","block");
						$("#sd-container").html("<h1>Loading...</h1>");
						$.ajax({
						  	url: getDataName(cg,"data"),
						    success: function(result) {
						    	closeSD();
								data[cg]=eval(result);
								console.log(data);
							
								var brands=getBrands(data,cg);
								console.log(brands);
								
								$("#brand").append("<option value=''>None</option>");
								for(var i=0;i<brands.length;i++){
									$("#brand").append("<option value='"+brands[i]+"'>"+titleString(brands[i])+"</option>");
									$("#brand").css("display","block")
								}
							},
							error: function(xhr, status, error) {
								$("#sd-back").css("display","block");
								$("#save-dialog").css("display","block");
								$("#sd-container").html("<h1>Error Loading Data!</h1>");
								$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
							}
						});
					}else{
						var brands=getBrands(data,cg);
						console.log(brands);
						
						$("#brand").append("<option value=''>Select</option>");
						for(var i=0;i<brands.length;i++){
							$("#brand").append("<option value='"+brands[i]+"'>"+titleString(brands[i])+"</option>");
							$("#brand").css("display","block")
						}
					}
				}
			}
			
			function selectBrand(){
				clearSelection(1);
				if($("#brand").val()!=""){
					br=$("#brand").val();
					console.log(br);
					var models=getProducts(data,br);
					
					$("#model").append("<option value=''>Select</option>");
					for(var i=0;i<models.length;i++){
						$("#model").append("<option value='"+models[i][getDataName(cg,"model")]+"'>"+titleString(models[i][getDataName(cg,"model")])+"</option>");
						$("#model").css("display","block")
					}
				}
			}
			
			function selectModel(){
				clearSelection(0);
				if($("#model").val()!=""){
					mo=$("#model").val();
					moData=getModels(data,mo);
					console.log("dsadsa");
					console.log(moData);
					$("#add").css("display","block");
					$("#hours").css("display","block");
					$("#hours-label").css("display","block");
				}
			}
			
			function safeParseFloat(str){
				if(str!=""){
					return parseFloat(str);
				}else{
					return 0;
				}
			}
			
			function submitSelection(){
				var did=guid();
				selectedData.push({
					id:did,
					category:cg,
					model:moData[0][getDataName(cg,"model")],
					brand:moData[0][getDataName(cg,"brand")],
					rating:safeParseFloat(moData[0][getDataName(cg,"rating")]),
					power:((key[cg]['kwh']) ? kwhToKw(moData[0][getDataName(cg,"power")], 365) : moData[0][getDataName(cg,"power")]),
					show:true,
					time:$("#hours").val()
				});
				console.log(selectedData);
				clearSelection(2);
				$("#category").val('');
				
				$("#data-table").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+did+"\")'/></td><td>"+cgToCatagory(cg)+"</td><td>"+titleString(moData[0][getDataName(cg,"brand")])+"</td><td>"+moData[0][getDataName(cg,"model")]+"</td><td>"+generateStars(moData[0][getDataName(cg,"rating")],5,5,20)+"</td><td>"+Math.round(((key[cg]['kwh']) ? kwhToKw(moData[0][getDataName(cg,"power")], 365) : moData[0][getDataName(cg,"power")])*$("#hours").val())+"</td><td>"+Math.round(getCE(((key[cg]['kwh']) ? kwhToKw(moData[0][getDataName(cg,"power")], 365) : moData[0][getDataName(cg,"power")])*$("#hours").val()))+"</td><td>"+Math.round((((key[cg]['kwh']) ? kwhToKw(moData[0][getDataName(cg,"power")], 365) : moData[0][getDataName(cg,"power")]))*0.76*$("#hours").val())+"</td></tr>");
				
				generateGraphs();
			}
			
			function generateGraphs(){
				var sortedSelectedData=sortByKey(selectedData,"category");
				var piedata=[];
				for(var i=0;i<sortedSelectedData.length;i++){
					if(sortedSelectedData[i]['show']){
						piedata.push({
					        value: sortedSelectedData[i]["power"]*sortedSelectedData[i]["time"],
					        color:"#"+key[sortedSelectedData[i]["category"]]["color"],
					        highlight:"#"+key[sortedSelectedData[i]["category"]]["highlight"],
					        label: sortedSelectedData[i]["category"] + ": " + sortedSelectedData[i]["model"]
				    	});
					}
				}
				$("#pie-useagemakeup").html("");
				var ctx = document.getElementById("pie-useagemakeup").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				comparePie = new Chart(ctx).Pie(piedata);
				
				var cgCount={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData.length;i++){
					if(sortedSelectedData[i]['show']){
						cgCount[sortedSelectedData[i]["category"]]+=parseFloat(sortedSelectedData[i]["power"])*sortedSelectedData[i]["time"];
					}
				}
				radar["datasets"][0]["data"][0]=((((getCE(cgCount["ac"])/radarActual["ac"])*100)>300) ? 300 : (getCE(cgCount["ac"])/radarActual["ac"])*100);
				radar["datasets"][0]["data"][1]=((((getCE(cgCount["cd"])/radarActual["cd"])*100)>300) ? 300 : (getCE(cgCount["cd"])/radarActual["cd"])*100);
				radar["datasets"][0]["data"][2]=((((getCE(cgCount["cw"])/radarActual["cw"])*100)>300) ? 300 : (getCE(cgCount["cw"])/radarActual["cw"])*100);
				radar["datasets"][0]["data"][3]=((((getCE(cgCount["dw"])/radarActual["dw"])*100)>300) ? 300 : (getCE(cgCount["dw"])/radarActual["dw"])*100);
				radar["datasets"][0]["data"][4]=((((getCE(cgCount["ff"])/radarActual["ff"])*100)>300) ? 300 : (getCE(cgCount["ff"])/radarActual["ff"])*100);
				radar["datasets"][0]["data"][5]=((((getCE(cgCount["mo"])/radarActual["mo"])*100)>300) ? 300 : (getCE(cgCount["mo"])/radarActual["mo"])*100);
				radar["datasets"][0]["data"][6]=((((getCE(cgCount["tv"])/radarActual["tv"])*100)>300) ? 300 : (getCE(cgCount["tv"])/radarActual["tv"])*100);
				
				$("#radar-averagecompare").html("");
				var ctx = document.getElementById("radar-averagecompare").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareRadar = new Chart(ctx).Radar(radar);
				
				var total=0;
				
				for(var i=0;i<sortedSelectedData.length;i++){
					total+=parseFloat(sortedSelectedData[i]["power"])*sortedSelectedData[i]["time"];
				}
				var currentEnergyPredictions=energyPredictions.slice();
				for(var i=0;i<currentEnergyPredictions.length;i++){
					currentEnergyPredictions[i]=currentEnergyPredictions[i]*total;
				}
				
				var energyCount={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				var energyHours={
					ac:0,
					cd:0,
					cw:0,
					dw:0,
					ff:0,
					mo:0,
					tv:0
				}
				for(var i=0;i<sortedSelectedData.length;i++){
					energyCount[selectedData[i]["category"]]++;
					energyHours[selectedData[i]["category"]]+=selectedData[i]["time"];
				}
				var totalOptimal=0;
				var optimalEnergyPredictions=energyPredictions.slice();
				for(var i=0;i<Object.keys(optimal).length;i++){
					totalOptimal+=energyCount[Object.keys(energyCount)[i]]*optimal[Object.keys(energyCount)[i]]['power']*energyHours[Object.keys(energyCount)[i]];
				}
				for(var i=0;i<optimalEnergyPredictions.length;i++){
					optimalEnergyPredictions[i]=optimalEnergyPredictions[i]*totalOptimal;
				}
				
				lineEnergy['datasets'][0]['data']=currentEnergyPredictions;
				lineEnergy['datasets'][1]['data']=optimalEnergyPredictions;
				
				$("#line-price").html("");
				var ctx = document.getElementById("line-price").getContext("2d");
				ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
				compareLine = new Chart(ctx).Line(lineEnergy);
			}
			
			function toggleData(id){
				for(var i=0;i<selectedData.length;i++){
					console.log(id + " " + selectedData[i]['id']);
					if(selectedData[i]['id']==id){
						selectedData[i]['show']=!selectedData[i]['show'];
						generateGraphs();
					}
				}
			}
			
			function toggleVictoria(){
				if($("#state-select").val()=="VC"){
					victoria=true;
					generateGraphs();
				}else{
					victoria=false;
					generateGraphs();
				}
			}
			
			function scrollTo(elementid){
				$('html, body').animate({
                	scrollTop: $(elementid).offset().top
                })
			}
			
			function saveData(){
				if(selectedData==[]){
					return;
				}
				$("#save-dialog").css("display","block");
				$("#save-button").css("display","none");
				$("#sd-back").css("display","block");
				$("#sd-container").html("<h1>Saving Data...</h1>");
				console.log("api?request=ADD_DATA&json=" + JSON.stringify(selectedData));
				$.ajax({
					url: "api?request=ADD_DATA&json=" + JSON.stringify(selectedData),
					success: function(result) {
						console.log(JSON.parse(result));
						var res=JSON.parse(result);
						$("#sd-container").html("<h1>Data Saved!</h1><p>Link:</p><input type='text' class='fill-wb' value='http://arctro.com/impact/s/"+res["data"][0]["access_id"]+"'/><p>Delete Code:</p><input type='text' class='fill-wb' value='"+res["data"][0]["delete_code"]+"'/></br>");
						$("#save-dialog").append("<div class='' style='padding:20px;background-color:#B0E7A7;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='redirectTo(\"http://arctro.com/impact/s/"+res["data"][0]["access_id"]+"\")'>Go to page</div>");
						$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
					},
					error: function(xhr, status, error) {
						$("#sd-container").html("<h1>Error Saving Data!</h1>");
						$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
					}
				});
			}
			
			function closeSD(){
				$("#save-dialog").html("<div id='sd-container' class='' style='padding:10px;width:calc(100% - 20px)'></div>");
				$("#save-dialog").css("display","none");
				$("#sd-back").css("display","none");
			}
			function redirectTo(url){
				window.location=url;
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
				<img src="resources/impact_logo_horizontal.png" class="" alt="logo" style="height:100px;margin:10px;"/>
			</div>
			<div class="color-g" style="background-image:url(resources/patterns/fancypants.jpg);height:33px;">
				<ul class="center-content-h menu" style="font-size:25px;height:99%;">
					<li style="margin-left:0px" onclick="">Home</li>
					<li onclick="redirectTo('http://arctro.com/impact/team/#about')">About</li>
					<li onclick="redirectTo('http://arctro.com/impact/team/')">Team</li>
					<li onclick="scrollTo('#calculate')">Calculate</li>
					<li onclick="scrollTo('#results')">Results</li>
					<li onclick="saveData()" id="save-button">Save</li>
				</ul>
			</div>
		</div>
		<div class="content shadow-card" id="calculate">
			<h1>Calculate</h1>
			<div id="selector">
				<select id="state-select" class="fill-wb" onchange="toggleVictoria()">
					<option value="">Select</option>
					<option value="ACT">Australian Capital Territory</option>
					<option value="NSW">New South Wales</option>
					<option value="NT">Northern Territory</option>
					<option value="QU">Queensland</option>
					<option value="SA">South Australia</option>
					<option value="WA">Western Australia</option>
					<option value="TA">Tasmania</option>
					<option value="VC">Victoria</option>
				</select>
				<select id="category" class="fill-wb" onchange="selectcategory()">
					<option value="">Select</option>
					<option value="ac">Air Conditioners</option>
					<option value="cd">Clothes Dryers</option>
					<option value="cw">Clothes Washers</option>
					<option value="dw">Dishwashers</option>
					<option value="ff">Fridges/Freezers</option>
					<option value="mo">Monitors</option>
					<option value="tv">Televisions</option>
				</select>
				<select id="brand" class="fill-wb" style="display:none;" onchange="selectBrand()">
					
				</select>
				<select id="model" class="fill-wb" style="display:none;margin-top:10px;margin-bottom:10px"  onchange="selectModel()">
					
				</select>
				<p id="hours-label" style="display:none;">Hours Use Daily:</p>
				<input type="number" class="fill-wb" id="hours"  style="display:none;"/>
				<input type="button" class="fill-wb" value="Add" id="add"  style="display:none;" onclick="submitSelection()"/>
			</div>
			<table class="outline fill-wb" id="data-table">
				<tr class="t-ac">
					<td><b>Enabled</b></td>
					<td><b>Category</b></td>
					<td><b>Brand Name</b></td>
					<td><b>Model Number</b></td>
					<td style="min-width:140px"><b>Star Rating</b></td>
					<td><b>Daily Power Useage (KWH)</b></td>
					<td><b>Daily Carbon Emissions (g)</td>
					<td><b>Daily Cost (AUD Cents)</td>
				</tr>
			</table>
		</div>
		<div class="content shadow-card clearfix" style="text-align:center;" id="results">
			<h1 style="text-align:left;">Results</h1>
			<table style="width:100%;">
				<tr colspan="2">
					<h2>Breakdown of energy usage</h2>
				</tr>
				<tr>
					<td class="fill-wh">
						<canvas id="pie-useagemakeup" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top">
						<table>
							<tr>
								<td valign="top" style="width:150px;">
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
								<td valign="top">
									This graph represents the relative amount of carbon emissions that your devices produce in a day. This graph shows you how to cut your carbon emissions, by either reducing use of a particular device, or replacing it with a better rated device.
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr colspan="2">
					<h2>Comparison to average carbon emissions</h2>
				</tr>
				<tr>
					<td class="fill-wh">
						<canvas id="radar-averagecompare" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top">
						<table>
							<tr>
								<td valign="top" style="width:150px;">
									<table>
										<tr><td><div style="display:inline-block;background-color:#97BBCD;width:20px;height:20px;"></div></td><td> Average Carbon Emissions</td></tr>
										<tr><td><div style="display:inline-block;background-color:#9AD6B9;width:20px;height:20px;"></div></td><td> Your Carbon Emissions</td></tr>
									</table>
								</td>
								<td valign="top">
									This graph represents your carbon footprint compared to the average household carbon footprint. This graph identifies areas where you differ in energy usage and where further reductions in carbon emissions could be made.
									<br>
									<br>
									<span style="font-size:10px">footnote: Usage and average was calculated using the <a href="https://data.gov.au/dataset/sample-household-electricity-time-of-use-data">average energy use data</a> combined with average device usage data and <a href="https://data.gov.au/dataset/energy-rating-for-household-appliances">the average energy usage by rated devices</a>.</span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr colspan="2">
					<h2>Energy price predictions (Cents per Day)</h2>
				</tr>
				<tr>
					<td class="fill-wh">
						<canvas id="line-price" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top">
						<table>
							<tr>
								<td valign="top" style="width:150px;">
									<table>
										<tr><td><div style="display:inline-block;background-color:#97BBCD;width:20px;height:20px;"></div></td><td> Your predicted daily cost</td></tr>
										<tr><td><div style="display:inline-block;background-color:#9AD6B9;width:20px;height:20px;"></div></td><td> Optimum predicted daily cost</td></tr>
									</table>
								</td>
								<td valign="top">
									This graph shows the predicted running cost of your devices compared to households using the most energy efficient devices as suggested in the table below.<br/>
									<table style="" class="outline fill-wb">
										<tr style="font-weight:bold">
											<td>Category</td>
											<td>Brand</td>
											<td>Model</td>
											<td>Rating</td>
										</tr>
										<tr>
											<td>Air Conditioner</td>
											<td>Advance</td>
											<td>KFR-23GW</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Clothes Dryer</td>
											<td>Miele</td>
											<td>WT 2780</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Dish Washer</td>
											<td>Fisher & Paykel</td>
											<td>DD60*7</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/half.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Clothes Washer</td>
											<td>AEG</td>
											<td>L50600</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Fridge/Freezer</td>
											<td>LG</td>
											<td>GC-049SW</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/half.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Television</td>
											<td>Samsung</td>
											<td>HG40AC460KW</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
										<tr>
											<td>Monitor</td>
											<td>HP</td>
											<td>E221i</td>
											<td>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/full.png' style='float:left;height:20px;' align='middle'/>
												<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:20px;' align='middle'/>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
		<div class="fill-w center-content shadow-card" style="background-color:#9AD6B9;color:#FFFFFF;font-size:10px;height:40px">
			<p>&copy; 2015 <a href="http://arctro.com">Arctro</a>. All rights reserved.<br/><span style="font-size:5px"><a href="http://www.abc.net.au/news/2013-07-25/australia-nuclear-future/4843498">Carbon Emissions Data</a></span></p>
		</div>
	</body>
</html>