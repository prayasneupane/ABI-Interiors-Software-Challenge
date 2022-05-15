<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">
        <script src="js/tab.js"></script>
    </head>

    <body>

        <div class="tab">
            <button class="tablinks active" onclick="showData(event, 'Items')">Items</button>
            <button class="tablinks" onclick="showData(event, 'Email')">Email Addresses</button>
            <button class="tablinks" onclick="showData(event, 'Order')">Order Numbers</button>
            <button class="tablinks" onclick="showData(event, 'Weight')">Weight per Order</button>
        </div>

        <div id="Items" class="tabcontent  tabcontentItems">
            <p>A Summary of Items contained in this order information</p>
            <table style="width:100%" class="data-table">
            <tr style ="text-align:left">
                <th>ProductId</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Discount</th>
                <th>TotalTax</th>
            </tr>
            <?php 
            $items = json_decode($encodedItems);
            foreach ($items as $item)  {    ?>
                <tr >
                    <td><?php echo $item->ProductId ?> </td>
                    <td><?php echo $item->Price ?> </td>
                    <td><?php echo $item->Quantity ?> </td>
                    <td><?php echo $item->Discount ?> </td>
                    <td><?php echo $item->TotalTax ?> </td>
                </tr>
            <?php  } ?>
        </table>
        </div>

        <div id="Email" class="tabcontent">
            <p>A Summary of Contacts contained in this order information</p> 
            <table style="width:100%" class="data-table">
            <tr style ="text-align:left">
                <th>FirstName</th>
                <th>LastName</th>
                <th>Email</th>
            </tr>
            <?php 
            $contacts = json_decode($encodedContacts);
            foreach ($contacts as $contact)  {    ?>
                <tr >
                    <td><?php echo $contact->FirstName ?> </td>
                    <td><?php echo $contact->LastName ?> </td>
                    <td><?php echo $contact->Email ?> </td>
                </tr>
            <?php  } ?>
        </table>
        </div>

        <div id="Order" class="tabcontent">
            <p>A Summary of order numbers contained in this order information</p>
            <table style="width:100%" class="data-table">
            <tr style ="text-align:left">
                <th>OrderNumber</th>
            </tr>
            <?php 
            $results = json_decode($encodedResult);
            foreach ($results as $result)  {    ?>
                <tr >
                    <td><?php echo $result->OrderNumber ?> </td>
                </tr>
            <?php  } ?>
        </table>
        </div>

        <div id="Weight" class="tabcontent">
            <p>All order weights contained in this order information</p>
            <table style="width:100%" class="data-table">
            <tr style ="text-align:left">
                <th>OrderNumber</th>
                <th>TotalWeight</th>
            </tr>
            <?php 
            $results = json_decode($encodedResult);
            foreach ($results as $result)  {    ?>
                <tr >
                    <td><?php echo $result->OrderNumber ?> </td>
                    <td><?php echo $result->TotalWeight ?> </td>
                </tr>
            <?php  } ?>
        </table>
        </div>
        <div class="submit">
            <button  class="tablinks" onclick="window.location='{{ url("/submitSummary") }}'">Submit Summary to API end point</button>
        </div>
    </body>
</html> 
