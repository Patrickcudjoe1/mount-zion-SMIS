<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login_simple.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SIMS MT ZION</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            font-family: 'Arial', sans-serif; 
            background: #f5f5f5; 
            color: #333;
        }
        
        .container { 
            display: flex; 
            min-height: 100vh; 
        }
        
        /* Sidebar */
        .sidebar { 
            width: 250px; 
            background: white; 
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            padding: 20px 0;
        }
        
        .sidebar-header { 
            text-align: center; 
            padding: 20px; 
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        
        .logo { 
            color: #1e3a8a; 
            font-size: 18px; 
            font-weight: bold; 
            margin-bottom: 10px; 
        }
        .role-badge { 
            background: #3b82f6; 
            color: white; 
            padding: 5px 15px; 
            border-radius: 15px; 
            font-size: 12px; 
        }
        
        .nav-menu { padding: 0 20px; }
        .nav-item { 
            display: flex; 
            align-items: center; 
            padding: 15px; 
            margin-bottom: 5px; 
            color: #333; 
            text-decoration: none; 
            border-radius: 8px; 
            transition: all 0.3s;
        }
        .nav-item:hover, .nav-item.active { 
            background: #3b82f6; 
            color: white; 
        }
        .nav-item i { margin-right: 10px; width: 20px; }
        
        /* Main Content */
        .main-content { 
            flex: 1; 
            padding: 30px; 
            background: #f5f5f5;
        }
        
        .header { 
            background: white; 
            padding: 30px; 
            border-radius: 10px; 
            margin-bottom: 30px; 
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header h1 { 
            font-size: 28px; 
            margin-bottom: 10px; 
            color: #1e3a8a;
        }
        .header p { 
            font-size: 16px; 
            color: #666;
        }
        
        /* Dashboard Sections */
        .dashboard-section { 
            background: white; 
            border-radius: 10px; 
            padding: 30px; 
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .section-title { 
            color: #1e3a8a; 
            font-size: 20px; 
            margin-bottom: 20px; 
            display: flex; 
            align-items: center;
            font-weight: bold;
        }
        
        .section-title i { margin-right: 10px; }
        
        /* Statistics Grid */
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); 
            gap: 20px; 
            margin-bottom: 20px; 
        }
        
        .stat-card { 
            background: #3b82f6; 
            color: white; 
            padding: 20px; 
            border-radius: 10px; 
            text-align: center;
        }
        
        .stat-number { 
            font-size: 32px; 
            font-weight: bold; 
            margin-bottom: 5px; 
        }
        .stat-label { 
            font-size: 14px; 
            opacity: 0.9; 
        }
        
        /* Actions Grid */
        .actions-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); 
            gap: 20px; 
        }
        
        .action-card { 
            background: white; 
            padding: 25px; 
            border-radius: 10px; 
            text-align: center; 
            transition: all 0.3s;
            border: 2px solid #eee;
            cursor: pointer;
            text-decoration: none;
            color: inherit;
        }
        
        .action-card:hover { 
            border-color: #3b82f6; 
            transform: translateY(-2px); 
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.2);
        }
        
        .action-card i { 
            font-size: 40px; 
            color: #3b82f6; 
            margin-bottom: 15px; 
        }
        .action-card h3 { 
            color: #1e3a8a; 
            margin-bottom: 10px; 
            font-size: 18px;
        }
        .action-card p { 
            color: #666; 
            font-size: 14px; 
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; }
            .main-content { padding: 20px; }
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .actions-grid { grid-template-columns: 1fr; }
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">SIMS MT ZION</div>
                <div class="role-badge">Admin Portal</div>
            </div>
            
            <nav class="nav-menu">
                <a href="dashboard_simple.php" class="nav-item active">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <a href="teachers_simple.php" class="nav-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Manage Teachers</span>
                </a>
                <a href="students_simple.php" class="nav-item">
                    <i class="fas fa-user-graduate"></i>
                    <span>Manage Students</span>
                </a>
                <a href="classes_simple.php" class="nav-item">
                    <i class="fas fa-chalkboard"></i>
                    <span>Manage Classes</span>
                </a>
                <a href="assessments.php" class="nav-item">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Assessment Review</span>
                </a>
                <a href="reports_simple.php" class="nav-item">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
                <a href="../logout.php" class="nav-item">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <div class="header">
                <h1>Welcome back, Administrator!</h1>
                <p>Manage your school system efficiently</p>
            </div>

            <!-- Statistics Section -->
            <div class="dashboard-section">
                <h2 class="section-title">
                    <i class="fas fa-chart-bar"></i>
                    School Statistics
                </h2>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-number">150</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Total Teachers</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Total Classes</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-number">405</div>
                        <div class="stat-label">Total Assessments</div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Section -->
            <div class="dashboard-section">
                <h2 class="section-title">
                    <i class="fas fa-bolt"></i>
                    Quick Actions
                </h2>
                <div class="actions-grid">
                    <a href="teachers_simple.php" class="action-card">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <h3>Manage Teachers</h3>
                        <p>Add, edit, and manage teacher accounts</p>
                    </a>
                    <a href="students_simple.php" class="action-card">
                        <i class="fas fa-user-graduate"></i>
                        <h3>Manage Students</h3>
                        <p>Add, edit, and manage student records</p>
                    </a>
                    <a href="classes_simple.php" class="action-card">
                        <i class="fas fa-chalkboard"></i>
                        <h3>Manage Classes</h3>
                        <p>Organize and manage class structures</p>
                    </a>
                    <a href="assessments.php" class="action-card">
                        <i class="fas fa-clipboard-list"></i>
                        <h3>Assessment Review</h3>
                        <p>Review and manage student assessments</p>
                    </a>
                    <a href="reports_simple.php" class="action-card">
                        <i class="fas fa-chart-bar"></i>
                        <h3>Reports & Analytics</h3>
                        <p>Generate reports and view analytics</p>
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
