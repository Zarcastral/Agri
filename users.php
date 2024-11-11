<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account Creation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Form Panel -->
    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Create New Account</h2>
            
            <form id="userForm" action="user.php" method="POST">
                <!-- First Name -->
                <div class="mb-4">
                    <label for="fname" class="block text-gray-700">First Name</label>
                    <input type="text" id="fname" name="fname" required class="w-full px-3 py-2 border rounded">
                </div>

                <!-- Last Name -->
                <div class="mb-4">
                    <label for="lname" class="block text-gray-700">Last Name</label>
                    <input type="text" id="lname" name="lname" required class="w-full px-3 py-2 border rounded">
                </div>

                <!-- User Role -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">User Role</label>
                    <select id="role" name="role" required class="w-full px-3 py-2 border rounded">
                        <option value="">Select a role</option>
                        <?php
                        // PHP code to fetch barangay options
                        $host = 'localhost';
                        $db = 'agridb';
                        $user = 'root';
                        $pass = '';

                        try {
                            $fetch_user_roles = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                            $fetch_user_roles->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetch barangays
                            $user_roles_get = $fetch_user_roles->prepare('SELECT user_roles FROM user_roles_settingstb'); // Make sure this table exists
                            $user_roles_get->execute();

                            if ($user_roles_get->rowCount() > 0) {
                                $user_roles = $user_roles_get->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($user_roles as $user_roles_set) {
                                    echo '<option value="' . htmlspecialchars($user_roles_set['user_roles']) . '">' . htmlspecialchars($user_roles_set['user_roles']) . '</option>';
                                }
                            }
                        } catch (PDOException $error) {
                            echo "Error: " . htmlspecialchars($error->getMessage());
                        }
                        ?>
                    </select>
                    </select>
                </div>

                <!-- Username -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded">
                    <p id="usernameError" class="text-red-500 text-sm hidden">Username already taken</p>
                </div>

                <!-- Contact Number -->
                <div class="mb-4">
                    <label for="contact" class="block text-gray-700">Contact Number</label>
                    <input type="tel" id="contact" name="contact" required class="w-full px-3 py-2 border rounded" maxlength="11" pattern="\d{11}">
                    <p id="contactError" class="text-red-500 text-sm hidden">Contact number must be exactly 11 digits.</p>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('contact').addEventListener('input', function (e) {
                                this.value = this.value.replace(/[^0-9]/g, ''); // Replace non-numeric characters
                            });

                            document.getElementById('userForm').addEventListener('submit', function(event) {
                                const contact = document.getElementById('contact').value;
                                if (contact.length !== 11) {
                                    event.preventDefault(); // Prevent form submission
                                    document.getElementById('contactError').classList.remove('hidden'); // Show error message
                                } else {
                                    document.getElementById('contactError').classList.add('hidden'); // Hide error message
                                }
                            });
                        });
                    </script>
                </div>
                <!-- Barangay (Combo Box) -->
                <div class="mb-4">
                    <label for="barangay" class="block text-gray-700">Barangay</label>
                    <select id="barangay" name="barangay" required class="w-full px-3 py-2 border rounded">
                        <option value="">Select Barangay</option>
                        <?php
                        // PHP code to fetch barangay options
                        $host = 'localhost';
                        $db = 'agridb';
                        $user = 'root';
                        $pass = '';

                        try {
                            $fetch_barangay = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
                            $fetch_barangay->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Fetch barangays
                            $barangay_get = $fetch_barangay->prepare('SELECT barangay FROM barangay_settingstb'); // Make sure this table exists
                            $barangay_get->execute();

                            if ($barangay_get->rowCount() > 0) {
                                $barangays = $barangay_get->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($barangays as $barangay_set) {
                                    echo '<option value="' . htmlspecialchars($barangay_set['barangay']) . '">' . htmlspecialchars($barangay_set['barangay']) . '</option>';
                                }
                            }
                        } catch (PDOException $error) {
                            echo "Error: " . htmlspecialchars($error->getMessage());
                        }
                        ?>
                    </select>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded">
                        <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600">Show</button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="confirm_password" class="block text-gray-700">Confirm Password</label>
                    <div class="relative">
                        <input type="password" id="confirm_password" name="confirm_password" required class="w-full px-3 py-2 border rounded">
                        <button type="button" onclick="togglePasswordVisibility('confirm_password')" class="absolute inset-y-0 right-0 px-3 py-2 text-gray-600">Show</button>
                    </div>
                    <p id="passwordError" class="text-red-500 text-sm hidden">Passwords do not match</p>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="button" onclick="resetForm()" class="px-4 py-2 bg-gray-500 text-white rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Floating Panel for Messages -->
    <div id="messagePanel" class="fixed inset-0 items-center justify-center z-50 hidden">
        <div class="bg-white shadow-lg rounded-lg p-6 w-1/3">
            <p id="messageText" class="text-center text-gray-800"></p>
            <button id="closeButton" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">OK</button>
        </div>
    </div>

    <script>
        // Function to display the message panel
        function showMessage(message) {
            document.getElementById('messageText').innerText = message;
            document.getElementById('messagePanel').classList.remove('hidden');
        }

        // Close button event listener
        document.getElementById('closeButton').addEventListener('click', function() {
            document.getElementById('messagePanel').classList.add('hidden');
        });

        // Form Submission Handling
        document.getElementById('userForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Check if passwords match
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            if (password !== confirmPassword) {
                document.getElementById('passwordError').classList.remove('hidden');
                return;
            } else {
                document.getElementById('passwordError').classList.add('hidden');
            }

            // Gather form data
            const formData = new FormData(this);

            fetch('users_connection.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if (data === 'username_taken') {
                    document.getElementById('usernameError').classList.remove('hidden');
                } else if (data === 'success') {
                    showMessage('User Successfully Created!');
                    setTimeout(() => {
                        document.getElementById('userForm').reset();
                        location.reload();
                    }, 2000);
                } else {
                    showMessage('Error while creating user');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showMessage('An unexpected error occurred');
            });
        });

        // Reset Form Function
        function resetForm() {
            document.getElementById('userForm').reset();
            location.reload();
        }

        // Password visibility toggle
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            if (field.type === "password") {
                field.type = "text";
                button.innerText = "Hide";
            } else {
                field.type = "password";
                button.innerText = "Show";
            }
        }
    </script>
</body>
</html>
