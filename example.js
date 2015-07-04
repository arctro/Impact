// JavaScript Document
			/*Radar Data Structure
			var data = {
			    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			    datasets: [
			        {
			            label: "My First dataset",
			            fillColor: "rgba(220,220,220,0.2)",
			            strokeColor: "rgba(220,220,220,1)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [65, 59, 90, 81, 56, 55, 40]
			        },
			        {
			            label: "My Second dataset",
			            fillColor: "rgba(151,187,205,0.2)",
			            strokeColor: "rgba(151,187,205,1)",
			            pointColor: "rgba(151,187,205,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [28, 48, 40, 19, 96, 27, 100]
			        }
			    ]
			};*/
			var data = [
			    {
			        value: 300,
			        color:"#F7464A",
			        highlight: "#FF5A5E",
			        label: "Red"
			    },
			    {
			        value: 50,
			        color: "#46BFBD",
			        highlight: "#5AD3D1",
			        label: "Green"
			    },
			    {
			        value: 50,
			        color: "#FDB45C",
			        highlight: "#FFC870",
			        label: "Yellow"
			    },
			    {
			        value: 50,
			        color: "#FDB45C",
			        highlight: "#FFC870",
			        label: "Yellow"
			    }
			];
			//INSERT INTO `impact`.`data` (`id`, `access_id`, `delete_code`, `created`) VALUES (NULL,(HEX(LAST_INSERT_ID()+100000)), '0b01b497-c834-4ab4-b3f2-2911d5a38a8a', CURRENT_TIMESTAMP)
			$(document).ready(function(){
				var ctx = document.getElementById("myChart").getContext("2d");
				var myNewChart = new Chart(ctx).Pie(data);
			});
			
			
			/*var data = [
			    {
			        value: 300,
			        color:"#F7464A",
			        highlight: "#FF5A5E",
			        label: "Red"
			    },
			    {
			        value: 50,
			        color: "#46BFBD",
			        highlight: "#5AD3D1",
			        label: "Green"
			    },
			    {
			        value: 50,
			        color: "#FDB45C",
			        highlight: "#FFC870",
			        label: "Yellow"
			    },
			    {
			        value: 50,
			        color: "#FDB45C",
			        highlight: "#FFC870",
			        label: "Yellow"
			    }
			];
			
			var radar = {
			    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
			    datasets: [
			        {
			            label: "My First dataset",
			            fillColor: "rgba(220,220,220,0.2)",
			            strokeColor: "rgba(220,220,220,1)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [65, 59, 90, 81, 56, 55, 40]
			        },
			        {
			            label: "My Second dataset",
			            fillColor: "rgba(151,187,205,0.2)",
			            strokeColor: "rgba(151,187,205,1)",
			            pointColor: "rgba(151,187,205,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [28, 48, 40, 19, 96, 27, 100]
			        }
			    ]
			};
			var bar = {
			    labels: ["January", "February", "March", "April", "May", "June", "July"],
			    datasets: [
			        {
			            label: "My First dataset",
			            fillColor: "rgba(220,220,220,0.2)",
			            strokeColor: "rgba(220,220,220,1)",
			            pointColor: "rgba(220,220,220,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(220,220,220,1)",
			            data: [65, 59, 80, 81, 56, 55, 40]
			        },
			        {
			            label: "My Second dataset",
			            fillColor: "rgba(151,187,205,0.2)",
			            strokeColor: "rgba(151,187,205,1)",
			            pointColor: "rgba(151,187,205,1)",
			            pointStrokeColor: "#fff",
			            pointHighlightFill: "#fff",
			            pointHighlightStroke: "rgba(151,187,205,1)",
			            data: [28, 48, 40, 19, 86, 27, 90]
			        }
			    ]
			};*/
			