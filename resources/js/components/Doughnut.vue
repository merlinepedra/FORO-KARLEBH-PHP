<template>
  <canvas id="doughnut"></canvas>
</template>

<script>
  import Chart from 'chart.js/auto'
  export default {
    props: [
      'posts',
      'comments',
    ],

    mounted() {
      this.draw()
    },

    methods: {

      draw() {
        const chart = document.getElementById('doughnut').getContext('2d')
        const data = new Chart(chart, {
          type: 'doughnut',
          data: {
            labels: ['Posts', 'Comments'],
            datasets: [{
              labels: "Overview",
              data: [this.posts, this.comments],
              backgroundColor: [
              'rgba(255,99,132,.6)', 
              'rgba(54,162,235,.6)', 
              ],
            }],
          },
          options: {
            // plugins: {legend: {display: false},},
            scales: {
              y: {display: false},
              x: {display: false}
            }
          }
        })
      }
    }

  }
</script>