<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <body>
    <button type="button" class ="submitButton" onclick="window.location='{{ url("/api") }}'"><span>Show Summary</span></button>
    <canvas id="myChart" style="width:75%"></canvas>

<script>
    var xValues = [];
    var yValues = [];
    <?php 
        $items = json_decode($encodedProductDetails);
        foreach ($items as $item)  {    ?>
        xValues.push('{{ $item->ProductId }}');
        yValues.push({{ $item->Price }});
        <?php  } ?>

    new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
        data: yValues,
        backgroundColor: 'Blue',
        }]
    },
    options: {
        legend: {display: false},
        title: {
        display: true,
        text: "Product Price vs Product ID"
        }
    }
    });
</script>

</body>
</html>
