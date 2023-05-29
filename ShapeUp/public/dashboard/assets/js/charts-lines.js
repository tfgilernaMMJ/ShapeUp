const usersByMonth = document.querySelector('.user-by-month').value;
const usersParsed = JSON.parse(usersByMonth);
const months = Object.keys(usersParsed);
let metric = new Array(12).fill(0);

for (let i = 0; i < months.length; i++) {
  const monthIndex = parseInt(months[i]) - 1; // Restamos 1 para que enero tenga índice 0
  metric[monthIndex] = usersParsed[months[i]].length;
}

if(usersByMonth === 0){
  metric = 0;
}


const usersByMonthSus = document.querySelector('.user-by-monthSus').value;
const usersSusParsed = JSON.parse(usersByMonthSus);
const monthsSus = Object.keys(usersSusParsed);
let metricSus = new Array(12).fill(0);

for (let i = 0; i < monthsSus.length; i++) {
  const monthIndex = parseInt(monthsSus[i]) - 1; // Restamos 1 para que enero tenga índice 0
  metricSus[monthIndex] = usersSusParsed[monthsSus[i]].length;
}

/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const lineConfig = {
  type: 'line',
  data: {
    labels: ['Enero', 'Febrero', 'Marza', 'Abril', 'Mayo', 'Junio', 'July','Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    datasets: [
      {
        label: 'Usuarios SuperShapeUp',
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: metricSus !== 0 ? '#0694a2' : 'red' ,
        borderColor: metricSus !== 0 ? '#0694a2' : 'red',
        data: metricSus !== 0 ? metricSus : [0,0,0,0,0,0,0,0,0,0,0,0],
        fill: false,
      },
      {
        label: 'Usuarios',
        fill: false,
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: metric !== 0 ? '#5fcf90' : 'red',
        borderColor: metric !== 0 ? '#5fcf90' : 'red',
        data: metric !== 0 ? metric : [0,0,0,0,0,0,0,0,0,0,0,0],
      },
    ],
  },
  options: {
    responsive: true,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
    tooltips: {
      mode: 'index',
      intersect: false,
    },
    hover: {
      mode: 'nearest',
      intersect: true,
    },
    scales: {
      x: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Month',
        },
      },
      y: {
        display: true,
        scaleLabel: {
          display: true,
          labelString: 'Value',
        },
      },
    },
  },
}

// change this to the id of your chart element in HMTL
const lineCtx = document.getElementById('line')
window.myLine = new Chart(lineCtx, lineConfig)
