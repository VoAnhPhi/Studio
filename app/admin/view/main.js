// Biểu đồ đường - Revenue Chart
const labels = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];
const revenueData = [10, 30, 5, 60, 90, 30, 70, 20, 40, 80, 50, 100];

const lineCtx = document.getElementById("revenueChart").getContext("2d");
new Chart(lineCtx, {
  type: "line",
  data: {
    labels: labels,
    datasets: [
      {
        label: "Revenue",
        data: revenueData,
        borderColor: "rgba(38, 154, 255, 1)",
        backgroundColor: "rgba(38, 154, 255, 0.1)",
        borderWidth: 1,
        fill: true,
        tension: 0.4,
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 20,
          callback: (value) => value + "tr",
          font: { size: 16, weight: 500 },
          color: "#333",
        },
      },
      x: {
        ticks: {
          font: { size: 16, weight: 500 },
          color: "#333",
        },
      },
    },
  },
});

// Biểu đồ tròn - Application Status Chart
const pieCtx = document.getElementById("pieChart").getContext("2d");

const pieData = {
  labels: [
    "Victoria Phan Thiet Studio",
    "The Sailing Bay Studio",
    "Le House Boutique Studio",
    "Four Seasons Studio",
  ],
  datasets: [
    {
      data: [10, 50, 30, 15],
      backgroundColor: ["#fdd835", "#42a5f5", "#f44336", "#ff9800"],
      borderWidth: 0,
    },
  ],
};

new Chart(pieCtx, {
  type: "pie",
  data: pieData,
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false, // Không hiển thị legend mặc định
      },
      tooltip: {
        callbacks: {
          label: (context) => `${context.label}: ${context.raw}%`,
        },
      },
    },
  },
});

const barCtx = document.getElementById("barChart").getContext("2d");
const barData = {
  labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
  datasets: [
    {
      label: "Dịch vụ thuê phòng",
      data: [15, 25, 30, 35, 30, 25, 20, 25, 30, 35, 30, 40],
      backgroundColor: "#E0F7FF",
    },
    {
      label: "Dịch vụ chụp ảnh",
      data: [20, 30, 35, 40, 35, 30, 25, 30, 35, 40, 35, 45],
      backgroundColor: "#FFE2E0",
    },
    // {
    //     label: "Category C",
    //     data: [25, 35, 40, 45, 40, 35, 30, 35, 40, 45, 40, 50],
    //     backgroundColor: "#FFF6C6",
    // },
  ],
};

const barConfig = {
  type: "bar",
  data: barData,
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: "top",
        labels: {
          font: {
            size: 14,
          },
        },
      },
    },
    scales: {
      x: {
        grid: {
          display: false,
        },
        ticks: {
          font: {
            size: 12,
          },
          color: "#333",
        },
      },
      y: {
        beginAtZero: true,
        ticks: {
          stepSize: 10,
          font: {
            size: 12,
          },
          color: "#333",
        },
        grid: {
          color: "#e0e0e0",
        },
      },
    },
  },
};

new Chart(barCtx, barConfig);
