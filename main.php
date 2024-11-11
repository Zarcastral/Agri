<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <style>
    body {
      display: flex;
    }

    .sidebar {
      position: fixed;
      height: 100%;
      width: 250px;
      /* Adjust width as needed */
    }

    .content {
      margin-left: 250px;
      /* Same as sidebar width */
      padding: 20px;
      /* Content padding */
    }

    .icon {
      width: 24px;
      height: 24px;
      margin-right: 8px;
      /* Adjust the space as needed */
    }


    .sidebar a {
      color: #848A9C;
      /* Default unselected color */
    }

    .sidebar a.selected {
      color: #41A186;
      /* Selected color */
    }
  </style>
</head>

<body>
  <div class="sidebar flex flex-col gap-y-2 overflow-y-auto bg-white px-6">
    <div class="flex h-32 items-center justify-center py-4">
      <img src="icons/leaf_green.png" class="h-28 w-auto" alt="Your Company" />
    </div>



    <nav class="flex flex-1 flex-col">
      <ul class="flex flex-col gap-y-1">
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6" data-section="dashboard"
            data-icon="icons/dashboard_green.png" data-inactive-icon="icons/dashboard_gray.png">
            <img src="icons/dashboard_gray.png" alt="Dashboard" class="icon" />
            Dashboard
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
            data-section="projects" data-icon="icons/project_green.png" data-inactive-icon="icons/project_gray.png">
            <img src="icons/project_gray.png" alt="Projects" class="icon" />
            Projects
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
            data-section="tasks" data-icon="icons/task_green.png" data-inactive-icon="icons/task_gray.png">
            <img src="icons/task_gray.png" alt="Tasks" class="icon" />
            Tasks
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
            data-section="harvest" data-icon="icons/harvest_green.png" data-inactive-icon="icons/harvest_gray.png">
            <img src="icons/harvest_gray.png" alt="Harvest" class="icon" />
            Harvest
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
            data-section="farmers" data-icon="icons/farmer_green.png" data-inactive-icon="icons/farmer_gray.png">
            <img src="icons/farmer_gray.png" alt="Farmers" class="icon" />
            Farmers
          </a>
        </li>
        <li>
          <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
            data-section="users" data-icon="icons/user_green.png" data-inactive-icon="icons/user_gray.png">
            <img src="icons/user_gray.png" alt="Users" class="icon" />
            Users
          </a>
        </li>
        <li>
          <div style="font-size: 0.875rem; font-weight: 600; line-height: 1.5; color: #41A186;">
            Tools
          </div>

          <ul class="flex flex-col gap-y-1 mt-2">
            <li>
              <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
                data-section="reports" data-icon="icons/report_green.png" data-inactive-icon="icons/report_gray.png">
                <img src="icons/report_gray.png" alt="Reports" class="icon" />
                Reports
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
                data-section="inbox" data-icon="icons/inbox_green.png" data-inactive-icon="icons/inbox_gray.png">
                <img src="icons/inbox_gray.png" alt="Inbox" class="icon" />
                Inbox
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
                data-section="activity-log" data-icon="icons/activitylog_green.png"
                data-inactive-icon="icons/activitylog_gray.png">
                <img src="icons/activitylog_gray.png" alt="Activity Log" class="icon" />
                Activity Log
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
                data-section="settings" data-icon="icons/setting_green.png" data-inactive-icon="icons/setting_gray.png">
                <img src="icons/setting_gray.png" alt="Settings" class="icon" />
                Settings
              </a>
            </li>
            <li>
              <a href="#" class="flex items-center p-2 rounded-md text-sm font-medium leading-6 text-indigo-200"
                data-section="logout" data-icon="icons/logout_green.png" data-inactive-icon="icons/logout_gray.png">
                <img src="icons/logout_gray.png" alt="Logout" class="icon" />
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>

  <div class="content">
    <h1 class="text-2xl font-bold" id="content-title">
      Welcome to Your Dashboard
    </h1>
    <p class="mt-4" id="content-description">
      This is where you can manage your projects, teams, and documents.
    </p>
  </div>

  <script>
    const links = document.querySelectorAll(".sidebar a");
    const contentTitle = document.getElementById("content-title");
    const contentDescription = document.getElementById("content-description");

    function setActiveLink(link) {
      // Remove 'selected' class from all links
      links.forEach((l) => {
        l.classList.remove("selected");
        l.style.backgroundColor = ""; // Reset background color
        l.style.color = "#848A9C"; // Reset color
        const icon = l.querySelector(".icon");
        if (icon) {
          icon.src = l.dataset.inactiveIcon; // Reset icon to inactive
        }
      });

      // Add 'selected' class to the clicked link
      link.classList.add("selected");
      link.style.backgroundColor = "rgba(65, 161, 134, 0.21)"; // Set background color with 21% opacity
      link.style.color = "#41A186"; // Set active text color to #41A186
      const selectedIcon = link.querySelector(".icon");
      if (selectedIcon) {
        selectedIcon.src = link.dataset.icon; // Set active icon
      }
    }

    // Set default selection to the dashboard on page load
    document.addEventListener("DOMContentLoaded", () => {
      const dashboardLink = document.querySelector('[data-section="dashboard"]');
      setActiveLink(dashboardLink);
    });

    // Add event listeners to links
    links.forEach((link) => {
      link.addEventListener("click", function(event) {
        event.preventDefault();
        setActiveLink(this);

        // Update content based on the clicked link
        switch (this.dataset.section) {
          case "projects":
            contentTitle.textContent = "Welcome to Projects";
            contentDescription.textContent = "This is the project part where you can manage your projects.";
            break;
          case "tasks":
            contentTitle.textContent = "Welcome to Tasks";
            contentDescription.textContent = "This is where you can track and manage your tasks.";
            break;
            // Add other cases for different sections...
          default:
            contentTitle.textContent = "Welcome to Your Dashboard";
            contentDescription.textContent = "This is where you can manage your projects, teams, and documents.";
            break;
        }
      });
    });
  </script>

</body>

</html>