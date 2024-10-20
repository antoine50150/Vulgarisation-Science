# Web Project - Vulgarisation-Science

This repository contains a dynamic web project built as part of the first year of a Computer Science degree. The project uses several web technologies, including **Bootstrap**, **PHP**, **HTML**, **CSS**, and **SQL** to create a full-stack web application with database integration.

## Features:
- **Bootstrap** for responsive design and layout.
- **PHP** for backend server-side logic.
- **HTML/CSS** for structuring and styling the front-end.
- **SQL** for managing the database.

## Setup Instructions

### 1. Database Configuration

Please note that the `database.php` file is missing in the `controllers/` folder. You need to create this file and add the following code (adjust the values to match your MySQL setup):

```php
<?php
  $db = new PDO('mysql:host=YourHostServerDatabase.mysql.db;dbname=YourDataBaseName;charset=utf8', 'YourUsername', 'YourPassword');
?>
```

#### Explanation:

- **`$db = new PDO(...);`**: This line creates a new instance of the `PDO` class, allowing you to interact with a MySQL database through the `$db` object.
  
- **Connection Parameters:**
  - `mysql:`: Defines the database type, in this case, MySQL.
  - `host=YourHostServerDatabase.mysql.db`: Replace `YourHostServerDatabase` with the actual host name of your database server.
  - `dbname=YourDataBaseName`: Replace `YourDataBaseName` with the name of your database.
  - `charset=utf8`: Sets the character encoding to `utf8`, ensuring proper handling of characters.
  - `YourUsername`: The username for your database.
  - `YourPassword`: The password for the specified username.

Make sure to replace the placeholders with the actual credentials for your database.

### 2. Updating the URL in the Index

In the `index.php` file, update the following line:

```php
$url = "https://www.vulgarisation-science.fr/";
```

Change it to reflect your website's URL:

```php
$url = "YourWebsiteURL.com";
```

Replace `YourWebsiteURL.com` with your actual website URL.

---

## How to Run

1. Clone this repository.
2. Create the `database.php` file in the `controllers/` folder with the necessary database credentials.
3. Update the website URL in `index.php`.
4. Host the project on a PHP-compatible server or use a local environment like **XAMPP** or **MAMP**.
5. Import the MySQL database using the SQL file provided (if applicable).

---

## Technologies Used:
- **PHP**: Handles server-side scripting and database interactions.
- **MySQL**: Manages database operations.
- **Bootstrap**: Provides a responsive and mobile-first layout.
- **HTML & CSS**: Structure and style the front-end of the website.

---

## License
This project is for educational purposes as part of a first-year course in Computer Science. Feel free to modify and reuse the code with appropriate credit.

---

## Authors
[Antoine Montaut] - [Théotime Flichy]
2020-2021

--- 

