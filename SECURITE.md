# 🔒 Mesures de Sécurité - Bigscreen Survey

Ce document décrit les mesures de sécurité implémentées dans l'application de sondage Bigscreen.

---

## 1. Validation des Entrées Utilisateur

### ✅ FormRequest dédié (`StoreSurveyRequest`)
- **20 règles de validation** pour chaque question du sondage
- Validation stricte des types de données (string, integer, email)
- Limites de longueur sur tous les champs texte
- Messages d'erreur personnalisés et explicites en français

### ✅ Validations spécifiques
| Champ | Règle | Justification |
|-------|-------|---------------|
| Email | `email:rfc,dns` + `unique` | Validation DNS + unicité par participant |
| Âge | `min:13` / `max:120` | Conformité RGPD (âge minimum) |
| Notations | `min:1` / `max:5` | Bornes strictes |
| Oui/Non | `in:Oui,Non` | Valeurs autorisées uniquement |
| Commentaires | `min:20` / `max:500` | Réponses significatives |

---

## 2. Protection CSRF (Cross-Site Request Forgery)

### ✅ Token CSRF sur tous les formulaires POST
- Directive `@csrf` dans tous les formulaires Blade
- Middleware `VerifyCsrfToken` actif globalement
- Token unique par session, vérifié à chaque requête POST

### 🛡️ Protection contre
- Attaques CSRF (soumissions frauduleuses depuis d'autres sites)
- Replay attacks (réutilisation de requêtes)

---

## 3. Authentification Administrateur

### ✅ Guard dédié (`admin`)
- Séparation complète entre utilisateurs et administrateurs
- Guard personnalisé dans `config/auth.php`
- Model `Admin` dédié avec hachage bcrypt des mots de passe

### ✅ Protection des routes
```php
Route::middleware('auth:admin')->group(function () {
    // Routes administration protégées
});
```

---

## 4. Rate Limiting (Limitation de débit)

### ✅ Protection contre le spam et les attaques DoS
| Route | Limite | Fenêtre |
|-------|--------|---------|
| Soumission sondage | 5 requêtes | 1 minute |
| Login admin | 5 tentatives | 1 minute |

### 🛡️ Protection contre
- Spam de soumissions
- Attaques par force brute sur le login
- Déni de service (DoS)

---

## 5. Prévention XSS (Cross-Site Scripting)

### ✅ Échappement automatique
- Utilisation systématique de `{{ }}` (échappement HTML)
- Pas d'utilisation de `{!! !!}` pour les entrées utilisateur
- Encodage des caractères spéciaux

### 🛡️ Protection contre
- Injection de scripts malveillants
- Vol de cookies/sessions
- Défacement de pages

---

## 6. Tokens Sécurisés

### ✅ Génération cryptographique
```php
$token = Str::random(32); // 32 caractères aléatoires
```

### 🛡️ Protection contre
- Énumération des réponses (URLs non prédictibles)
- Accès non autorisé aux réponses d'autres utilisateurs

---

## 7. Protection des données sensibles

### ✅ Fichiers protégés
- `.env` exclu du versioning (`.gitignore`)
- Clés d'API et secrets non exposés
- Base de données SQLite dans `/database`

### ✅ Hachage des mots de passe
- Algorithme bcrypt (coût par défaut Laravel)
- Mots de passe jamais stockés en clair

---

## 📋 Checklist de sécurité

| Mesure | Statut | Fichier/Emplacement |
|--------|--------|---------------------|
| Validation des entrées | ✅ | `app/Http/Requests/StoreSurveyRequest.php` |
| Protection CSRF | ✅ | `@csrf` dans les vues Blade |
| Authentification admin | ✅ | `config/auth.php` + Guard admin |
| Rate Limiting | ✅ | `routes/web.php` (middleware throttle) |
| Échappement XSS | ✅ | `{{ }}` dans les vues Blade |
| Tokens sécurisés | ✅ | `Str::random(32)` |
| Hachage mots de passe | ✅ | bcrypt via Laravel |
| Email unique | ✅ | `unique:survey_submissions,email` |

---

## 🔗 Références

- [Laravel Security Best Practices](https://laravel.com/docs/security)
- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [RGPD - Âge minimum](https://www.cnil.fr/fr/reglement-europeen-protection-donnees)

---

*Document mis à jour le 09/12/2024*
