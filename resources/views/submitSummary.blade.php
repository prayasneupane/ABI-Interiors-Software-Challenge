<!-- TODO: Use value passed from controller here -->
<html> 
    <body>
        <h1>Data Summary submitted successfully!!!</h1>
        <p>Summary includes Total Items, Total Weight, Unique Email Addresses and Unique Order Numbers in this order Information</p>
        <button type="button" onclick="window.location='{{ url("/api") }}'">Click Here to go back</button>

    </body>
</html>