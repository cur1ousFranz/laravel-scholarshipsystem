// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["8000", "12000", "16000", "20000", "24000"],
    datasets: [{
      data: applicantFamilyIncome,
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#fc5130'],
    }],
  },
});
