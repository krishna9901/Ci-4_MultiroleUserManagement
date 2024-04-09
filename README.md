# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).


**Steps to be Follow**

**downlaod the repository paste into the xampp/htdocs/ folder**
**1. Update Composer**

```
Composer update

```

**2. Update Environment Configuration
Go to the .env file and change the CI_ENVIRONMENT variable to development.**

```
CI_ENVIRONMENT = development
```

**3. Set Database Credentials
Go to app\Config\Database.php and add your database credentials:**
```
public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => 'root',
        'password'     => 'Yourpassword',
        'database'     => 'Your_DatabaseName',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8',
        'DBCollat'     => 'utf8_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
    ];

```
**4. Migrate the Database Tables Go Sql/ci4.sql file
Import the database tables into you Database**

**5. Run the Application
To start the application, run the following command:**
```
php spark serve

```
*This will start the development server, and you can access your application at http://localhost:8080**

**Application Features:**

Developed an admin interface for managing Questionaire data, including:

Authentication:

● Implement user authentication using PHP sessions or tokens.
![alt text](image.png)
● Store user credentials securely in a database with hashed passwords.
![alt text](image-1.png)
Authorization:

● Created a system to manage user roles and permissions (Admin and Client).
● Defined access levels for different parts of the application based on user roles.
● Implemented role-based access control (RBAC) to enforce these permissions.
**Admin Interface**
![alt text](image-2.png)
![alt text](image-3.png)

![alt text](image-4.png)

**Client Interface**
![alt text](image-5.png)
![alt text](image-6.png)
Answer Submitted by Client stored displayed in the dasboard based on User_id.
![alt text](image-7.png)

User Management:
1. In Admin Login,
Create a setting page to add, edit, delete, and sort the Questions with the Answer Field
Type.
![alt text](image-8.png)
![alt text](image-9.png)
![alt text](image-10.png)
![alt text](image-11.png)
2. Create a new Questionnaire page on the Client Login side to list all the questions with
answer fields according to the setting. And store the client.
![alt text](image-12.png)


