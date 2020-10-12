
/**
* Theme: Uplon Admin Template
* Author: Coderthemes
* Morris Chart
*/

!function($) {
    "use strict";

    var MorrisCharts = function() {};


    //creates Bar chart
    MorrisCharts.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            hideHover: 'auto',
            resize: true, //defaulted to true
            gridLineColor: '#eeeeee',
            barSizeRatio: 0.4,
            xLabelAngle: 35,
            barColors: lineColors
        });
    },
    //creates line chart
    MorrisCharts.prototype.createLineChart = function(element, data, xkey, ykeys, labels, opacity, Pfillcolor, Pstockcolor, lineColors) {
      var months = ["ΙΑΝ", "ΦΕΒ", "ΜΑΡ", "ΑΠΡ", "ΜΑΙ", "ΙΟΥΝ", "ΙΟΥΛ", "ΑΥΓ", "ΣΕΠ", "ΟΚΤ", "ΝΟΕ", "ΔΕΚ"];
        Morris.Line({
          element: element,
          data: data,
          xkey: xkey,
          ykeys: ykeys,
          labels: labels,
          fillOpacity: opacity,
          pointFillColors: Pfillcolor,
          pointStrokeColors: Pstockcolor,
          behaveLikeLine: true,
          gridLineColor: '#eef0f2',
          hideHover: 'auto',
          lineWidth: '3px',
          pointSize: 0,
          //preUnits: '$',
          resize: true, //defaulted to true
          lineColors: lineColors,
          xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
            var month = months[x.getMonth()];
            return month;
          },
          dateFormat: function(x) {
            var month = months[new Date(x).getMonth()];
            return month;
          },
        });
    },
    //creates Donut chart
    MorrisCharts.prototype.createDonutChart = function(element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true, //defaulted to true
            colors: colors
        });
    },

    MorrisCharts.prototype.init = function() {


        //creating bar chart
        var $barData  = [
            { y: 'ΙΑΝ', a: 100, b: 90  },
            { y: 'ΦΕΒ', a: 75,  b: 65  },
            { y: 'ΜΑΡ', a: 50,  b: 40  },
            { y: 'ΑΠΡ', a: 75,  b: 65  },
            { y: 'ΜΑΙ', a: 50,  b: 40  },
            { y: 'ΙΟΥΝ', a: 75,  b: 65  },
            { y: 'ΙΟΥΛ', a: 100, b: 90  },
            { y: 'ΑΥΓ', a: 100, b: 90  },
            { y: 'ΣΕΠ', a: 100, b: 90  },
            { y: 'ΟΚΤ', a: 100, b: 90  },
            { y: 'ΝΟΕ', a: 100, b: 90  },
            { y: 'ΔΕΚ', a: 100, b: 90  }
        ];
        this.createBarChart('morris-bar-example', $barData, 'y', ['a', 'b'], ['Παραγώμενα Τεμάχια', 'Αναμενόμενα Τεμάχια'], ['#3db9dc', "#ff5d48"]);

        //create line chart


        var $data  = [
             { y: '2008-01', a: 50, b: 0 },
            { y: '2008-02', a: 75, b: 50 },
            { y: '2008-03', a: 30, b: 80 },
            { y: '2008-04', a: 50, b: 50 },
            { y: '2008-05', a: 75, b: 10 },
            { y: '2008-06', a: 50, b: 40 },
            { y: '2008-07', a: 75, b: 50 },
            { y: '2008-08', a: 100, b: 70 },
            { y: '2008-09', a: 100, b: 70 },
            { y: '2008-10', a: 100, b: 70 },
            { y: '2008-11', a: 100, b: 70 },
            { y: '2008-12', a: 100, b: 70 }
          ];
        this.createLineChart('morris-line-example', $data, 'y', ['a', 'b'], ['Μεμονομένα συμβάντα', 'Πολλαπλά συμβάντα'],['0.1'],['#ffffff'],['#999999'], ['#1bb99a', '#f1b53d']);

        //creating donut chart
        var $donutData = [
                {label: "SVP B", value: 80},
                {label: "ROMMELAG A", value: 75},
                {label: "JOUHSEN", value: 72}
            ];
        this.createDonutChart('morris-donut-example', $donutData, ['#f1b53d', '#9261c6', "#ff7aa3"]);
    },
    //init
    $.MorrisCharts = new MorrisCharts, $.MorrisCharts.Constructor = MorrisCharts
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.MorrisCharts.init();
}(window.jQuery);
