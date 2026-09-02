function switchForm(form, event) {
    event.preventDefault();
    document.getElementById('login-form').style.display = form === 'login' ? 'block' : 'none';
    document.getElementById('register-form').style.display = form === 'register' ? 'block' : 'none';
}

function processForm(form, event) {
    event.preventDefault();
    let formData = new FormData(document.getElementById(form));
    fetch(`controller/${form}.php`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (form === 'login') {
                window.location.reload();
            } else {
                alert('Registration successful! Please login.');
                switchForm('login', event);
            }
        } else {
            alert(data.message);
        }
    });
    return false;
}

document.getElementById('profile-button').addEventListener('click', () => {
    fetch('profile.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('profile-nama').textContent = `nama: ${data.data.nama}`;
            document.getElementById('profile-id').textContent = `id: ${data.data.id}`;
            document.getElementById('profile-alamt').textContent = `alamat: ${data.data.alamat}`;
            document.getElementById('profile-info').style.display = 'block';
        } else {
            alert(data.message);
        }
    });
});
