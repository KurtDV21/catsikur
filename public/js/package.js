// Function to toggle dropdown visibility
function toggleDropdown(dropdownId) {
    const dropdownContent = document.getElementById(dropdownId);
    dropdownContent.classList.toggle("show");

    // Close other dropdowns if they are open
    const dropdowns = document.getElementsByClassName("dropdown-content");
    for (let i = 0; i < dropdowns.length; i++) {
        if (dropdowns[i].id !== dropdownId && dropdowns[i].classList.contains('show')) {
            dropdowns[i].classList.remove('show'); // Close other dropdowns
        }
    }
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.getElementsByClassName("dropdown-content");
        for (let i = 0; i < dropdowns.length; i++) {
            if (dropdowns[i].classList.contains('show')) {
                dropdowns[i].classList.remove('show');
            }
        }
    }
}

const btnAdoptMe = document.getElementsByClassName('adopt-btn1')

window.onload = function() {
    // Attach click event listeners to all adopt buttons
    document.querySelectorAll('.adopt-btn1').forEach(button => {
        button.addEventListener('click', function() {
            alert('Redirecting to login page...');
            window.location.href = "/loginto";  // Redirect to login page
        });
    });
}
