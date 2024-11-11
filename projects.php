<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Submission Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-semibold mb-6">Project Submission Form</h2>
        <form action="projects_connection.php" method="POST"> <!-- Updated action to PHP file -->
            <!-- Project Name -->
            <div class="mb-4">
                <label for="projectName" class="block text-sm font-medium text-gray-700">Project Name</label>
                <input type="text" id="projectName" name="project_name" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" />
            </div>

            <!-- Farm President -->
            <div class="mb-4">
                <label for="farmPresident" class="block text-sm font-medium text-gray-700">Farm President</label>
                <select id="farmPresident" name="farm_president" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                <option value="">Select a Farm President</option>
                        <?php
                        // Database connection parameters
                        $host = 'localhost';
                        $db = 'agridb';
                        $user = 'root';
                        $pass = '';

                        try {
                            // Creating a new PDO instance
                            // the code "mysql:host=$host;dbname=$db" tells the PDO how to connect to the mysql database
                            // the second and third values $user and $pass specifies the username and password used to connect to the database
                            $fetch_farm_pres = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                            $fetch_farm_pres->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetching the values inside the database under the userstb where the user_role is Farm 
                            // used :roles as a placeholder to prevent SQL Injection attacks
                            $farm_pres_get = $fetch_farm_pres->prepare('SELECT fname, lname FROM userstb WHERE user_roles = :roles');
                            $role = 'Farm President'; // Filtering for the 
                            
                            // Binds together the value of $role into :roles
                            $farm_pres_get->bindParam(':roles', $role);
                            // runs the sql query from above
                            $farm_pres_get->execute();

                            // checking for results
                            if ($farm_pres_get->rowCount() > 0) {

                                // Fetches values that matches the query (all the fname and lname with user_role of Farm President)
                                $farmPresidents = $farm_pres_get->fetchAll(PDO::FETCH_ASSOC);

                                // Looping for displaying each value that was fetched
                                foreach ($farmPresidents as $president) {
                                    echo '<option value="' . htmlspecialchars($president['fname'] . " " . $president['lname']) . '">' . htmlspecialchars($president['fname'] . " " . $president['lname']) . '</option>';
                                }
                            }
                                
                        } catch (PDOException $error) {
                            echo "Error: " . htmlspecialchars($error->getMessage());
                        }

                        // Closing of PDO connection
                        $fetch_farm_pres = null; 
                        ?>
                    </select>
                </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="high_land_vegetables">High Land Vegetables</option>
                    <option value="high_value_vegetables">High Value Vegetables</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Barangay -->
            <div class="mb-4">
                <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                <select id="barangay" name="barangay" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                <option value="">Select Barangay</option>
                <?php
                        // Database connection parameters
                        $host = 'localhost';
                        $db = 'agridb';
                        $user = 'root';
                        $pass = '';

                        try {
                            // Creating a new PDO instance
                            // the code "mysql:host=$host;dbname=$db" tells the PDO how to connect to the mysql database
                            // the second and third values $user and $pass specifies the username and password used to connect to the database
                            $fetch_barangay = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                            $fetch_barangay->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetching the values inside the database under the userstb where the user_role is Farm 
                            // used :roles as a placeholder to prevent SQL Injection attacks
                            $barangay_get = $fetch_barangay->prepare('SELECT barangay FROM barangay_settingstb');
                            // runs the sql query from above
                            $barangay_get->execute();

                            // checking for results
                            if ($barangay_get->rowCount() > 0) {

                                // Fetches values that matches the query (all the fname and lname with user_role of Farm President)
                                $barangay = $barangay_get->fetchAll(PDO::FETCH_ASSOC);

                                // Looping for displaying each value that was fetched
                                foreach ($barangay as $barangay_set) {
                                    echo '<option value="' . htmlspecialchars($barangay_set['barangay']) . '">' . htmlspecialchars($barangay_set['barangay']) . '</option>';

                                }
                            }
                                
                        } catch (PDOException $error) {
                            echo "Error: " . htmlspecialchars($error->getMessage());
                        }

                        // Closing of PDO connection
                        $fetch_barangay = null; 
                        ?>
                </select>
               
            </div>

            <!-- Crop Type -->
            <div class="mb-4">
                <label for="cropType" class="block text-sm font-medium text-gray-700">Crop Type</label>
                <select id="cropType" name="crop_type" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="">Select Crop Type</option>
                    <option value="crop1">Crop 1</option>
                    <option value="crop2">Crop 2</option>
                </select>
                <label for="cropQuantity" class="block text-sm font-medium text-gray-700 mt-2">Quantity</label>
                <input type="number" id="cropQuantity" name="crop_quantity" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required />
            </div>

            <!-- Fertilizer Type -->
            <div class="mb-4">
                <label for="fertilizerType" class="block text-sm font-medium text-gray-700">Fertilizer Type</label>
                <select id="fertilizerType" name="fertilizer_type" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="">Select Fertilizer Type</option>
                    <option value="fertilizer1">Fertilizer 1</option>
                    <option value="fertilizer2">Fertilizer 2</option>
                </select>
                <label for="fertilizerQuantity" class="block text-sm font-medium text-gray-700 mt-2">Quantity</label>
                <input type="number" id="fertilizerQuantity" name="fertilizer_quantity" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required />
            </div>

            <!-- Equipments -->
            <div class="mb-4">
                <label for="equipment" class="block text-sm font-medium text-gray-700">Equipment</label>
                <select id="equipment" name="equipment" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="">Select Equipment</option>
                    <option value="equipment1">Equipment 1</option>
                    <option value="equipment2">Equipment 2</option>
                </select>
            </div>

            <!-- Start Date -->
            <div class="mb-4">
                <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                <input type="date" id="startDate" name="start_date" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" />
            </div>

            <!-- End Date -->
            <div class="mb-4">
                <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                <input type="date" id="endDate" name="end_date" required class="mt-1 p-2 border border-gray-300 rounded-md w-full" />
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md">Submit Project</button>
            </div>
        </form>
    </div>
</body>
</html>
