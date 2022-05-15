<!-- TODO: Use value passed from controller here -->
<html> 
    <link rel="stylesheet" href="css/app.css">
    <body>
        <h1>Data Summary submitted successfully!!!</h1>
        <p>Summary includes Total Items, Total Weight, Unique Email Addresses and Unique Order Numbers in this order Information</p>
        <button type="button" class ="submitButton" onclick="window.location='{{ url("/api") }}'">Show Summary</button>

    </body>
</html>