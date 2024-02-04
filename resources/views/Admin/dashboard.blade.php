<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em;
        }
        nav {
            background-color: #555;
            padding: 1em;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin-right: 1em;
            font-weight: bold;
        }
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 2em;
        }
        .widget {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 1.5em;
            margin: 1em;
            flex: 1 1 300px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <a href="#">Home</a>
        <a href="#">Users</a>
        <a href="#">Settings</a>
        <a href="{{route('logout')}}">Logout</a>
    </nav>
    <div class="dashboard-container">
        <div class="widget">
            <h2>Analytics</h2>
            <!-- Analytics content here -->
        </div>
        <div class="widget">
            <h2>Recent Activity</h2>
            <!-- Recent activity content here -->
        </div>
        <div class="widget">
            <h2>User Management</h2>
            <!-- User management content here -->
        </div>
    </div>
</body>
</html>
