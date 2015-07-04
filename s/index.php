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
					rating:"star_rating",
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
			            data: [getCE(1.014,false), getCE(0.28099465), getCE(0.28099465), getCE(0.32956932), getCE(6.1834559), getCE(3.32802229), getCE(3.3646899)]
			        }
			    ]
			};
			
			var lineEnergy = {
			    labels: ["2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030", "2031", "2032", "2033", "2034", "2035"],
			    datasets: [
			        {
			            label: "Energy Price (cents)",
			            fillColor: "rgba(199,221,232,0.2)",
			            strokeColor: "#97BBCD",
			            pointColor: "#97BBCD",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [205, 197, 196, 194, 192, 192, 188, 188, 186, 185, 186, 183, 185, 186, 188, 191, 190, 189, 193, 194, 198, 199]
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
			
			var selectedData=[];
			
			
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
				var myRadarChart = new Chart(ctx).Radar(radar);
				
				var ctx = document.getElementById("line-price").getContext("2d");
				var myLineChart = new Chart(ctx).Line(lineEnergy);
				//var myBarChart = new Chart(ctx).Bar(bar);
				
				$.ajax({
					url: "/impact/api?request=LOAD_DATA&access_id=<?php echo $_GET['access_id']; ?>",
					success: function(result) {
						console.log(JSON.parse(result));
						var res=JSON.parse(result);
						selectedData=res['data'][0];
						generateGraphs();
						for(var i=0;i<selectedData.length;i++){
							$("#data-table").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+selectedData[i]['unique_id']+"\")'/></td><td>"+selectedData[i]['category']+"</td><td>"+titleString(selectedData[i]['brand'])+"</td><td>"+selectedData[i]['model']+"</td><td>"+generateStars(selectedData[i]['rating'],5,5,20)+"</td><td>"+Math.round(selectedData[i]['power']*selectedData[i]['time'])+"</td><td>"+Math.round(getCE(selectedData[i]['power']*selectedData[i]['time']))+"</td><td>"+Math.round(selectedData[i]['power']*0.76*selectedData[i]['time'])+"</td></tr>")
							//$("#data-table").append("<tr><td><input type='checkbox' checked onchange='toggleData(\""+selectedData[i]['unique_id']+"\")'/></td><td>"+selectedData[i]['cg']+"</td><td>"+selectedData[i]['brand']+"</td><td>"+selectedData[i]['model']+"</td><td>"+generateStars(moData[0][selectedData[i]['rating'],5,5,20)+"</td><td>"+Math.round(selectedData[i]['power']*selectedData[i]['time'])+"</td><td>"+Math.round(getCE(selectedData[i]['power']*selectedData[i]['time']))+"</td><td>"+Math.round(selectedData[i]['power']*0.76*selectedData[i]['time'])+"</td></tr>");
						}
					},
					error: function(xhr, status, error) {
						$("#sd-container").html("<h1>Error Loading Data!</h1>");
						$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
					}
				});
			});
			
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
				var ctx = document.getElementById("pie-useagemakeup").getContext("2d");
				var myNewChart = new Chart(ctx).Pie(piedata);
				
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
				console.log(cgCount);
				radar["datasets"][0]["data"][0]=getCE(cgCount["ac"]);
				radar["datasets"][0]["data"][1]=getCE(cgCount["cd"]);
				radar["datasets"][0]["data"][2]=getCE(cgCount["cw"]);
				radar["datasets"][0]["data"][3]=getCE(cgCount["dw"]);
				radar["datasets"][0]["data"][4]=getCE(cgCount["ff"]);
				radar["datasets"][0]["data"][5]=getCE(cgCount["mo"]);
				radar["datasets"][0]["data"][6]=getCE(cgCount["tv"]);
				console.log(radar);
				
				
				var ctx = document.getElementById("radar-averagecompare").getContext("2d");
				var RadarChart = new Chart(ctx).Radar(radar);
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
			
			function scrollTo(elementid){
				$('html, body').animate({
                	scrollTop: $(elementid).offset().top
                })
			}
			function closeSD(){
				$("#save-dialog").html("<div id='sd-container' class='' style='padding:10px;width:calc(100% - 20px)'></div>");
				$("#save-dialog").css("display","none")
			}
			function redirectTo(url){
				window.location=url;
			}
			
			function deleteDataRequest(){
				var deleteCode="";
				$("#save-dialog").css("display","block");
				$("#sd-container").html("<h1>Delete Data</h1><p>Enter delete code:</p><input type='text' id='delete-code' class='fill-wb' value=''/>");
				$("#save-dialog").append("<div class='' style='padding:20px;background-color:#FFB8B8;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='deleteData()'>Delete</div>");
				$("#save-dialog").append("<div class='' style='padding:20px;background-color:#B0E7A7;color:#FFFFFF;text-align:center;width:calc(100% - 40px);' onclick='closeSD()'>Close Window</div>");
			}
			function deleteData(deleteCode){
				console.log("/impact/api?request=DELETE_DATA&access_id=<?php echo $_GET['access_id']; ?>&delete_code="+$("#delete-code").val());
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
		<div id="header" class="fill-w shadow-menu bc-w center-content-w bg-w" style="">
			<div class="body-width center-content-w">
				<img src="../resources/impact_logo_horizontal.png" class="" alt="logo" style="height:100px;margin:10px;"/>
			</div>
			<div class="color-g" style="background-image:url(../resources/patterns/fancypants.jpg);height:33px;">
				<ul class="center-content-h menu" style="font-size:25px;height:99%;">
					<li style="margin-left:0px" onclick="scrollTo('#header')">Home</li>
					<li onclick="scrollTo('#about')">About</li>
					<li onclick="scrollTo('#calculate')">Calculate</li>
					<li onclick="scrollTo('#results')">Results</li>
					<li class="red-highlight" onclick="deleteDataRequest()">Delete</li>
				</ul>
			</div>
		</div>
		<div class="content shadow-card" id="about">
			<h1>About</h1>
			<p>Impact helps measure your carbon emmissions and your power costs. Impact analyzes and clearly displays the results.</p>
		</div>
		<div class="content shadow-card" id="calculate">
			<h1>Calculate</h1>
			<table class="outline fill-wb" id="data-table">
				<tr class="t-ac">
					<td><b>Enabled</b></td>
					<td><b>Category</b></td>
					<td><b>Brand Name</b></td>
					<td><b>Model Number</b></td>
					<td><b>Star Rating</b></td>
					<td><b>Daily Power Useage (KWH)</b></td>
					<td><b>Daily Carbon Emissions (g)</b></td>
					<td><b>Daily Cost (AUD Cents)</b></td>
				</tr>
			</table>
		</div>
		<div class="content shadow-card clearfix" style="text-align:center;" id="results">
			<h1>Results</h1>
			<table style="width:100%;">
				<tr colspan="2">
					<h2>Breakdown of energy usage</h2>
				</tr>
				<tr>
					<td class="fill-wh">
						<canvas id="pie-useagemakeup" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top">
						This graph represents the relative amount of carbon emissions that each device produces in a day. This data shows you the path forward to cutting down your carbon emissions, by either reducing use of a certain item, or buying a better rated item.
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
						This graph represents the relative amount of carbon emissions you release compared to the average family. This data shows where abnormalities in energy usage exists, and therefore helps cut down on carbon emissions.
						<br>
						<br>
						<span style="font-size:10px">footnote: This usage and average was calculated using the <a href="https://data.gov.au/dataset/sample-household-electricity-time-of-use-data">average energy use data</a> combined with average device usage data and <a href="https://data.gov.au/dataset/energy-rating-for-household-appliances">the average energy usage by rated devices</a>.</span>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr colspan="2">
					<h2>Energy price predictions (Cents per KWH)</h2>
				</tr>
				<tr>
					<td class="fill-wh">
						<canvas id="line-price" class="s-half fill-wb"></canvas>
					</td>
					<td valign="top">
						This graph shows predicted energy costs in cents per KWH. This is an indicator of how much your devices will cost in the future (cost is in cents per kwh, not your total cost).
					</td>
				</tr>
			</table>
		</div>
		<div class="fill-w center-content shadow-card" style="background-color:#9AD6B9;color:#FFFFFF;font-size:10px;height:40px">
			<p>&copy; 2015 <a href="http://arctro.com">Arctro</a>. All rights reserved.<br/><span style="font-size:5px"><a href="http://www.abc.net.au/news/2013-07-25/australia-nuclear-future/4843498">Carbon Emissions Data</a></span></p>
		</div>
	</body>
</html>