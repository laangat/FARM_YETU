<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farming Details Form</title>
    <style>
        body {
            display: flex;
            background-color: lightblue;
        }

        .side-container {
            width: 40%; /* Adjust the width as needed */
            float: right; /* Float it to the right */
            padding: 20px;
            margin-left: 20px; /* Creating space from the right edge */
            background-color: #f0f0f0; /* Just for visualization */
        }

        form {
            background: cream;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="date"],
        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: calc(100% - 12px);
            padding: 6px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .harvesting-form {
        float: right; /* Float it to the right */
        margin-left: 500px; /* Adjust as needed */
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 250px; /* Adjust width as needed */
        height: 300px;
    }

    .harvesting-form h5 {
        font-size: 18px;
        margin-bottom: 15px;
        color: #333;
    }

    .harvesting-details {
        font-size: 16px;
        color: #555;
    }

    .harvesting-details h2 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }

    .harvesting-details p {
        margin-bottom: 8px;
    }
    </style>
</head>
<body>
<div class="side-container">
    <form id="planting-form" action="process_data.php" method="post" enctype="multipart/form-data">
        <h1>Planting Details</h1>
        <label for="planting_date">Planting Date:</label>
        <input type="date" id="planting_date" name="planting_date">

        <label for="crop_type">Crop Type:</label>
        <input type="text" id="crop_type" name="crop_type">

        <label for="input_kg">Input (in kg):</label>
        <input type="number" id="input_kg" name="input_kg">
        
        <h4>Expenses (in Ksh.)</h4>

        <label for="fertilizer_type">Fertilizer Type:</label>
        <input type="text" id="fertilizer_type" name="fertilizer_type">

        <label for="fertilizer_cost">Fertilizer (in Ksh):</label>
        <input type="number" id="fertilizer_cost" name="fertilizer_cost">
        <input type="text" id="mpesa_fertilizer" name="mpesa_fertilizer" placeholder="M-Pesa Code">

        <label for="weed_count">Number of Times Weeded:</label>
        <input type="number" id="weed_count" name="weed_count">

        <label for="labor_expenses">Labor Expenses (in Ksh):</label>
        <input type="number" id="labor_expenses" name="labor_expenses">
        <input type="text" id="mpesa_labor" name="mpesa_labor" placeholder="M-Pesa Code">

        <label for="insecticide_count">Number of Times Insecticides Used:</label>
        <input type="number" id="insecticide_count" name="insecticide_count">

        <label for="insecticide_type">Insecticide Type:</label>
        <input type="text" id="insecticide_type" name="insecticide_type">

        <label for="insecticide_price">Insecticide Price (in Ksh):</label>
        <input type="number" id="insecticide_price" name="insecticide_price">
        <input type="text" id="mpesa_insecticide_price" name="mpesa_insecticide_price" placeholder="M-Pesa Code">

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Submit">
    </form>
</div>

<!-- ... Other HTML content ... -->
<div class="harvesting-form">
        <form id="harvesting-form" action="process_data.php" method="post">
            <!-- Harvest Details -->
            <div class="harvesting-details">
                <h2>Harvest Details</h2>
                <label for="harvesting_date">Harvesting Date:</label>
                    <input type="date" id="harvesting_date" name="harvesting_date">
                <p>Total Yield: <span id="totalYield">0 kg</span></p>
                <p>Total Expenses: $<span id="totalExpenses">0</span></p>
                <!-- Link or button to trigger PDF generation -->
                <a href="generate_pdf.php" target="_blank">Download PDF Report</a>
            </div>
        </form>
    </div>



    <!-- JavaScript to handle form submission and update side container -->
    <script>
    const form = document.getElementById('planting-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        const seasonDetails = document.createElement('div');
        seasonDetails.classList.add('season-details');

        seasonDetails.innerHTML = `
            <h3>Planting Season Details</h3>
            <p>Planting Date: ${formData.get('planting_date')}</p>
            <p>Crop Type: ${formData.get('crop_type')}</p>
            <p>Input: ${formData.get('input_kg')} kg</p>
            <p>Fertilizer Type: ${formData.get('fertilizer_type')}</p>
            <p>Fertilizer Cost: ${formData.get('fertilizer_cost')} Ksh</p>
            <!-- Other details as needed -->
        `;

        document.querySelector('.side-container').appendChild(seasonDetails);

        form.reset();
    });
</script>
</body>
</html>

