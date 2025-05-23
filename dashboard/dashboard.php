     <?php
    require "../koneksi.php";
    require "../template/header.php";
    require "../template/navbar.php";
    require "../template/sidebar.php";
     $title ="user baru - rekam medis";

    ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100"> 
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
    align-items-center pt-3 pb-2 mb-3 border-bottom">
    
<h1 class="h2">Dashboard</h1> 
<div class="btn-toolbar mb-2 mb-md-0"> 
    <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
         <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> 
        </div>
         <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1"> 
            <svg class="bi" aria-hidden="true"><use xlink:href="#calendar3"/></svg> 
            This week
</button>
 </div> 
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <canvas id="myChart" width="900" height="380"></canvas>
<script>
  const ctx = document.getElementById('myChart').getContext('2d');

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      datasets: [{
        label: 'Visits',
        data: [15000, 22000, 19000, 24000, 21000, 24000, 15500],
        borderColor: '#007bff',
        backgroundColor: 'transparent',
        tension: 0.3,
        pointBackgroundColor: '#007bff',
        pointBorderColor: '#fff',
        pointHoverRadius: 7
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: false,
          ticks: {
            callback: function(value) {
              return value.toLocaleString();
            }
          }
        }
      },
      plugins: {
        legend: {
          display: false
        }
      }
    }
  });
</script>

</main> 
<?php

 require "../template/footer.php";
?>
