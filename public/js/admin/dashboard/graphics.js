$(document).ready(function() {

var datum = [];

  //function getDonutData() {
    /*var datum =  [
      {
        "label": "One",
        "value" : 29.765957771107
      } ,
      {
        "label": "Two",
        "value" : 0
      } ,
      {
        "label": "Three",
        "value" : 32.807804682612
      } ,
      {
        "label": "Four",
        "value" : 196.45946739256
      } ,
      {
        "label": "Five",
        "value" : 0.19434030906893
      } ,
      {
        "label": "Six",
        "value" : 98.079782601442
      } ,
      {
        "label": "Seven",
        "value" : 13.925743130903
      } ,
      {
        "label": "Eight",
        "value" : 5.1387322875705
      }
]*/



    $.get('/search/totalUserPerPlan', function (data) {
          console.log(data);
          /* Converting data to the chart's format */
          for (var key in data) {
            console.log("key: " + key);
            datum.push({"label":key, "value":data[key]});
          }
          console.log(JSON.stringify(datum));
          // Creating the chart
          nv.addGraph(function() {
            var chart = nv.models.pieChart()
                .x(function(d) { return d.label })
                .y(function(d) { return d.value })
                .showLabels(true)     //Display pie labels
                .labelThreshold(.05)  //Configure the minimum slice size for labels to show up
                .labelType("percent") //Configure what type of data to show in the label. Can be "key", "value" or "percent"
                .donut(true)          //Turn on Donut mode. Makes pie chart look tasty!
                .donutRatio(0.35)     //Configure how big you want the donut hole size to be.
                .color(['rgb(255, 187, 120)', 'rgb(152, 223, 138)', 'rgb(174, 199, 232)'])
                ;

              d3.select("#donut svg")
                  .datum(datum)
                  .transition().duration(350)
                  .call(chart);

                  nv.utils.windowResize(chart.update);

            return chart;
          });

          //console.log(JSON.stringify(datum));
        });



    //});
  //}

  //getDonutData();

});
