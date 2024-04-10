
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Information Form</title>
    <link rel="stylesheet" href="details.css"> <!-- Link your CSS file -->
    <script src="details_validation.js" defer></script> <!-- Link your JavaScript file -->
    <!-- You can add other meta tags or external stylesheets/scripts here -->
</head>
<body style="background-image: url('details_bg.jpg'); background-size: cover;">
    <div class="form-container">
        <h2>Farmer Information Form</h2>
        <form action="details_connect.php" method="post">
        <div class="form-group">
            <label for="county">County:</label>
            <select id="county" name="county">
            <!-- Options will be added dynamically based on database values -->
            </select>
        </div>


    <div class="form-group">
        <label for="constituency">Constituency:</label>
            <select id="constituency" name="constituency">
                    <!-- Constituency options will populate based on selected County -->
                    <!-- You might initially populate it with JavaScript based on County selection -->
                </select>
            </div>

            <div class="form-group">
                <label for="ward">Ward:</label>
                <select id="ward" name="ward">
                <!-- Ward options will populate based on selected Constituency -->
        </select>
</div>


            <div class="form-group">
                <label for="crops">Crops Planted:</label>
                <input type="text" id="crops" name="crops" placeholder="Enter crops planted">
            </div>

            <div class="form-group">
                <label for="farmSize">Farm Size (in acres):</label>
                <input type="number" id="farmSize" name="farmSize" placeholder="Enter farm size">
            </div>

            <div class="form-group">
                <label for="phoneNumber">Phone Number:</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
            <div class="logout-container">
                <a href="logout.php" class="logout-link">Logout</a>
            </div>

        </form>
    </div>
    <!-- You can include scripts or additional HTML elements here -->
    <script>
    fetch('details_connect.php') // Replace with your actual PHP file path
        .then(response => response.json())
        .then(data => {
            const countySelect = document.getElementById('county');
            data.forEach(county => {
                const option = document.createElement('option');
                option.value = county.county_id;
                option.textContent = county.county_name;
                countySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching County data:', error);
        });

         // Function to populate Constituency dropdown based on selected County
         document.getElementById('county').addEventListener('change', function() {
            const selectedCountyId = this.value;
            fetch(`details_connect.php?county_id=${selectedCountyId}`)
                .then(response => response.json())
                .then(data => {
                    const constituencySelect = document.getElementById('constituency');
                    constituencySelect.innerHTML = ''; // Clear previous options
                    data.forEach(constituency => {
                        const option = document.createElement('option');
                        option.value = constituency.constituency_id;
                        option.textContent = constituency.constituency_name;
                        constituencySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching Constituency data:', error);
                });
        });

        // Function to populate Ward dropdown based on selected Constituency
document.getElementById('constituency').addEventListener('change', function() {
    const selectedConstituencyId = this.value;
    fetch(`details_connect.php?constituency_id=${selectedConstituencyId}`)
        .then(response => response.json())
        .then(data => {
            const wardSelect = document.getElementById('ward');
            wardSelect.innerHTML = ''; // Clear previous options
            data.forEach(ward => {
                const option = document.createElement('option');
                option.value = ward.ward_id;
                option.textContent = ward.ward_name;
                wardSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching Ward data:', error);
        });
});

    </script>
</body>
</html>
