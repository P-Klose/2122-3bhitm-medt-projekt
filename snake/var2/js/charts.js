let OutCharts = document.getElementsByClassName('myCharts');

let chartData;
let chartLabels = new Array();

var url = './php/chartData.php';
var formData = new FormData();
formData.append('userid', userid);

fetch(url, { method: 'POST', body: formData })
    .then(function(response) {
        return response.text();
    })
    .then(function(body) {
        chartData = JSON.parse(body).map(Number);
        for (let index = 0; index < chartData.length - 1; index++) {
            chartLabels.push("recent");
        }
        chartLabels.push("latest");
        let myCharts = new Chart(OutCharts[0], {
            type: 'bar',
            data: {
                datasets: [{
                    label: "Scores",
                    data: chartData,
                    backgroundColor: "rgb(255,255,255)"
                }],
                labels: chartLabels
            },
            options: {
                plugins: {
                    filler: {
                        propagate: false,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });