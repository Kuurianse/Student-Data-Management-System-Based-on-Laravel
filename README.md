# Student-Data-Management-System-Based-on-Laravel

A web application built with the Laravel framework to manage student data. This project demonstrates expertise in backend development, MVC architecture, and creating a responsive user experience.

## Features

### 1. **Authentication System**
- User login, registration, and logout functionality with input validation.
- Passwords are securely stored using hashing (bcrypt).
- Access control using middleware based on authentication status.

### 2. **Student Data Management**
- Perform CRUD operations (Create, Read, Update, Delete) on student data.
- Input validation ensures data integrity (e.g., unique NRP, valid email format).
- Displays data in a tabular format with fields for:
  - Name
  - NRP
  - Email
  - Major
  - Profile Image

### 3. **Dynamic Search Feature**
- Search for students by name, NRP, email, or major.
- Displays search results dynamically with pagination for better readability.
- Keeps search input persistent even when navigating through result pages.

### 4. **User-Friendly Interface**
- Navbar adjusts dynamically based on user authentication status:
  - Displays options like "Login," "Register," or "Logout."
  - Integrated search bar for easy data access.
- Notifications for success or failure of actions (e.g., login, registration, data update).

### 5. **Pagination**
- Paginated student data to ensure smooth user experience for large datasets.

---
