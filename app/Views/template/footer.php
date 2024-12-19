<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php if (isset($clients)): ?>
  <script>
    const ctx = document.getElementById('clientsChart').getContext('2d');
    const testData = {
      labels: <?php echo json_encode(array_column($clients, 'segment_name')) ?>,
      datasets: [{
        label: 'Clientes por Segmento',
        data: <?php echo json_encode(array_column($clients, 'client_count')) ?>,
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }]
    };
    new Chart(ctx, {
      type: 'bar',
      data: testData
    });
  </script>
<?php endif; ?>
</body>

</html>