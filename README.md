# Slovo Theme (WordPress / PHP)

## Beschreibung
Dieses Projekt implementiert ein individuelles WordPress-Theme namens **Slovo**, das speziell für den Sprachlern-Service Slovo.live entwickelt wurde. Das Theme leitet Benutzer nach dem Login auf personalisierte Seiten weiter und zeigt für Gäste eine zentrale Willkommensseite an.

## Funktionen
Benutzerdefinierte Weiterleitungen nach Login:
Bestimmte Benutzer werden direkt auf ihre persönliche Homepage geleitet.
Administratoren gehen automatisch ins WordPress-Dashboard (`wp-admin`).
Alle anderen Benutzer landen auf der Frontpage `/welcome/`.

Frontpage-Logik:
Angemeldete Benutzer werden entsprechend ihrer Rolle/Benutzername weitergeleitet.
Gäste sehen die Willkommensseite (`welcome.php`) mit Login-Formular.

Benutzeroberfläche:
Stilvolle Pastell-Hintergründe und responsive Layouts.
„Blur-Toggle“ Funktion für interaktive Textelemente.
Angepasste Buttons, Links und Farbakzente.
Entfernt unnötige JSON-Prefetch-Daten aus dem Content.

## Technische Details
**PHP & WordPress Funktionen:**
  * `add_filter('login_redirect', ...)` für Login-Weiterleitungen.
  * `add_action('template_redirect', ...)` für Frontpage-Logik.
  * `wp_enqueue_style()` und `wp_enqueue_script()` für CSS/JS.
  * `wp_add_inline_script()` für benutzerdefiniertes JS (Blur-Toggle).
  
**HTML/CSS:**
  * Responsive Design für mobile Endgeräte.
  * Farblich codierte Textakzente (.eng1 bis .eng10).
  * Stile für Content-Blöcke, Buttons und Links.

## Ablauf / Benutzerführung
1. Benutzer öffnet die Startseite von Slovo.live.

2. Wenn der Benutzer nicht angemeldet ist:
Die Willkommensseite mit Login-Formular wird angezeigt.

3. Wenn der Benutzer angemeldet ist:
Benutzername in `slovo_get_user_redirects()`? → Weiterleitung zur persönlichen Homepage.
Administrator? → Weiterleitung zu `wp-admin`.
Alle anderen → bleiben auf Frontpage `/welcome/`.

4. Auf der Willkommensseite kann der Benutzer seine Zugangsdaten eingeben, um auf seine Lektionen zuzugreifen.

## Ausführen
1. Theme in das WordPress-Verzeichnis `/wp-content/themes/slovo/` hochladen.
2. Theme im WordPress-Dashboard aktivieren.
3. Sicherstellen, dass die Seite `/welcome/` existiert und als Frontpage gesetzt ist.
4. Benutzer können sich über das Login-Formular anmelden.

## Voraussetzungen
WordPress 6.x oder höher
PHP 7.4 oder höher
Standard-Webserver (Apache/Nginx) mit MySQL
