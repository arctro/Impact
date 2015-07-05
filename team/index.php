<?php

?>

<html>
  <head>
    <title>Impact - Team</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../style.css"/>
    <link rel="shortcut icon" href="../resources/favicon/favicon.ico" type="image/x-icon"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      function scrollTo(elementid){
        $('html, body').animate({
          scrollTop: $(elementid).offset().top
        })
      }

      function redirectTo(url){
				window.location=url;
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
					<li onclick="scrollTo('#about')">About</li>
          <li onclick="scrollTo('#tutorial')">Tutorial</li>
				</ul>
			</div>
		</div>

    <div class="content shadow-card" id="about">
			<h1>About</h1>
			<table>
        <tr>
          <td><img src="../resources/team/ben.jpg" alt="" style="height:300px;border-radius:100%;"/></td>
          <td valign="top">
            <h1 style="text-align:center;">Ben</h1>
            Ben has been competiting hackathons since 2014 and programming since 2008. He has entered competitions such as:
            <ul>
              <li>Govhack 2014</li>
              <li>YICTE 2014</li>
              <li>HACT.IO 2014</li>
              <li>hs.hact.io 2015</li>
            </ul>
            You can contact Ben on twitter at <a href="http://twitter.com/thisisahandle">@thisisahandle</a>
          </td>
        </tr>

        <tr>
          <td><img src="../resources/team/jon.jpg" alt="" style="height:300px;border-radius:100%;"/></td>
          <td valign="top">
            <h1 style="text-align:center;">Jon</h1>
            Jon has been competiting in hackathons since the end of 2014 and programming since 2010.
              <ul>
                <li>HACT.IO 2014</li>
                <li>hs.hact.io 2015</li>
              </ul>
              You can contact Jon on twitter <a href="http://twitter.com/JonMcLeanDev">@JonMcLeanDev</a>
          </td>
        </tr>
      </table>
		</div>

    <div class="content shadow-card" id="impact">
      <h1>Impact</h1>
      Impact helps measure, analyze, and compare carbon emissions for household devices.
    </div>
    <div class="content shadow-card" id="tutorial">
      <h1>Tutorial</h1>
      Impact contains many features, and this tutorial will help you get the most out of it.<br/><br/>
      To input devices you first select a catagory of device. Then you must select a brand, and model, then input the estimated hours of use in a day.<br/>
      This will add the device to the results table and graphs.<br/>
      To remove a device from the graphs uncheck the enabled box<br/><br/>
      To save a set of results just press the save button at the top. A window will pop up with the save address, and a delete code. <b>It is important to store the delete code if you want to delete the results later!</b><br/><br/>
      To compare saved results go onto a save page and click compare. A window will pop up asking for an access code. Access codes are the portion of the URL after the http://arctro.com/s/&#60;Access Code&#62;.<br/>
      Entering this code will take you to another page allowing you to directly compare the two saved results.<br/><br/>
      <a href="http://arctro.com/impact/s/5e780070-e202-44ec-8c2f-5ab6398362f8">Save Example</a><br/>
      <a href="http://arctro.com/impact/c/?id1=5e780070-e202-44ec-8c2f-5ab6398362f8&id2=e5c2dd03-53de-4f6d-a9dd-ac31cdde850e">Compare Example</a>
    </div>
  </body>
</html>
