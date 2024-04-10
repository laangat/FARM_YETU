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
function validateDetailsForm() {
    const crops = document.getElementById('crops').value;
    const farmSize = document.getElementById('farmSize').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    // Validate crops field (optional validation, adjust as needed)
    if (crops.trim() === '') {
        alert('Please enter the crops planted.');
        return false;
    }

    // Validate farm size
    if (farmSize <= 0 || isNaN(farmSize)) {
        alert('Please enter a valid farm size.');
        return false;
    }

    // Validate phone number (optional validation, adjust as needed)
    const phoneRegex = /^\d{10}$/; // Assuming phone number should be 10 digits
    if (!phoneRegex.test(phoneNumber)) {
        alert('Please enter a valid phone number.');
        return false;
    }

    // If all validations pass, return true
    return true;
}

// Event listener for form submission
document.querySelector('.form-container form').addEventListener('submit', function(event) {
    if (!validateDetailsForm()) {
        // If validation fails, prevent the form from being submitted
        event.preventDefault();
    }
});
