import ApexCharts from "apexcharts";

$(async function () {
    let chartOptionsOverview = {
        series: [
            { name: "Curah Hujan:", data: [28, 50, 98, 77, 65] },
            { name: "Tinggi Muka Air:", data: [60, 30, 100, 87, 91] },
            { name: "Klimatologi:", data: [10, 34, 47, 90, 66] },
            { name: "Kualitas Air:", data: [10, 5, 15, 40, 50] },
        ],

        chart: {
            type: "bar",
            height: 345,
            offsetX: -15,
            toolbar: { show: true },
            foreColor: "#adb0bb",
            fontFamily: "inherit",
            sparkline: { enabled: false },
        },

        colors: ["#5D87FF", "#49BEFF", "#fd7e14", "#13DEB9"],

        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "35%",
                borderRadius: [6],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
            },
        },
        markers: { size: 0 },

        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false,
        },

        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },

        xaxis: {
            type: "category",
            categories: ["16/08", "17/08", "18/08", "19/08", "20/08"],
            labels: {
                style: { cssClass: "grey--text lighten-2--text fill-color" },
            },
        },

        yaxis: {
            show: true,
            min: 0,
            max: 100,
            tickAmount: 4,
            labels: {
                style: {
                    cssClass: "grey--text lighten-2--text fill-color",
                },
            },
        },
        stroke: {
            show: true,
            width: 3,
            lineCap: "butt",
            colors: ["transparent"],
        },

        tooltip: { theme: "light" },

        responsive: [
            {
                breakpoint: 600,
                options: {
                    plotOptions: {
                        bar: {
                            borderRadius: 3,
                        },
                    },
                },
            },
        ],
    };
    let chartOverview = new ApexCharts(
        document.querySelector("#chart"),
        chartOptionsOverview,
    );
    await chartOverview.render();

    let chartOptionsLaporan = {
        color: "#adb5bd",
        series: [1, 1, 1, 1],
        labels: ["00:00-06:00", "06:15-12:00", "12:15-18:00", "18:15-23:45"],
        chart: {
            width: 180,
            type: "donut",
            fontFamily: "Plus Jakarta Sans', sans-serif",
            foreColor: "#adb0bb",
        },
        plotOptions: {
            pie: {
                startAngle: 0,
                endAngle: 360,
                donut: {
                    size: "75%",
                },
            },
        },
        stroke: {
            show: false,
        },

        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false,
        },
        colors: ["#5D87FF", "#FA896B", "#FA896B", "#FA896B"],

        responsive: [
            {
                breakpoint: 991,
                options: {
                    chart: {
                        width: 150,
                    },
                },
            },
        ],
        tooltip: {
            theme: "dark",
            fillSeriesColor: false,
        },
    };
    let chartLaporan = new ApexCharts(
        document.querySelector("#breakup"),
        chartOptionsLaporan,
    );
    await chartLaporan.render();
});
