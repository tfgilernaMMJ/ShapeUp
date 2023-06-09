const trainings = document.querySelector('.countTrainings').value;
const exercises = document.querySelector('.countExercise').value;
const diets = document.querySelector('.countDiets').value;
  if(trainings === '0' && exercises === '0' && diets === '0'){
    circularGraficData = [100];
  }else {
    circularGraficData = [trainings,exercises,diets];
  }

/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const pieConfig = {
  type: 'doughnut',
  data: {
    datasets: [
      {
        data: circularGraficData,
        /**
         * These colors come from Tailwind CSS palette
         * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
         */
        backgroundColor: circularGraficData.length === 1 ? ['red'] : ['#0694a2', '#00d35b', '#5fcf90'],
        label: 'Dataset 1',
      },
    ],
    labels: circularGraficData.length === 1 ? ['Sin datos'] :  ['Entrenamientos', 'Ejercicios', 'Dietas'],
  },
  options: {
    responsive: true,
    cutoutPercentage: 80,
    /**
     * Default legends are ugly and impossible to style.
     * See examples in charts.html to add your own legends
     *  */
    legend: {
      display: false,
    },
  },
}

// change this to the id of your chart element in HMTL
const pieCtx = document.getElementById('pie')
window.myPie = new Chart(pieCtx, pieConfig)
