<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('clientsChart').getContext('2d');
  const testData = {
    labels: ['Segmento A', 'Segmento B', 'Segmento C'],
    datasets: [{
      label: 'Clientes por Segmento (Teste)',
      data: [10, 20, 30],
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
</script>
</body>

</html>