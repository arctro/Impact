<?php

?>

<html>

  <head>
    <title>Impact</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <script>
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

    var selectedValue = "";
    var data={ac:[],cd:[],cw:[],dw:[],ff:[],mo:[],tv:[]};
    var cg="";
    var sort="model";

    function getDataName(category,name){
      return key[category][name];
    }

    function scrollTo(elementid){
      $('html, body').animate({
        scrollTop: $(elementid).offset().top
      })
    }

    function redirectTo(url){
      window.location=url;
    }

    function getSelectedValue() {
      selectedValue = $('#list').val();
    }

    function sortBy(key){
      sort=key;
      clearTable();
      selectCategory();
      if(key=='model'){
        $("#model-sort").html("Model Number (s)");
        $("#brand-sort").html("Brand Name");
        $("#power-sort").html("Hourly Power Usage (KWH)");
      }
      if(key=='brand'){
        $("#model-sort").html("Model Number");
        $("#brand-sort").html("Brand Name (s)");
        $("#power-sort").html("Hourly Power Usage (KWH)");
      }
      if(key=='power'){
        $("#model-sort").html("Model Number");
        $("#brand-sort").html("Brand Name");
        $("#power-sort").html("Hourly Power Usage (KWH) (s)");
      }
    }

    function selectCategory(){
      getSelectedValue();
      clearTable();
      console.log(selectedValue);
      console.log($('#list-device-category').val());
      if($("#list-device-category").val()!=""){
        console.log($('#list-device-category').val());
        cg=$("#list-device-category").val();
        if(data[cg].length<1){
          console.log(cg);
          $.ajax({
              url: getDataName(cg,"data"),
              success: function(result) {
                data[cg]=eval(result)["result"]["records"];
                console.log(data);
                displayData();
            }
          });
        }else{
          console.log("Thing")
          displayData();
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

    function sortByKey(array, key) {
      return array.sort(function(a, b) {
        var x = a[key]; var y = b[key];
        return ((x < y) ? -1 : ((x > y) ? 1 : 0));
      });
    }

    function displayData() {
      var array = sortByKey(data[cg], getDataName(cg, sort));
      for(var i = 0; i < array.length; i++) {
        $('#data-table').append("<tr><td>" + cgToCatagory(cg) +"</td><td>" + data[cg][i][getDataName(cg, "brand")] +"</td><td>" + data[cg][i][getDataName(cg, "model")] +"</td><td>" + getPower(data[cg][i][getDataName(cg, "power")],cg) +"</td></tr>");
      }
    }

    function generateStars(rating,outof,shownum,size){
      if(typeof rating !== 'float'||typeof rating !== 'int'){
        rating=parseFloat(rating);
        if(typeof rating === 'undefined'){
          return "<img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/><img src='http://arctro.com/toiletsact/resources/empty.png' style='float:left;height:"+size+"px;' align='middle'/>";
        }
      }
    }

    function safeParseFloat(str){
      if(str!=""){
        return parseFloat(str);
      }else{
        return 0;
      }
    }

    function clearTable() {
      var table = $("#data-table");
      table.html("<tr class='t-ac'><td><b>Category</b></td><td id='brand-sort' onclick='sortBy(\"brand\")'><b>Brand Name</b></td><td id='model-sort' onclick='sortBy(\"model\")'><b>Model Number (s)</b></td><td id='power-sort' onclick='sortBy(\"power\")'><b>Hourly Power Useage (KWH)</b></td></tr>");
    }

    function safeDivide(num,divide){
      if(divide==0||num==0){
        return 0;
      }
      return num/divide;
    }

    function getPower(num,cg){
      if(data[cg]["kwh"]){
        return safeDivide(num,365);
      }
      return num;
    }
    </script>

  </head>
  <body>

  <div id="header" class="fill-w shadow-menu bc-w center-content-w bg-w" style="">
    <div class="body-width center-content-w">
      <img src="../resources/impact_logo_horizontal.png" class="" alt="logo" style="height:100px;margin:10px;"/>
    </div>
    <div class="color-g" style="background-image:url(../resources/patterns/fancypants.jpg);height:33px;">
      <ul class="center-content-h menu" style="font-size:25px;height:99%;">
        <li style="margin-left:0px" onclick="redirectTo('http://arctro.com/impact/')">Home</li>
        <li onclick="scrollTo('#list')">List</li>
      </ul>
    </div>
  </div>

  <div class="content shadow-card" id="list">
    <h1>List</h1>
    <select id="list-device-category" class="fill-wb" onchange="selectCategory()">
      <option value="">Select a device category</option>
      <option value="ac">Air Conditioners</option>
      <option value="cd">Clothes Dryers</option>
      <option value="cw">Clothes Washers</option>
      <option value="dw">Dish Washers</option>
      <option value="ff">Fridges/Freezers</option>
      <option value="mo">Monitors</option>
      <option value="tv">Televisions</option>
    </select>

    <table class="outline fill-wb table-style" id="data-table">
      <tr class="t-ac">
        <td><b>Category</b></td>
        <td id='brand-sort' onclick="sortBy('brand')"><b>Brand Name</b></td>
        <td id='model-sort' onclick="sortBy('model')"><b>Model Number (s)</b></td>
        <td id='power-sort' onclick="sortBy('power')"><b>Hourly Power Useage (KWH)</b></td>
      </tr>
    </table>
  </div>

  </body>

</html>
