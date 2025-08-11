# SIMS MT ZION - School Management System

A comprehensive web-based school management system built with PHP, MySQL, HTML, CSS, and JavaScript. The system provides role-based access for administrators and teachers to manage students, classes, assessments, and generate reports.

## 🚀 Features

### Core Features
- **Authentication System**: Secure login for administrators and teachers
- **Student Management**: Add, edit, and manage student records
- **Teacher Portal**: Upload assessments, enter scores, view student history
- **Classroom System**: Assign students and teachers to classes
- **Grading System**: Enter, view, and edit scores for exams and continuous assessments
- **Reports**: Generate report cards, performance charts, and summaries

### User Roles
- **Administrator**: Create teacher accounts, manage students, view system statistics
- **Teacher**: Access assigned classes, manage student assessments, view performance data

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Backend**: PHP 7.4+
- **Database**: MySQL 5.7+
- **Web Server**: Apache/Nginx
- **Icons**: Font Awesome 6.0
- **Fonts**: Google Fonts (Inter)

## 📋 Prerequisites

Before running this application, ensure you have:

1. **Web Server**: Apache or Nginx
2. **PHP**: Version 7.4 or higher
3. **MySQL**: Version 5.7 or higher
4. **PHP Extensions**: PDO, PDO_MySQL, mbstring

## 🚀 Installation

### Step 1: Clone or Download
```bash
# If using Git
git clone <repository-url>
cd sims-mt-zion

# Or download and extract the ZIP file
```

### Step 2: Database Setup
1. **Create Database**: Open your MySQL client (phpMyAdmin, MySQL Workbench, or command line)
2. **Run Setup Script**: Navigate to the project directory and run:
   ```bash
   php setup.php
   ```
   This will:
   - Create the `sims_mt_zion` database
   - Create all necessary tables
   - Insert default admin and teacher users
   - Populate sample data

### Step 3: Configure Web Server
1. **Apache**: Place the project in your web server's document root (e.g., `htdocs/` or `www/`)
2. **Nginx**: Configure your server block to point to the project directory
3. **Access URL**: Navigate to `http://localhost/sims-mt-zion/`

### Step 4: Database Configuration (Optional)
If you need to modify database settings, edit the connection parameters in:
- `login.php`
- `setup.php`
- `admin/dashboard.php`
- Other PHP files as needed

Default database settings:
```php
$host = 'localhost';
$dbname = 'sims_mt_zion';
$username = 'root';
$password = '';
```

## 👥 Default Credentials

After running `setup.php`, you can login with these default credentials:

### Administrator
- **Email**: admin@sims.com
- **Password**: admin123

### Teacher
- **Email**: teacher@sims.com
- **Password**: teacher123

## 📁 Project Structure

```
sims-mt-zion/
├── index.html              # Landing page
├── login.php              # Authentication page
├── setup.php              # Database setup script
├── logout.php             # Logout handler
├── admin/                 # Administrator panel
│   └── dashboard.php      # Admin dashboard
├── teacher/               # Teacher panel (to be implemented)
├── assets/                # Static assets
│   ├── css/              # Stylesheets
│   │   ├── style.css     # Main styles
│   │   ├── login.css     # Login page styles
│   │   └── admin.css     # Admin panel styles
│   └── js/               # JavaScript files
│       ├── main.js       # Main scripts
│       ├── login.js      # Login page scripts
│       └── admin.js      # Admin panel scripts
└── README.md             # This file
```

## 🗄️ Database Schema

### Tables
- **users**: User accounts (admin/teacher)
- **students**: Student information
- **classes**: Class/course information
- **subjects**: Subject/course listings
- **assessments**: Student assessment records

### Key Relationships
- Students are assigned to classes
- Teachers are assigned to classes
- Assessments link students to subjects with scores

## 🔧 Development Phases

### Phase 1: Basic Teacher Portal ✅
- [x] Teacher login system
- [x] Basic dashboard structure
- [ ] Add/view students
- [ ] Submit assessments
- [ ] View previous scores

### Phase 2: Admin Panel 🔄
- [x] Admin dashboard
- [ ] Manage teachers
- [ ] Manage students
- [ ] Manage classes
- [ ] Manage subjects

### Phase 3: Reports & Export 📊
- [ ] Generate printable PDFs
- [ ] Export scores to CSV
- [ ] Charts & student analytics

## 🎨 Features

### Landing Page
- Modern, responsive design
- Smooth scrolling navigation
- Feature highlights
- Contact information

### Authentication
- Role-based login (Admin/Teacher)
- Password visibility toggle
- Real-time form validation
- Error handling and notifications

### Admin Dashboard
- Statistics overview
- Quick action buttons
- Recent activities feed
- Sidebar navigation

## 🔒 Security Features

- **Password Hashing**: Uses PHP's `password_hash()` and `password_verify()`
- **Session Management**: Secure session handling
- **Role-based Access**: Different interfaces for admin and teacher
- **Input Validation**: Client and server-side validation
- **SQL Injection Protection**: Prepared statements with PDO

## 🐛 Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Ensure MySQL is running
   - Verify database credentials in PHP files
   - Check if `sims_mt_zion` database exists

2. **Page Not Found (404)**
   - Verify web server configuration
   - Check file permissions
   - Ensure URL path is correct

3. **Login Issues**
   - Run `setup.php` to create default users
   - Check database connection
   - Verify session configuration

4. **Styling Issues**
   - Check if CSS files are accessible
   - Verify Font Awesome CDN connection
   - Clear browser cache

### Debug Mode
To enable error reporting, add this to the top of PHP files:
```php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 📞 Support

For support or questions:
- Create an issue in the repository
- Contact the development team
- Check the troubleshooting section above

## 🔄 Updates

### Version 1.0.0
- Initial release with basic functionality
- Admin dashboard implementation
- Authentication system
- Database setup and sample data

---

**Note**: This is a development version. For production use, ensure proper security measures, backup procedures, and thorough testing.

