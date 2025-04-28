<!DOCTYPE html>
<html>
<head>
    <style>
        .claim-box {
            background: var(--light-cream);
            margin: 15px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .response-card {
            background: var(--white);
            border-left: 4px solid var(--primary-medium);
            margin: 10px 0;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2 style="color: var(--primary-dark);">Réclamations</h2>  
    <?php foreach (($claims ?? []) as $claim): ?> <!-- Handle undefined/null $claims -->
        <!-- Ajouter l'affichage du statut -->
<div class="claim-box">
    <p><strong>Statut :</strong> <?= strtoupper($claim['status']) ?></p> <!-- Nouvel élément -->
    <p><?= htmlspecialchars($claim['content']) ?></p>
</div>
            <!-- Formulaire réponse -->
            <form action="/claims/response" method="POST">
                <input type="hidden" name="claim_id" value="<?= $claim['id'] ?>">
                <textarea name="content" required></textarea>
                <button type="submit">Répondre</button>
            </form>
            <!-- Réponses -->
            <div class="responses">
                <?php foreach($claim['responses'] ?? [] as $response): ?>
                    <div class="response-card">
                        <p><?= htmlspecialchars($response['content']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>