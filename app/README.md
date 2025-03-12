# Android Login System with PHP & MySQL

This project provides a simple and secure user authentication system for an Android app, built using:

- **Android (Java)**
- **PHP (API for user authentication)**
- **MySQL (Database for storing user credentials securely)**

---

## 📁 Project Structure

```
project-root/
│
├── app/
│   ├── (All Android app source code)
│   │
│   └── sampledata/
│       ├── login.php         (API script for user login)
│       └── userInsert.php    (Script to insert test users into MySQL)
│
└── README.md
```

---

## 📌 Main Features

- Secure authentication using hashed passwords
- Easy integration with PHP & MySQL backend
- JSON-based communication between Android and backend
- Compatible with Android Emulator & Real Devices
- Clear separation between frontend (Android) and backend (PHP/MySQL)

---

## 🛠️ Setup Instructions

Follow these steps carefully to set up this project on your local machine.

### 1️⃣ MySQL Database Setup

- Create a new MySQL database named `android_login`.
- Create a table called `users` with the following fields:
    - `id` (int, primary key, auto-increment)
    - `username` (varchar, unique)
    - `password` (varchar, hashed password)

### 2️⃣ Inserting a Test User

- Edit and run `userInsert.php` (provided in `app/sampledata/`) to insert a test user into the database.
- Ensure passwords are hashed using PHP’s `password_hash()` function.

---

## 🔹 Backend (PHP API)

The backend PHP scripts handle user authentication and database communication.

### 📌 PHP Server Configuration

- Move the PHP files (`login.php`, `userInsert.php`) from `app/sampledata/` into your server directory (e.g., XAMPP’s `htdocs`):

```
htdocs/webss/forworkonly/
│
├── login.php
└── userInsert.php
```

- Start the PHP server using the command:
```bash
php -S 127.0.0.1:8000
```

- **Test API** with CURL to ensure it's running:
```bash
curl -X POST -H "Content-Type: application/json" -d '{"username": "omar", "password": "123456"}' http://127.0.0.1:8000/webss/forworkonly/login.php
```

---

## 🔹 Frontend (Android App)

The Android app is built using Java and interacts with the PHP backend using HTTP requests.

### 📌 Android Configuration

- Update the backend API URL in your Android code:

**If using Android Emulator:**
```java
private static final String LOGIN_URL = "http://10.0.2.2:8000/webss/forworkonly/login.php";
```

**If using a real Android device (connected via the same Wi-Fi):**
```java
private static final String LOGIN_URL = "http://YOUR_PC_LOCAL_IP:8000/webss/forworkonly/login.php";
```

> **⚠️ Important:**  
> Replace `YOUR_PC_LOCAL_IP` with your actual local IP address, e.g., `192.168.x.x`.  
> You can find your local IP by running `ipconfig` (Windows) or `ifconfig` (Linux/Mac) from your terminal.

- Add Internet permission to your `AndroidManifest.xml` file:
```xml
<uses-permission android:name="android.permission.INTERNET" />
```

---

## 📱 Testing the App

To verify everything is working:

1. Ensure the PHP server and MySQL database are running.
2. Launch your Android app.
3. Attempt to log in using:
    - **Username:** `omar`
    - **Password:** `123456`

**Expected Result:** A toast message: **"Login Successful"**

---

## ⚙️ Changing URLs and Configuring for Your Machine

To adapt this project for your machine or environment, follow these quick steps:

- **PHP Backend:**
    - Adjust file paths or server URLs in PHP scripts if necessary.
    - Start the PHP server on your chosen port and folder.

- **Android Frontend:**
    - Modify the `LOGIN_URL` inside `MainActivity.java` to match your local server address and port.
    - For emulator, always use `http://10.0.2.2:[PORT]/path_to_php`.
    - For physical devices, always use `http://your_local_ip:[PORT]/path_to_php`.

- **Database Credentials:**
    - Adjust database credentials (`host`, `username`, `password`, `database_name`) in PHP files (`login.php`, `userInsert.php`) according to your MySQL setup.

---

## 🚀 Future Enhancements

- Token-based authentication (JWT)
- User registration functionality
- Session management (logout, password reset)
- Enhanced security and error handling

---

🎉 **Your Android login system is ready and fully functional!**

Feel free to explore, contribute, or enhance this project. Happy coding! 🚀🔥😊
