document.addEventListener('DOMContentLoaded', function() {
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const usernameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passError');

    function updateError(element, message) {
        element.textContent = message;
    }

    username.addEventListener('input', function() {
        const minLength = 3;
        if (this.value.length < minLength) {
            updateError(usernameError, `Username must be at least ${minLength} characters long.`);
        } else {
            updateError(usernameError, '');
        }
    });

    email.addEventListener('input', function() {
        const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (!regex.test(this.value)) {
            updateError(emailError, 'Please enter a valid email address.');
        } else {
            updateError(emailError, '');
        }
    });

    password.addEventListener('input', function() {
        const minLength = 8;
        const hasNumber = /\d/;
        const hasLetter = /[a-zA-Z]/;
        if (this.value.length < minLength || !hasNumber.test(this.value) || !hasLetter.test(this.value)) {
            updateError(passwordError, 'Password must be at least 8 characters long and include at least one number and one letter.');
        } else {
            updateError(passwordError, '');
        }
    });

    document.getElementById('signup-form').addEventListener('submit', function(event) {
        let isValid = true;
        if (usernameError.textContent !== '') {
            isValid = false;
        }
        if (emailError.textContent !== '') {
            isValid = false;
        }
        if (passwordError.textContent !== '') {
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            alert('Please correct the errors before submitting.');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.add-to-collection');
    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const gameId = this.getAttribute('data-game-id');
            fetch('add_to_collection.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'game_id=' + gameId
            })
            .then(response => response.text())
            .then(text => alert(text))
            .catch(error => console.error('Error:', error));
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const removeButtons = document.querySelectorAll('.remove-from-collection');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const gameId = this.getAttribute('data-game-id');
            fetch('remove_from_collection.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'game_id=' + gameId
            })
            .then(response => response.text())
            .then(text => {
                alert(text);
                window.location.reload(); // Reload the page to update the game list
            })
            .catch(error => console.error('Error:', error));
        });
    });
});


