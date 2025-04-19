<?php
declare(strict_types=1);

// ——————————————————————————————————
// 1) Autoload des dépendances (Dotenv + PHPMailer, etc.)
// ——————————————————————————————————
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// ——————————————————————————————————
// 2) Charger les variables d’environnement
//    (nécessite un fichier .env non versionné)
// ——————————————————————————————————
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// ——————————————————————————————————
// 3) Récupération des configs via .env
//    (voir .env.example pour le template)
// ——————————————————————————————————
$dbHost   = $_ENV['DB_HOST']   ?? '127.0.0.1';      // Hôte MySQL local
$dbName   = $_ENV['DB_NAME']   ?? 'ma_base_locale'; // Nom de la BDD locale
$dbUser   = $_ENV['DB_USER']   ?? 'mon_user_local'; // Utilisateur MySQL local
$dbPass   = $_ENV['DB_PASS']   ?? 'mon_pass_local'; // Mot de passe MySQL local

$smtpHost = $_ENV['SMTP_HOST'] ?? '127.0.0.1';      // Hôte SMTP (MailHog, etc.)
$smtpPort = (int)($_ENV['SMTP_PORT'] ?? 1025);     // Port SMTP de dev (ex. 1025)
$smtpUser = $_ENV['SMTP_USER'] ?? '';              // User SMTP (vide si pas d’auth)
$smtpPass = $_ENV['SMTP_PASS'] ?? '';              // Pass SMTP (vide si pas d’auth)

// ——————————————————————————————————
// 4) Récupération et nettoyage des données POST
// ——————————————————————————————————
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$sujet   = trim($_POST['sujet']   ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$message) {
    die('Merci de remplir tous les champs obligatoires.');
}

// ——————————————————————————————————
// 5) Connexion à la base de données
// ——————————————————————————————————
try {
    $pdo = new PDO(
        "mysql:host={$dbHost};dbname={$dbName};charset=utf8",
        $dbUser,
        $dbPass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erreur de connexion BDD : " . htmlspecialchars($e->getMessage()));
}

// ——————————————————————————————————
// 6) Insertion du message
// ——————————————————————————————————
$stmt = $pdo->prepare("
    INSERT INTO messages (name, email, sujet, message, created_at)
    VALUES (?, ?, ?, ?, NOW())
");
$stmt->execute([$name, $email, $sujet, $message]);

// ——————————————————————————————————
// 7) Envoi de la notification par email
// ——————————————————————————————————
$mail = new PHPMailer(true);

try {
    // === Réglages SMTP ===
    $mail->isSMTP();
    $mail->Host       = $smtpHost;
    $mail->SMTPAuth   = ! empty($smtpUser);
    $mail->Username   = $smtpUser;
    $mail->Password   = $smtpPass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // ou ENCRYPTION_SMTPS si tu utilises 465
    $mail->Port       = $smtpPort;

    // === From / To / ReplyTo ===
    $mail->setFrom('no‑reply@localhost', 'Portfolio 8bit (DEV)');
    $mail->addAddress('destinataire@exemple.com', 'Ton Nom');
    $mail->addReplyTo($email, $name);

    // === Contenu ===
    $mail->isHTML(false);
    $mail->Subject = "📬 Nouveau message (DEV)";
    $mail->Body    = <<<TXT
Tu as reçu un nouveau message depuis le formulaire de contact (ENV DEV) :

Nom    : $name
Email  : $email
Sujet  : $sujet

$message

TXT;

    $mail->send();
} catch (Exception $e) {
    // En dev on logge, en prod on désactive l’affichage
    error_log("PHPMailer Erreur : {$mail->ErrorInfo}");
}

// ——————————————————————————————————
// 8) Redirection vers la page de remerciements
// ——————————————————————————————————
header("Location: remerciements.html");
exit;
