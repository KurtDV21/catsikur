document.querySelector('.profile-img').addEventListener('click', function() {
    document.getElementById('profileUpload').click();
});

document.getElementById('profileUpload').addEventListener('change', function(event) {
    const file = event.target.files[0]; 
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.profile-img').src = e.target.result; 
        };
        reader.readAsDataURL(file); 
    }
});

