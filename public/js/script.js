import 'flowbite'

window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('shadow-lg');
    } else {
        navbar.classList.remove('shadow-lg');
    }
});

function filterAlumni(letter) {
    const alumniCards = document.querySelectorAll('.alumni-card');
    alumniCards.forEach(card => {
        const name = card.querySelector('.alumni-name').innerText.toLowerCase();
        const year = card.getAttribute('data-year'); // Get year from data attribute

        const isNameMatch = (letter === 'all') || name.startsWith(letter.toLowerCase());
        const isYearMatch = (document.getElementById('angkatan').value === 'all') || (year === document.getElementById('angkatan').value);

        if (isNameMatch && isYearMatch) {
            card.style.display = 'block'; // Show card
        } else {
            card.style.display = 'none'; // Hide card
        }
    });
}
