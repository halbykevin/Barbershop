function showForm() {
    document.getElementById('contactForm').classList.remove('hidden');
}

function saveContact(event) {
    event.preventDefault();
    
    // Get form values
    const name = document.getElementById('name').value;
    const number = document.getElementById('number').value;
    const birthdate = document.getElementById('birthdate').value;
    const address = document.getElementById('address').value;
    
    // For now, just log the values
    console.log('Contact saved:', { name, number, birthdate, address });

    // Hide the form
    document.getElementById('contactForm').classList.add('hidden');

    // Clear the form
    document.getElementById('contactForm').reset();
}
