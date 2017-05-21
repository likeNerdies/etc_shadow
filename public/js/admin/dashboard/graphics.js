$(document).ready(function() {

  /* Donut chart: Total users per plan */
  var users = [];
  $.get('/search/totalUserPerPlan', function (data) {
    //console.log(data);
    // Converting data to the chart's format
    for (var key in data) {
      //console.log("key: " + key);
      users.push({"label":key, "value":data[key]});
    }
    //console.log(JSON.stringify(users));
    // Creating the chart
    nv.addGraph(function() {
      var chart = nv.models.pieChart()
      .x(function(d) { return d.label })
      .y(function(d) { return d.value })
      .showLabels(true)
      .labelThreshold(.05)
      .labelType("percent")
      .donut(true)
      .donutRatio(0.35)
      .color(['rgb(255, 187, 120)', 'rgb(152, 223, 138)', 'rgb(174, 199, 232)'])
      ;

      d3.select("#donut svg")
      .datum(users)
      .transition().duration(350)
      .call(chart);

      nv.utils.windowResize(chart.update);

      return chart;
    });
  });



  /* Cumulative line chart: Current year month subscribers */

  /*var subscribers = [];
  var val = [];

  var repeated, month, plan, total, cont = 0;
  $.get('/search/currentYearMonthSubs', function (data) {
  console.log(data);
  // Converting data to the chart's format
  for (var key in data) {
  for (var i in data[key]) {
  //console.log("i: " + i);
  repeated = false;
  switch(i) {
  case "month":
  month = data[key][i];
  if ((key != 0) && (month) == subscribers[subscribers.length -1].key) {
  console.log("repeated true");
  window.repeated = true;
} else {
window.repeated = false;
}
break;
case "plan_id":
plan = data[key][i];
break;
case "total":
total = data[key][i];
val.push([plan, total]);

break;
}

}
console.log(JSON.stringify(val));

console.log(window.repeated);
if (!window.repeated) {
subscribers.push({"key": month, "values": val}); // Añadimos ese mes
val = [];
} else {
console.log("else");
subscribers[subscribers.length -1].values.push(val);
}

//subscribers.push({"key": month, "values": values });
}
console.log(JSON.stringify(subscribers));
//console.log(subscribers);

// Creating the chart
/*nv.addGraph(function() {
var chart = nv.models.cumulativeLineChart()
.x(function(d) { return d[0] })
.y(function(d) { return d[1] })
.color(d3.scale.category10().range())
.useInteractiveGuideline(true)
;

/*chart.xAxis
.tickFormat(function(d) {
return d3.time.format('%x')(new Date(d))
});

chart.yAxis.tickFormat(d3.format(',.1%'));*/
/*chart.xAxis
.tickFormat(d3.format(',f'));

chart.yAxis
.tickFormat(d3.format(',.2f'));


d3.select('#subscribers svg')
.datum(subscribers)
.transition().duration(500)
.call(chart)
;

nv.utils.windowResize(chart.update);

return chart;
});*/

$.get('/search/currentYearMonthSubs', function (data) {
  console.log(data);
  var charmData=new Array();
  var proData=new Array();
  var premiumData=new Array();
  for(var i=0;i<data.length;i++){
    switch(data[i].plan_id){
      case 1:
      charmData.push(data[i].total);
      break;
      case 2:
      proData.push(data[i].total);
      break;
      case 3:
      premiumData.push(data[i].total);
      break;
    }
  }
  console.log(charmData)
  $('#subscribers').highcharts({
    title: {
      text: 'Currnt Year Monthly Subscribers',
      x: -20 //center
    },
    /* subtitle: {
    text: 'Source: etc_shadow.app',
    x: -20
  },*/
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
  },
  yAxis: {
    title: {
      text: ''
    },
    plotLines: [{
      value: 0,
      width: 1,
      color: '#808080'
    }]
  },
  tooltip: {
    valueSuffix: ' Subscribers'
  },
  legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle',
    borderWidth: 0
  },
  series: [{
    name: 'Charming',
    data: charmData
  }, {
    name: 'Pro',
    data: proData
  }, {
    name: 'Premium',
    data: premiumData
  }]
});
});





});
