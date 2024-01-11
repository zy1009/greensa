<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Greensa | Training Center</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #ffd6d6;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            z-index: 1; /* Adjust the z-index to make the navbar appear above the cards */
        }

        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            display: block;
        }

        input[type="email"],
        input[type="password"],
        button {
            padding: 8px;
            border-radius: 3px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            transition: transform 0.3s ease;
            background-color: #f0f0f0;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container mt-20">

    <h1>Training Centers</h1>

    <form>
        <div class="row mt-4">
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <label for="floor">Floor:</label>
                    <select name="floor" id="floor">
                        <option value="">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="input-group">
                    <label for="capacity">Capacity:</label>
                    <input type="number" name="capacity" id="capacity" min="1">
                </div>
            </div>
        </div>
    </form>

    <div class="row mt-4" id="room-list">
        @foreach($trains as $train)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $train->nama }}</h5>
                        <p class="card-text">Floor: {{ $train->lantai }}</p>
                        <p class="card-text">Capacity: {{ $train->kapasitas }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    // Get the floor filter element
    const floorFilter = document.getElementById("floor");
    
    // Get the capacity filter element
    const capacityFilter = document.getElementById("capacity");

    // Add event listener to the floor filter
    floorFilter.addEventListener("change", updateRooms);
    
    // Add event listener to the capacity filter
    capacityFilter.addEventListener("change", updateRooms);

    function updateRooms() {
        // Get the selected floor value
        const selectedFloor = floorFilter.value;

        // Get the selected capacity value
        const selectedCapacity = capacityFilter.value;

        // Get all the room cards
        const roomCards = document.querySelectorAll("#room-list .card");

        // Loop through each room card
        roomCards.forEach(function(card) {
            // Get the floor value of the current room card
            const cardFloor = card.querySelector(".card-text:nth-child(2)").textContent.split(":")[1].trim();

            // Get the capacity value of the current room card
            const cardCapacity = card.querySelector(".card-text:nth-child(3)").textContent.split(":")[1].trim();

            // Check if the selected floor matches the current room card's floor and the selected capacity is greater than or equal to the room card's capacity
            if ((selectedFloor === "" || selectedFloor === cardFloor) && (selectedCapacity === "" || parseInt(selectedCapacity) <= parseInt(cardCapacity))) {
                // Show the room card
                card.style.display = "block";
            } else {
                // Hide the room card
                card.style.display = "none";
            }
        });
    }
</script>

</body>
</html>