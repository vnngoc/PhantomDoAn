
const ctx = document.getElementById('viewsChart');
		new Chart(ctx, {
		type: 'line',
		data: {
			labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Nigg'],
			datasets: [{
			label: '# of Votes',
			data: [12, 19, 3, 5, 2, 3, 6],
			backgroundColor:['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Nigg'],
			borderWidth: 1,
			borderColor: ['black']
			}]
		},
		options: {
			maintainAspectRatio:false,
			responsive:true
			}
		});
	// ----------------------------------------------------
const CategoryLabel = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Nigg'];
const CategoryData = [12, 19, 3, 5, 2, 3, 6];
const ctx2 = document.getElementById('catergoryChart');
		new Chart(ctx2, {
		type: 'pie',
		data: {
			labels: CategoryLabel,
			datasets: [{
			label: '# of Votes',
			data: CategoryData,
			backgroundColor:['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange','Nigg'],
			borderWidth: 1,
			borderColor: ['black']
			}]
		},
		options: {
			maintainAspectRatio:false,
			responsive:true
			}
		});