async function switchForm(formName, event) {
    event.preventDefault();
    const loginForm = document.getElementById('login-form');
    const registerForm = document.getElementById('register-form');

    if (formName === 'register') {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    } else {
        registerForm.style.display = 'none';
        loginForm.style.display = 'block';
    }
}

async function processForm(formType, event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);
    const url = (formType === 'login') ? 'process_login.php' : 'process_register.php';

    try {
        const response = await fetch(url, {
            method: 'POST',
            body: formData
        });

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }

        const result = await response.json();

        if (result.success) {
            // Redirect user based on role after successful login or register
            if (formType === 'login') {
                if (result.role === 'admin') {
                    window.location.href = 'dashboard_admin.php';
                } else {
                    window.location.href = 'dashboard_user.php';
                }
            } else {
                // Handle success message for registration
                alert('Registration successful!');
                switchForm('login', event);
            }
        } else {
            alert(result.message); // Show error message
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Something went wrong. Please try again later.');
    }
}

