const LCHART = document.getElementById("line-chart");

let lineChart = new Chart(LCHART, {
  type: "line",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "Jun",
      "Jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        label: "Revenue",
        data: [65, 59, 80, 81, 56, 55, 40, 20, 56, 80, 34, 68],
        fill: false,
        borderColor: "rgb(75, 192, 192)",
        tension: 0.1,
      },
    ],
  },
});

const PCHART = document.getElementById("pie-chart");

let pieChart = new Chart(PCHART, {
  type: "pie",
  data: {
    labels: ["ATM", "COD"],
    datasets: [
      {
        label: "My First Dataset",
        data: [50, 100],
        backgroundColor: ["rgb(54, 162, 235)", "rgb(255, 205, 86)"],
        hoverOffset: 4,
      },
    ],
  },
});
