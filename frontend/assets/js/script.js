// enable tooltip
// $('[data-toggle="tooltip"]').tooltip();

/*ini untuk Pemesanan Kendaraan*/
var pemesanan = {
    chart: {
        //bagian height dan width sudah saya atur biar pas dengan cardnya
        height: '250px',
        width: '100%',
        type: 'line',
        dropShadow: {
            enabled: true,
            top: 35,
            left: -10,
            blur: 2,
            opacity: 0.05
        },
        toolbar: {
            show: false,
        },
    },
    colors: ['#014188'],
    stroke: {
        curve: 'smooth',
        width: 3
    },
    series: [{
        data: [30, 40, 35, 50, 49]
    }],
    xaxis: {
        categories: ['Jun', 'Jul', 'Agt', 'Sept', 'Okt'],
        axisBorder: {
            show: false,
        },
        axisTicks: {
            show: false,
        },
    },
    yaxis: {
        show: false,
    },
    grid: {
        show: true,
        borderColor: '#9A9A9A',
        strokeDashArray: 5,
        xaxis: {
            lines: {
                show: true
            }
        },
        yaxis: {
            lines: {
                show: false
            }
        },
    }
}

var kendaraan = new ApexCharts(document.querySelector("#pemesanan"), pemesanan);

kendaraan.render();

/*ini untuk Pelayanan Kendaraan*/
var pelayanan = {
    chart: {
        height: 350,
        width: '100%',
        type: 'radialBar',
        offsetY: -35,
    },
    series: [90],
    stroke: {
        lineCap: "round",
    },
    fill: {
        colors: ['#FE0000']
    },
    labels: ['Tingkat Kepuasan'],
    plotOptions: {
        radialBar: {
            startAngle: -125,
            endAngle: 125,
            hollow: {
                margin: 10,
                size: '60%',
            },
            track: {
                background: '#EAEAEA',
                startAngle: -125,
                endAngle: 125,
                strokeWidth: '100%',
                margin: 10
            },
            dataLabels: {
                value: {
                    color: "#fff",
                    fontSize: '40px',
                    show: true,
                    offsetY: -25,
                    formatter: function(val) {
                        return val / 20
                    }
                },
                name: {
                    show: true,
                    color: '#fff',
                    fontSize: '12px',
                    offsetY: 16,
                },
            }
        }
    },
}

var sopir = new ApexCharts(document.querySelector("#pelayanan"), pelayanan);

sopir.render();