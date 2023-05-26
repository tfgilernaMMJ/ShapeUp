const followersByMonth = document.querySelector('.followers-by-month').value;
const usersParsed = JSON.parse(followersByMonth);
const months = Object.keys(usersParsed);
let metric = new Array(12).fill(0);

for (let i = 0; i < months.length; i++) {
  const monthIndex = parseInt(months[i]) - 1; // Restamos 1 para que enero tenga índice 0
  metric[monthIndex] = usersParsed[months[i]].length;
}

if(followersByMonth === 0){
  metric = 0;
}

const followersDietByMonth = document.querySelector('.followersDiet-by-month').value;
const dietsParsed = JSON.parse(followersDietByMonth);
const monthsDiets = Object.keys(dietsParsed);
let metricDiets = new Array(12).fill(0);

for (let i = 0; i < monthsDiets.length; i++) {
  const monthIndex = parseInt(monthsDiets[i]) - 1; // Restamos 1 para que enero tenga índice 0
  metricDiets[monthIndex] = dietsParsed[monthsDiets[i]].length;
}

if(followersDietByMonth === 0){
  metricDiets = 0;
}


const followersTrainingByMonth = document.querySelector('.followersTraining-by-month').value;
const trainingsParsed = JSON.parse(followersTrainingByMonth);
const monthsTraining = Object.keys(trainingsParsed);
let metricTrainings = new Array(12).fill(0);

for (let i = 0; i < monthsTraining.length; i++) {
  const monthIndex = parseInt(monthsTraining[i]) - 1; // Restamos 1 para que enero tenga índice 0
  metricTrainings[monthIndex] = trainingsParsed[monthsTraining[i]].length;
}
console.log(usersParsed,dietsParsed,trainingsParsed);
if(followersTrainingByMonth === 0){
  metricTrainings = 0;
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
        label: 'Seguidores',
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: metric !== 0 ? '#0694a2' : 'red' ,
        borderColor: metric !== 0 ? '#0694a2' : 'red',
        data: metric !== 0 ? metric : [0,0,0,0,0,0,0,0,0,0,0,0],
        fill: false,
      },
      {
        label: 'Me gustas (Dietas)',
        fill: false,
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: metricDiets !== 0 ? '#7e3af2' : 'red',
        borderColor: metricDiets !== 0 ? '#7e3af2' : 'red',
        data: metricDiets !== 0 ? metricDiets : [0,0,0,0,0,0,0,0,0,0,0,0],
      },
      {
        label: 'Me gustas (Entrenamientos)',
        fill: false,
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: metricTrainings !== 0 ? '##1c64f2' : 'red',
        borderColor: metricTrainings !== 0 ? '##1c64f2' : 'red',
        data: metricTrainings !== 0 ? metricTrainings : [0,0,0,0,0,0,0,0,0,0,0,0],
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
