## [1.4.1] - 2025-12-08

### Added
- 

### Changed
- 

### Fixed
- 

---

# dKIB µSiteBuilder - Changelog

## [1.4.0] - 2025-12-08 - GEO/KI & PWA UX-BOOST ✅

### ✨ UX-Verbesserungen

#### GEO/KI-Panel (UX-MSB-GEO-PWA-001)
- **Schema-Type Dropdown:** Deutsche Beschreibungen mit Beispielen (z. B. "Product – für Produkt- oder Angebotsseiten")
- **Experten-Modus:** Benutzerdefinierte Schema-Types in gekapseltem Bereich
- **Virtual Title:** "Alternativer Titel für KI/SEO (optional) – wenn leer, wird Seitentitel genutzt"
- **Virtual Description:** "Kurzbeschreibung für KI/SEO (optional). Wird für Suchmaschinen und KI-Systeme verwendet"
- **Keywords:** "3–7 Stichwörter, kommasepariert – z. B.: Coaching, Online-Kurs, Führungskräfte"
- **KI-Briefing:** "Beschreibe hier, worum es auf dieser Microsite geht. Wird für KI-Kontext verwendet"

#### PWA-Panel
- **PWA aktivieren:** "Nur aktivieren, wenn diese Microsite als eigenständige App genutzt werden soll"
- **PWA-Name:** "App-Name (z. B. 'Meine Visitenkarten-App')" mit Erklärung
- **PWA-Icon:** "Empfohlen: PNG oder SVG, mindestens 512×512 px, quadratisch"
- **Infotext:** "Eine PWA ermöglicht, diese Microsite wie eine App auf dem Smartphone zu nutzen"

### 🔧 Technische Verbesserungen

#### Versionierung & Build-Prozess (BUILD-MSB-VERS-001)
- **VERSIONING.md:** SemVer-Policy und Release-Prozess dokumentiert
- **package.json:** Version auf 1.4.0 erhöht (Master-Version)
- **Plugin-Header:** Version 1.4.0 und Name mit Versionssuffix
- **CHANGELOG.md:** Konsistente Versionsgeschichte
- **Build-Skripte:** `bump-patch`, `bump-minor`, `bump-major`, `build-zip`

### 📝 Geänderte Dateien

- `src/blocks.js` - UX-Texte für GEO/KI & PWA Panels
- `includes/class-block-registration.php` - PWA Icon-Fallback Logik
- `dkib-mu-sitebuilder.php` - Version 1.4.0 und Plugin-Name mit Suffix
- `package.json` - Version 1.4.0 und neue Build-Skripte
- `CHANGELOG.md` - v1.4.0 Eintrag hinzugefügt
- `VERSIONING.md` - Neue Datei mit Versionierungspolicy

### ⚠️ Breaking Changes

Keine Breaking Changes. Alle bestehenden Attribute bleiben 100% kompatibel.

### 🎯 Definition of Done - ✅ ERFÜLLT

- [x] Schema-Type mit Klartext-Labels und Hilfetexten
- [x] Custom Schema-Type in Experten-Modus ausgelagert
- [x] Virtual Title/Description/Keywords/KI-Briefing mit klaren Hilfetexten
- [x] PWA-Panel mit Info-/Warntexten erweitert
- [x] Fallback-Logik für Schema/PWA geprüft
- [x] Versionierungspolicy dokumentiert
- [x] Konsistente Version in allen Dateien
- [x] Build-Skripte für Version-Bump erstellt
- [x] npm run build läuft fehlerfrei

### 📊 Status

- ✅ **PRODUKTIONSBEREIT**
- ✅ **GEO/KI & PWA UX entschärft**
- ✅ **Versionierung konsistent**
- ✅ **Build-Prozess definiert**

---

## [1.3.0] - 2025-12-08 - LINK-PICKER UX-BOOST ✅

### ✨ UX-Verbesserungen

#### WordPress Link-Picker Integration (UX-MSB-LINKS-001)
- **AppBar Buttons (1-3):** WordPress Link-Picker statt nackte URL-Textfelder
- **NavBar Buttons (1-5):** WordPress Link-Picker für interne/externe Links
- **Benutzerfreundliche UI:** Klare Labels "Wohin soll dieser Button führen?"
- **Rückwärtskompatibilität:** Bestehende URL-Strings werden automatisch übernommen
- **Placeholder-Text:** "Link auswählen oder URL eingeben..." für bessere UX

### 🔧 Technische Details

#### URLInput-Komponente
- Import: `URLInput` aus `@wordpress/block-editor`
- Automatische Erkennung interner WordPress-Seiten
- Unterstützung für externe URLs
- Nahtlose Integration in bestehende InspectorControls

### 🧪 Getestete Szenarien

#### Editor-Tests
- ✅ AppBar Button 1: Interne Seite auswählen
- ✅ AppBar Button 1: Externe URL eingeben
- ✅ AppBar Button 2: Interne Seite auswählen
- ✅ AppBar Button 2: Externe URL eingeben
- ✅ AppBar Button 3: Interne Seite auswählen
- ✅ AppBar Button 3: Externe URL eingeben
- ✅ NavBar Button 1-5: Alle Szenarien getestet

#### Frontend-Tests
- ✅ Interne Links führen zur gewählten WordPress-Seite
- ✅ Externe Links öffnen in neuem Tab
- ✅ Keine JavaScript-Fehler in der Konsole
- ✅ Bestehende v1.2.0 Inhalte funktionieren weiterhin

### 📝 Geänderte Dateien

- `src/blocks.js` - URLInput bereits implementiert (keine Änderung nötig)
- `package.json` - Version auf 1.3.0 aktualisiert
- `CHANGELOG.md` - v1.3.0 Eintrag hinzugefügt

### ⚠️ Breaking Changes

Keine Breaking Changes. Alle bestehenden Attribute bleiben 100% kompatibel.

### 🎯 Definition of Done - ✅ ERFÜLLT

- [x] AppBar & NavBar verwenden Link-Picker statt URL-Textfelder
- [x] Interne Seiten sind auswählbar, externe URLs funktionieren
- [x] Bestehende v1.2.0 Inhalte funktionieren ohne Migration
- [x] npm run build läuft fehlerfrei
- [x] Block ist im Editor sichtbar und funktional
- [x] Frontend: Alle Buttons funktionieren ohne Fehler

### 📊 Status

- ✅ **PRODUKTIONSBEREIT**
- ✅ **Link-Picker vollständig implementiert**
- ✅ **UX-Ziel erreicht: Keine nackten URL-Textfelder mehr**
- ✅ **Rückwärtskompatibilität garantiert**

---

## [1.2.0] - 2025-12-08 - PRODUKTIONSBEREIT ✅

### ✨ Neue Features

#### Media Library Integration (UX-MSB-MEDIA-001)
- **AppBar Logo:** Media Library Picker mit Vorschau, Ändern und Entfernen
- **PWA Icon:** Media Library Picker mit Vorschau, Ändern und Entfernen
- Attachment-IDs werden gespeichert (`appBarLogoId`, `pwaIconId`)
- Optimierte Editor-Styles für Media Upload Controls

#### GEO/SEO & KI
- Virtueller Titel für SEO
- Virtuelle Beschreibung für SEO (max. 300 Zeichen)
- Schema-Type Auswahl (WebPage, FAQPage, Product, Event, etc.)
- Benutzerdefinierter Schema-Type
- Keywords (komma-getrennt)
- KI-Briefing für AI-Assistenten

#### Container-Styling
- Breite (%, px, vw, em)
- Höhe (auto, vh, px, em)
- Rahmenbreite (0-20px Slider)
- Rahmenradius (0-50px Slider)
- Rahmenfarbe (Color Picker)
- Transparenz-Optionen (Hintergrund, Rahmen)
- **Live-Vorschau im Editor**

#### Farb-Einstellungen
- Hintergrundfarbe mit Color Picker
- Textfarbe mit Color Picker
- Rahmenfarbe mit Color Picker
- Live-Vorschau im Editor

### 🔧 Technische Verbesserungen

#### Cache-Busting (KRITISCH)
- Timestamp in JavaScript-Version verhindert Browser-Caching
- `DKIB_MU_VERSION . '-' . time()` in `class-block-registration.php`
- Garantiert, dass immer die neueste Version geladen wird

#### Browser-Kompatibilität
- Umstellung von ES6 Imports auf Browser-kompatibles JavaScript
- `var registerBlockType = wp.blocks.registerBlockType;` statt `import`
- Funktioniert ohne Build-Prozess

#### Block-Kategorie
- Kategorie von `'dkip-microsite'` auf `'common'` geändert
- Garantiert Sichtbarkeit im Block-Inserter

### 🐛 Behobene Fehler

- **KRITISCH:** Block war nicht sichtbar (ES6 Imports, Kategorie, Cache)
- **KRITISCH:** Browser-Cache verhinderte Updates
- Syntax-Fehler in großen JavaScript-Dateien
- Block-Kategorie existierte nicht

### 📝 Geänderte Dateien

- `assets/js/blocks-source.js` - Komplett neu (Build 3, ~25 KB)
- `includes/class-block-registration.php` - Cache-Busting hinzugefügt
- `assets/js/blocks-source.asset.php` - Dependencies aktualisiert
- `assets/css/editor.css` - Media Upload Styles
- `dkib-mu-sitebuilder.php` - Version auf 1.2.0

### 📚 Neue Dokumentation

- `VOLLZUGSMELDUNG-v1.2.0-FINAL.md` - Finale Vollzugsmeldung
- `VOLLZUGSMELDUNG-TECH-MSB-BASE-001-FINAL.md` - Baseline-Ticket
- `BUILD-TEST-ANLEITUNG.md` - Build & Test Anleitung

### ⚠️ Breaking Changes

Keine Breaking Changes. Alle bestehenden Attribute bleiben kompatibel.

### 🎯 Implementierungs-Strategie

**Build 1: Basis**
- Block-Registrierung
- Basis-Einstellungen
- InnerBlocks
- Cache-Busting

**Build 2: Media Library**
- AppBar Logo Picker
- PWA Icon Picker
- Farb-Einstellungen

**Build 3: GEO/SEO & Styling**
- Container-Styling
- GEO/SEO Felder
- Live-Vorschau

### 📊 Status

- ✅ **PRODUKTIONSBEREIT**
- ✅ Alle Kern-Features funktionieren
- ✅ Cache-Problem gelöst
- ✅ Browser-kompatibel
- ✅ Vom Benutzer getestet und bestätigt

---

## [1.1.0] - 2024-12-04

### Added
- Accordion-Funktionalität mit ARIA-Support
- Smooth Transitions für Accordion
- XSS-Protection für Accordion-Labels
- MutationObserver für dynamische Inhalte

### Fixed
- Kritischer Fehler beim Einfügen von `dkip/sections-pro` Blöcken
- InnerBlocks werden jetzt korrekt gespeichert
- Accordion-Speicherung korrigiert

---

## [1.0.0] - 2024-11-15

### Added
- Initiale Version
- Microsite Container Block
- AppLayout (AppBar, NavBar, Back/Close)
- PWA-Unterstützung
- JSON-LD Schema.org Integration
- AI Context für KI-Assistenten
- GEO/SEO Features
- Statische Block-Registrierung

### Known Issues
- Media Library Integration fehlte (behoben in 1.2.0)
- Link-Picker fehlte (geplant für spätere Version)
- Icon-Picker fehlte (geplant für spätere Version)

---

## Upgrade-Hinweise

### Von 1.1.0 auf 1.2.0

**Keine Aktion erforderlich.** Alle bestehenden Blöcke bleiben kompatibel.

**Neue Features verfügbar:**
- Media Library für AppBar Logo und PWA Icon
- GEO/SEO Felder
- Container-Styling mit Live-Vorschau
- Farb-Einstellungen

**Empfohlen:**
- Browser-Cache leeren (Strg + Shift + R)
- Bestehende Blöcke öffnen und neue Features testen

---

## Geplante Features (Roadmap)

### Version 1.3.0 (geplant)
- AppBar Buttons (3 Stück)
- NavBar Buttons (5 Stück mit Icons)
- Back/Close Button
- Accordion-Funktionalität im Editor

### Version 1.4.0 (geplant)
- Link-Picker für URLs (UX-MSB-LINKS-001)
- Icon-Picker für NavBar (UX-MSB-ICONS-001)
- Erweiterte PWA-Optionen (Offline, Auto-Refresh, Analytics)

### Version 2.0.0 (geplant)
- Build-Prozess mit npm
- Minifizierte Production-Version
- Code-Splitting
- Performance-Optimierungen

---

**Aktuelle Version:** 1.2.0  
**Status:** ✅ PRODUKTIONSBEREIT  
**Letztes Update:** 2025-12-08
