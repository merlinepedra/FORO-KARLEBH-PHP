<template>
	<div>
		from chartjs
		<canvas id="myChart"></canvas>
	</div>
</template>

<script>
	import Chart from 'chart.js/auto'
	export default {
		mounted() {
			this.draw()
		},
		methods: {
			draw() {
				const chart = document.getElementById('myChart').getContext('2d')
				const data = new Chart(chart, {
					type: 'bar',
					data: {
						labels: ['Pry 1', 'Pry 2', 'Pry 3', 'Pry 4'],
						datasets: [{
							// label: 'Classes',
							data: [100, 200, 300, 400],
							backgroundColor: 'green',
						}],
					}
				})
			}
		}
		
	}
</script>