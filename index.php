<?php
include("connection.php");
session_start();
$error_message = ""; // Initialize error message

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Include the login logic here
    include("login.php");
}

if (isset($_GET['error'])) {
    $error_message = "Login failed. Invalid username or password!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> <!-- Include Poppins font -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-poppins bg-cover bg-center bg-fixed min-h-screen overflow-hidden" style="background-image: url('icons/loginbg.png');">
    <div class="flex min-h-screen justify-center items-center px-4 py-12 lg:px-8 "> <!-- Center the form container horizontally -->
        <!-- This div is the form container, adjusted width -->
        <div class="w-full max-w-lg p-8 space-y-12 rounded-lg ml-auto mr-32 mt-30">
            <!--div class="w-full sm:w-[500px] lg:w-[400px] xl:w-[500px]"--> <!-- Adjusted the width for different screen sizes -->
            <div class="bg-white rounded-lg shadow-lg p-8"> <!-- Added padding for spacing -->
                <img class="mx-auto h-20 w-auto" src="icons/leaf_green.png" alt="Your Company" />
                <h2 class="mt-10 text-center text-5xl font-bold leading-9 tracking-tight text-[#41A186]">Login</h2>
                <p class="mt-6 text-center text-black text-xs">Use your credentials to access your account.</p>

                <?php if ($error_message): ?>
                    <div class="text-red-500 text-center mt-2">

                        <?= htmlspecialchars($error_message) ?>
                    </div>
                <?php endif; ?>

                <form name="form" class="space-y-3 mt-6" action="" method="POST">
                    <div>
                        <label for="user" class="sr-only">Username</label>
                        <input
                            id="user"
                            name="user"
                            aria-label="Username"
                            autocomplete="off"
                            type="text"
                            required
                            placeholder="Username"
                            value=""
                            class="block w-full rounded-md border border-gray-300 bg-white py-3 px-4 shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                    </div>

                    <div>
                        <label for="pass" class="sr-only">Password</label>
                        <input
                            id="pass"
                            name="pass"
                            aria-label="Password"
                            autocomplete="off"
                            type="password"
                            required
                            placeholder="Password"
                            value=""
                            class="block w-full rounded-md border border-gray-300 bg-white py-3 px-4 shadow-sm focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6" />
                    </div>

                    <div class="flex justify-between text-sm">
                        <span></span>
                        <a href="#" class="font-semibold text-[#41A186]">Forgot password?</a>
                    </div>

                    <div>
                        <button
                            type="submit"
                            name="submit"
                            class="flex w-full justify-center px-4 py-3 text-sm font-semibold leading-6 text-white bg-[#41A186] rounded-full mt-4 shadow-sm">
                            Sign in
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>