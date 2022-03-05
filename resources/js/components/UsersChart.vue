<template>
  <canvas id="usersChart"></canvas>
</template>

<script>
  import Chart from 'chart.js/auto'
  export default {
    props: [
      'users',
      'posts',
      'comments',
      'files',
      'admins',
      'categories',
      'likes',
    ],

    mounted() {
      this.draw()
    },

    methods: {

      draw() {
        const chart = document.getElementById('usersChart').getContext('2d')
        const data = new Chart(chart, {
          type: 'bar',
          data: {
            labels: ['Users', 'Posts', 'Comments', 'Files', 'Admins', 'categories', 'Likes'],
            datasets: [{
              labels: "Overview",
              data: [this.users, this.posts, this.comments, this.files, this.admins, this.categories, this.likes],
              backgroundColor: [
              'rgba(255,99,132,.6)', 
              'rgba(54,162,235,.6)', 
              'rgba(255,206,86.6)', 
              'rgba(75,19,192,.6)', 
              'rgba(153,102,255,.6)', 
              'rgba(255,159,64,.6)', 
              'rgba(255,99,132,.6'
              ],
            }],
          },
          options: {
            scales: {
              x: {
                grid: {
                  display: false
                }
              },
              y: {
                grid: {
                  display: false
                }
              }
            }
          }
        })
      }
    }

  }
</script>