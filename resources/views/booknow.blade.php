  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-6">Details of your stay</h2>

        <!-- Date Selection -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-600 text-sm font-semibold">Check-in date</label>
                <input type="date" class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="text-gray-600 text-sm font-semibold">Check-out date</label>
                <input type="date" class="w-full border rounded-lg px-4 py-2 mt-1 focus:ring-2 focus:ring-green-500">
            </div>
        </div>

        <!-- Room Selection -->
        <div class="mt-4">
            <label class="text-gray-600 text-sm font-semibold">Stay in room</label>
            <p class="text-gray-500 text-xs">Guests aged 12 or above</p>
            
            <div class="grid grid-cols-2 gap-4 mt-2">
                <select class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
                    <option>1 adult</option>
                    <option selected>2 adults</option>
                    <option>3 adults</option>
                </select>

                <select class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
                    <option selected>Add a child</option>
                    <option>1 child</option>
                    <option>2 children</option>
                </select>
            </div>
        </div>

        <!-- Extra Room -->
        <div class="mt-4 flex items-center text-green-600 cursor-pointer hover:underline">
            <span class="text-lg font-bold">+</span>
            <span class="ml-2">Extra room</span>
        </div>

        <!-- Check Availability Button -->
        <button class="w-full bg-green-700 text-white text-lg font-semibold py-3 mt-6 rounded-lg hover:bg-green-800 transition">
            CHECK AVAILABILITY
        </button>
    </div>

</body>
</html>
