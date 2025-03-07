# Student CRUD Project - Laravel

## 📌 Introduction
This project is a **Student Management System** built using Laravel, allowing CRUD (Create, Read, Update, Delete) operations for student records. It provides an intuitive admin panel to manage students efficiently.

## 🛠️ Features
- Add new students with details (Name, Email, Phone, Address, etc.)  
- View a list of all students  
- Update student details  
- Delete student records  
- Laravel validation for input fields  
- Bootstrap-styled UI for a responsive design  

## 🚀 Installation & Setup
Follow these steps to set up the project on your local system:  

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/Shivam410/Student_CRUD.git
cd student-crud-laravel
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install
```

### 3️⃣ Configure Environment
- Copy `.env.example` to `.env`
```bash
cp .env.example .env
```
- Update database details in the `.env` file
```env
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=your_database_name  
DB_USERNAME=root  
DB_PASSWORD=
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 5️⃣ Run Migrations
```bash
php artisan migrate
```

### 6️⃣ Serve the Application
```bash
php artisan serve
```
Visit **http://127.0.0.1:8000** in your browser.  

### Opration to perfrom
```bash
-By clicking on the Roll Number it will Give the Roll NUmber in the asending way
-And By clicking on the the Name It will Gives the name as a alphabatical order 
-In the the search box we can Search the Student name
-By clicking on the Edit Button it will redirect to the Update Page
-By clicking on the Delete Button it will Delete the Student
-By clicking on the Add Button it will redirect to the Add Student Page
```

## 📁 Project Structure
```
/app  
  /Http  
    /Controllers  
      StudentController.php  
  /Models  
    Student.php  
/database  
  /migrations  
/resources  
  /views  
      StudentTable.blade.php  
      AddStudent.blade.php  
      UpdateStudent.blade.php  
      ViewStudent.blade.php  
/routes  
  web.php  
```

## 🖥️ CRUD Endpoints
| Method | Route               | Action           | Description        |  
|--------|---------------------|------------------|--------------------|  
| GET    | /           | index()          | List all students  |  
| GET    | /AddView    | create()         | Show form to add   |  
| POST   | /AddStudent           | addStudent()          | Save new student   |  
| GET    | /Edit/{id} | editStudent()           | Edit student data  |  
| GET    | /viewStudent/{id}           | viewStudent          | View Single student  |
| PUT    | /Update/{id}      | updateStudent()         | Update student     |  
| DELETE | /Delete/{id}      | deleteStudent()        | Delete student     |  

## 📜 License
This project is open-source and free to use.
