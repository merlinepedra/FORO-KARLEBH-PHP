<template>
  <canvas id="usersChart"></canvas>
</template>

<script>
  import Chart from 'chart.js/auto'
  export default {
    mounted() {
      this.draw()
    },

    methods: {

      draw() {
        const chart = document.getElementById('usersChart').getContext('2d')
        const data = new Chart(chart, {
          type: 'line',
          data: {
            labels: ['Pry 1', 'Pry 2', 'Pry 3', 'Pry 4'],
            datasets: [{
              data: [100, 200, 30, 400],
              backgroundColor: 'green',
            }],
          }
        })
      }
    }

  }
</script>