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



  /* Cumulative line chart: Current year month subscribers

  var subscribers = [{"key": , "values": [[]]}];
  $.get('/search/currentYearMonthSubs', function (data) {
    console.log(data);
    // Converting data to the chart's format
    for (var key in data) {
      for (var i in data[key]) {
        //console.log("i: " + i);
        switch(i) {
          case "month":
            var month = data[key][i];
            break;
          case "plan_id":
            var plan = data[key][i];
            break;
          case "total":
            var total = data[key][i];
        }
        s//ubscribers.push({"key": month, "values": [[plan, total]]});
      }

    }
    console.log(JSON.stringify(subscribers));

    // Creating the chart
    nv.addGraph(function() {
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
    });





  });*/

});
