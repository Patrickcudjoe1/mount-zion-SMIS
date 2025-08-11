// Login Page JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Password toggle functionality
    window.togglePassword = function() {
        const passwordInput = document.getElementById('password');
        const toggleButton = document.querySelector('.password-toggle i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleButton.classList.remove('fa-eye');
            toggleButton.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleButton.classList.remove('fa-eye-slash');
            toggleButton.classList.add('fa-eye');
        }
    };

    // Form validation
    const loginForm = document.querySelector('.login-form');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const roleSelect = document.getElementById('role');

    // Real-time validation
    emailInput.addEventListener('blur', function() {
        validateEmail(this.value);
    });

    passwordInput.addEventListener('blur', function() {
        validatePassword(this.value);
    });

    roleSelect.addEventListener('change', function() {
        validateRole(this.value);
    });

    // Email validation
    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const formGroup = emailInput.closest('.form-group');
        
        if (!email) {
            showFieldError(formGroup, 'Email is required');
            return false;
        } else if (!emailRegex.test(email)) {
            showFieldError(formGroup, 'Please enter a valid email address');
            return false;
        } else {
            clearFieldError(formGroup);
            return true;
        }
    }

    // Password validation
    function validatePassword(password) {
        const formGroup = passwordInput.closest('.form-group');
        
        if (!password) {
            showFieldError(formGroup, 'Password is required');
            return false;
        } else if (password.length < 6) {
            showFieldError(formGroup, 'Password must be at least 6 characters');
            return false;
        } else {
            clearFieldError(formGroup);
            return true;
        }
    }

    // Role validation
    function validateRole(role) {
        const formGroup = roleSelect.closest('.form-group');
        
        if (!role) {
            showFieldError(formGroup, 'Please select a role');
            return false;
        } else {
            clearFieldError(formGroup);
            return true;
        }
    }

    // Show field error
    function showFieldError(formGroup, message) {
        // Remove existing error message
        clearFieldError(formGroup);
        
        // Add error class to input
        const input = formGroup.querySelector('input, select');
        input.classList.add('error');
        
        // Create and add error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        formGroup.appendChild(errorDiv);
    }

    // Clear field error
    function clearFieldError(formGroup) {
        const input = formGroup.querySelector('input, select');
        input.classList.remove('error');
        
        const errorMessage = formGroup.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }

    // Form submission
    loginForm.addEventListener('submit', function(e) {
        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();
        const role = roleSelect.value;

        let isValid = true;

        // Validate all fields
        if (!validateEmail(email)) isValid = false;
        if (!validatePassword(password)) isValid = false;
        if (!validateRole(role)) isValid = false;

        if (!isValid) {
            e.preventDefault();
            showNotification('Please fix the errors before submitting.', 'error');
            return false;
        }

        // Show loading state
        const submitButton = loginForm.querySelector('button[type="submit"]');
        submitButton.classList.add('loading');
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
    });

    // Notification system
    function showNotification(message, type = 'info') {
        // Remove existing notifications
        const existingNotifications = document.querySelectorAll('.notification');
        existingNotifications.forEach(notification => notification.remove());

        // Create new notification
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.innerHTML = `
            <i class="fas fa-${type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        document.body.appendChild(notification);
        
        // Animate in
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 5000);
    }

    // Add notification styles
    const notificationStyles = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            color: white;
            font-weight: 500;
            z-index: 10000;
            transform: translateX(100%);
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            max-width: 400px;
        }
        
        .notification.show {
            transform: translateX(0);
        }
        
        .notification-info {
            background: #667eea;
        }
        
        .notification-error {
            background: #e74c3c;
        }
        
        .notification-success {
            background: #27ae60;
        }
    `;

    const styleSheet = document.createElement('style');
    styleSheet.textContent = notificationStyles;
    document.head.appendChild(styleSheet);

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Enter key submits form
        if (e.key === 'Enter' && document.activeElement.tagName !== 'BUTTON') {
            loginForm.dispatchEvent(new Event('submit'));
        }
        
        // Escape key clears form
        if (e.key === 'Escape') {
            loginForm.reset();
            clearAllErrors();
        }
    });

    // Clear all errors
    function clearAllErrors() {
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach(group => {
            clearFieldError(group);
        });
    }

    // Auto-focus first field
    setTimeout(() => {
        roleSelect.focus();
    }, 100);

    // Demo credentials auto-fill
    const demoButtons = document.createElement('div');
    demoButtons.className = 'demo-buttons';
    demoButtons.innerHTML = `
        <button type="button" class="btn btn-secondary btn-sm" onclick="fillDemoCredentials('admin')">
            Fill Admin Demo
        </button>
        <button type="button" class="btn btn-secondary btn-sm" onclick="fillDemoCredentials('teacher')">
            Fill Teacher Demo
        </button>
    `;
    
    const demoInfo = document.querySelector('.demo-info');
    if (demoInfo) {
        demoInfo.parentNode.insertBefore(demoButtons, demoInfo);
    }

    // Add demo button styles
    const demoButtonStyles = `
        .demo-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
            margin-bottom: 1rem;
        }
        
        .btn-sm {
            padding: 8px 16px;
            font-size: 0.85rem;
        }
        
        .btn-secondary {
            background: #6c757d;
            color: white;
            border: none;
        }
        
        .btn-secondary:hover {
            background: #5a6268;
        }
    `;

    const demoStyleSheet = document.createElement('style');
    demoStyleSheet.textContent = demoButtonStyles;
    document.head.appendChild(demoStyleSheet);
});

// Fill demo credentials
function fillDemoCredentials(type) {
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const roleSelect = document.getElementById('role');

    if (type === 'admin') {
        emailInput.value = 'admin@sims.com';
        passwordInput.value = 'admin123';
        roleSelect.value = 'admin';
    } else if (type === 'teacher') {
        emailInput.value = 'teacher@sims.com';
        passwordInput.value = 'teacher123';
        roleSelect.value = 'teacher';
    }

    // Trigger validation
    emailInput.dispatchEvent(new Event('blur'));
    passwordInput.dispatchEvent(new Event('blur'));
    roleSelect.dispatchEvent(new Event('change'));
}
