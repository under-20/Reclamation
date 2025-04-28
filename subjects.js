document.addEventListener('DOMContentLoaded', () => {
    // Gestion de la création de sujet
    document.getElementById('subject-form').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const formData = {
            title: document.getElementById('title').value,
            description: document.getElementById('description').value
        };

        try {
            const response = await fetch('/subjects/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            });
            
            if(response.ok) {
                window.location.reload();
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
});

// Ajouter la gestion des réponses
document.querySelectorAll('.response-form').forEach(form => {
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const claimId = form.dataset.claimId;
        const content = form.querySelector('textarea').value;

        try {
            const response = await fetch('/subjects/create', {
                method: 'POST',                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ claim_id: claimId, content })
            });
            
            if(response.ok) {
                window.location.reload();
            }
        } catch (error) {
            console.error('Error:', error);
        }
    });
});