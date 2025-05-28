<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container mt-4">
<<<<<<< HEAD
    <h3>Biểu đồ sức khỏe của <?= $this->student_name ?></h3>
=======
<h3>Biểu đồ sức khỏe của <?= $this->student_name ?></h3>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
    <canvas id="healthChart"></canvas>
</div>

<script>
<<<<<<< HEAD
const data = <?= json_encode($this->records) ?>;
const labels = data.map(r => r.month);
const height = data.map(r => r.height);
const weight = data.map(r => r.weight);
const eyesight = data.map(r => r.eye_sight);

new Chart(document.getElementById('healthChart'), {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
                label: 'Chiều cao (cm)',
                data: height,
                borderColor: 'blue',
                type: 'line',
                yAxisID: 'y'
            },
            {
                label: 'Cân nặng (kg)',
                data: weight,
                backgroundColor: 'orange',
                yAxisID: 'y1'
            },
            {
                label: 'Thị lực (độ)',
                data: eyesight,
                backgroundColor: 'green',
                yAxisID: 'y1'
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                type: 'linear',
                position: 'left',
                title: {
                    display: true,
                    text: 'Chiều cao'
                }
            },
            y1: {
                type: 'linear',
                position: 'right',
                title: {
                    display: true,
                    text: 'Cân nặng / Thị lực'
                }
            }
        }
    }
});
</script>
=======
    const data = <?= json_encode($this->records) ?>;
    const labels = data.map(r => r.year);
    const height = data.map(r => r.height);
    const weight = data.map(r => r.weight);
    const eyesight = data.map(r => r.eye_sight);

    new Chart(document.getElementById('healthChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Chiều cao (cm)',
                    data: height,
                    borderColor: 'blue',
                    type: 'line',
                    yAxisID: 'y'
                },
                {
                    label: 'Cân nặng (kg)',
                    data: weight,
                    backgroundColor: 'orange',
                    yAxisID: 'y1'
                },
                {
                    label: 'Thị lực (độ)',
                    data: eyesight,
                    backgroundColor: 'green',
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: { type: 'linear', position: 'left', title: { display: true, text: 'Chiều cao' } },
                y1: { type: 'linear', position: 'right', title: { display: true, text: 'Cân nặng / Thị lực' } }
            }
        }
    });
</script>
>>>>>>> 6896a71640fa55073e62fe11deb607bd2aa6e09a
