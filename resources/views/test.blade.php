<!-- TODO: Use value passed from controller here -->
<html> 
    <body>
        <table style="width:100%" class="data-table">
            <tr style ="text-align:left">
                <th>Order Number:</th>
                <th>Email:</th>
                <th>Total Items:</th>
                <th>Total Weight</th>
            </tr>
            <?php 
            $result = json_decode($result);
            foreach ($result as $value)  {    ?>
                <tr >
                    <td><?php echo $value->OrderNumber ?> </td>
                    <td><?php echo $value->Email ?> </td>
                    <td><?php echo $value->TotalItems ?> </td>
                    <td><?php echo $value->TotalWeight ?> </td>
                </tr>
            <?php  } ?>
        </table>
    </body>
</html>