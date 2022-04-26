<template>
  <div class="dark:text-gray-200">
    <canvas id="doughnut"></canvas>
  </div>
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
        chart.defaultFontColor = 'White'
        const data = new Chart(chart, {
          type: 'doughnut',
          data: {
            labels: ['Posts', 'Comments'],
            color: 'white',
            datasets: [{
              label: "Activities",
              data: [this.posts, this.comments],
              backgroundColor: [
              'rgba(54,162,235,.6)', 
              'rgba(255,206,86.6)', 
              ],
            }],
          },
          options: {
            responsive: true,
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