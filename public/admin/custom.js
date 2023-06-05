
var statusParents;
$('.btnReadMore').on('click',function() {
  $(this).parent('span').parent('.des_div').find('.des_more').toggleClass('readMore');
  $(this).parent('span').parent('.des_div').find('.description').toggleClass('readless');
});
$('.deleteCategory').on('click', function (e) {
  e.preventDefault();
  let id = $(this).data('id');
  let parentElement = $(this).parents("tr");
  $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "admin/categoryDelete",
    data: { id: id },
    success: function (data) {
      if (data == 'true') {
        parentElement.remove();
        $('#deleteErorr').empty();
      } else {
        $('#deleteErorr').text('category Not delete')
      }

    }
  });
  return false;
})
$('.deleteProduct').on('click', function (e) {
  e.preventDefault();
  let id = $(this).data('id');
  let parentElement = $(this).parents("tr");
  $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "admin/productDelete",
    data: { id: id },
    success: function (data) {
      if (data == 'true') {
        parentElement.remove();
        $('#deleteErorr').empty();
      } else {
        $('#deleteErorr').text('category Not delete')
        console.log(data);
      }

    }
  });
  return false;
});

$('.btnUpdateStatus').on('click', function (e) {
  $('#updateStatusModal').modal('show')
  let id = $(this).data('id');
  statusParents = $(this);
  $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "admin/updateStatus",
    data: { id: id },
    success: function (data) {
      let status = JSON.parse(data);
      $('#updateStatus').val(status['orderStatus']);
      $('#updateStatusId').val(status['id']);
    }
  });
  return false;
});
$('#btnUpdateSave').on('click', function (e) {
  let UpdateValue = $(updateStatus).val();
  let UpdateId = $(updateStatusId).val();
  $.ajax({
    type: "POST",
    cache: false,
    url: baseUrl + "admin/updateStatusSave",
    data: { id: UpdateId, value: UpdateValue },
    success: function (data) {
      if (data == 'false') {
        console.log(statusParents);
        $('#updateStatusError').text("Please Enter values ​​only: Pending, Accepted, Out of Delivery, Delivered ");
      } else {
        $('#updateStatusModal').modal('hide');
        statusParents.parents("tr").find(':nth-child(3)').text(data);
      }
    }
  });
  return false;
});


var xValues = ["Firefox", "Opera Mini", "Chrome", "Google"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart1", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: ""
    }
  }
});


function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

var xValues = [];
var yValues = [];
generateData("Math.sin(x)", 0, 10, 0.5);

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      pointRadius: 2,
      borderColor: "rgba(0,0,255,0.5)",
      data: yValues
    }]
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      text: "",
      fontSize: 16
    }
  }
});
function generateData(value, i1, i2, step = 1) {
  for (let x = i1; x <= i2; x += step) {
    yValues.push(eval(value));
    xValues.push(x);
  }
}

// A point click event that uses the Renderer to draw a label next to the point
// On subsequent clicks, move the existing label instead of creating a new one.
Highcharts.addEvent(Highcharts.Point, 'click', function () {
  if (this.series.options.className.indexOf('popup-on-click') !== -1) {
    const chart = this.series.chart;
    const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
    const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

    const anchorX = this.plotX + this.series.xAxis.pos;
    const anchorY = this.plotY + this.series.yAxis.pos;
    const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
    const x = align === 'left' ? anchorX + 10 : anchorX - 10;
    const y = anchorY - 30;
    if (!chart.sticky) {
      chart.sticky = chart.renderer
        .label(text, x, y, 'callout', anchorX, anchorY)
        .attr({
          align,
          fill: 'rgba(0, 0, 0, 0.75)',
          padding: 10,
          zIndex: 7 // Above series, below tooltip
        })
        .css({
          color: 'white'
        })
        .on('click', function () {
          chart.sticky = chart.sticky.destroy();
        })
        .add();
    } else {
      chart.sticky
        .attr({ align, text })
        .animate({ anchorX, anchorY, x, y }, { duration: 250 });
    }
  }
});


Highcharts.chart('container', {

  chart: {
    scrollablePlotArea: {
      minWidth: 700
    }
  },

  data: {
    csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
    beforeParse: function (csv) {
      return csv.replace(/\n\n/g, '\n');
    }
  },

  title: {
    text: 'Daily sessions at www.highcharts.com'
  },

  subtitle: {
    text: 'Source: Google Analytics'
  },

  xAxis: {
    tickInterval: 7 * 24 * 3600 * 1000, // one week
    tickWidth: 0,
    gridLineWidth: 1,
    labels: {
      align: 'left',
      x: 3,
      y: -3
    }
  },

  yAxis: [{ // left y axis
    title: {
      text: null
    },
    labels: {
      align: 'left',
      x: 3,
      y: 16,
      format: '{value:.,0f}'
    },
    showFirstLabel: false
  }, { // right y axis
    linkedTo: 0,
    gridLineWidth: 0,
    opposite: true,
    title: {
      text: null
    },
    labels: {
      align: 'right',
      x: -3,
      y: 16,
      format: '{value:.,0f}'
    },
    showFirstLabel: false
  }],

  legend: {
    align: 'left',
    verticalAlign: 'top',
    borderWidth: 0
  },

  tooltip: {
    shared: true,
    crosshairs: true
  },

  plotOptions: {
    series: {
      cursor: 'pointer',
      className: 'popup-on-click',
      marker: {
        lineWidth: 1
      }
    }
  },

  series: [{
    name: 'All sessions',
    lineWidth: 4,
    marker: {
      radius: 4
    }
  }, {
    name: 'New users'
  }]
});




