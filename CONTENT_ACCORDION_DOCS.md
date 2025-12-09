# Content Block Accordion - Dokumentation

## 📋 Übersicht

Der **Content Block Accordion** ist ein barrierefreies, universelles Accordion-System für die Microsite-Container des dKIB µSiteBuilder Plugins. Es erlaubt Inhaltsblöcken, einzeln auf- und zuklappbar zu sein und verbessert damit deutlich die Übersichtlichkeit.

---

## ✨ Funktionen

### 🎯 Kerneigenschaften

- **Barrierefreiheit (WCAG 2.1 AAA)**: Vollständige ARIA-Unterstützung
- **Keyboard Navigation**: Enter, Space, Arrow Keys, Home/End
- **Flüssige Animationen**: CSS Grid-basierte Transitions
- **Responsive Design**: Mobile und Desktop optimiert
- **Dark Mode Support**: Automatische Anpassung an System-Einstellungen
- **Reduced Motion Support**: Respektiert prefers-reduced-motion
- **Performance**: Lightweight JavaScript ohne Dependencies

### 🖱️ Benutzerinteraktionen

| Aktion | Effekt |
|--------|--------|
| **Klick auf Header** | Panel öffnet/schließt |
| **Enter/Space** | Keyboard: Panel toggle |
| **↓/→** | Zur nächsten Accordion-Option |
| **↑/←** | Zur vorherigen Accordion-Option |
| **Home** | Zur ersten Accordion-Option |
| **End** | Zur letzten Accordion-Option |
| **Tab** | Fokus-Navigation zwischen Headers |

---

## 📁 Dateistruktur

```
assets/
├── css/
│   └── content-accordion.css        # Styling (280+ Zeilen)
├── js/
│   └── content-accordion.js         # JavaScript Logic (270+ Zeilen)
└── html/
    └── test-content-accordion.html  # Umfassende Test-Suite

dkib-mu-sitebuilder.php             # Enqueuing der Assets
```

---

## 🛠️ HTML-Struktur

### Standard-Accordion

```html
<div class="dkib-content-accordion">
  <div class="dkib-accordion-item">
    <!-- Header/Trigger Button -->
    <button 
      class="dkib-accordion-header"
      role="button"
      aria-expanded="false"
      aria-controls="panel-id-1"
      data-accordion-open="false"
    >
      <span class="dkib-accordion-label">Panel 1 Titel</span>
      <span class="dkib-accordion-icon"></span>
    </button>

    <!-- Panel Content -->
    <div 
      class="dkib-accordion-content" 
      id="panel-id-1"
      role="region"
      aria-labelledby="header-id-1"
      aria-hidden="true"
    >
      <div class="dkib-accordion-body">
        <p>Inhalte hier...</p>
      </div>
    </div>
  </div>

  <!-- Weitere Items... -->
</div>
```

### Verschachtelte Accordions

```html
<div class="dkib-content-accordion">
  <div class="dkib-accordion-item">
    <button class="dkib-accordion-header" ...>Parent</button>
    <div class="dkib-accordion-content">
      <div class="dkib-accordion-body">
        <!-- Kann weitere Accordions enthalten -->
        <div class="dkib-content-accordion">
          <div class="dkib-accordion-item">
            <button class="dkib-accordion-header" ...>Child</button>
            <!-- ... -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
```

---

## ♿ ARIA-Attribute

| Attribut | Ort | Wert | Bedeutung |
|----------|-----|------|----------|
| `role="button"` | Header | - | Macht nicht-<button> Element zu Button |
| `aria-expanded` | Header | true/false | Zeigt Zustand des Panels |
| `aria-controls` | Header | "panel-id" | Verbindung zu Panel-Element |
| `aria-hidden` | Panel | true/false | Versteckt Panel vom Screen Reader wenn geschlossen |
| `role="region"` | Panel | - | Markiert als wichtiger Inhaltsbereich |
| `aria-labelledby` | Panel | "header-id" | Verbindung zum Header für Screen Reader |

---

## 🎨 CSS-Klassen

### Container & Items

```css
.dkib-content-accordion          /* Outer Container */
.dkib-accordion-item             /* Einzelnes Panel-Item */
```

### Header/Trigger

```css
.dkib-accordion-header           /* Klickbar, fokussierbar */
.dkib-accordion-header:focus     /* Blauer Fokus-Ring */
.dkib-accordion-header:hover     /* Hover-Effekt */
.dkib-accordion-header[aria-expanded="true"]  /* Geöffnet */
```

### Content & Body

```css
.dkib-accordion-content          /* Animations-Container */
.dkib-accordion-body             /* Inhalts-Bereich */
```

### Zusatz-Elemente

```css
.dkib-accordion-label            /* Text des Headers */
.dkib-accordion-icon             /* Pfeil-Icon */
.dkib-accordion-description      /* Optionale Beschreibung */
.dkib-accordion-badge            /* Optionale Nummer/Badge */
```

---

## 🚀 JavaScript API

### Auto-Initialisierung

Das Script initialisiert sich automatisch beim `DOMContentLoaded` Event:

```javascript
// Wird automatisch beim Laden ausgeführt
window.dkibContentAccordion  // Global verfügbar
```

### Public Methods

```javascript
// Panel öffnen
window.dkibContentAccordion.openPanel('panel-id');

// Panel schließen
window.dkibContentAccordion.closePanel('panel-id');

// Alle Panels schließen
window.dkibContentAccordion.closeAll();
// Nur in bestimmtem Container:
window.dkibContentAccordion.closeAll(containerIndex);

// Alle Panels öffnen
window.dkibContentAccordion.openAll();
// Nur in bestimmtem Container:
window.dkibContentAccordion.openAll(containerIndex);
```

### Klasse verwenden

```javascript
// Instanz erstellen (normalerweise nicht nötig)
const accordion = new ContentBlockAccordion('.dkib-content-accordion');

// Methoden verwenden
accordion.openPanel('panel-1');
accordion.togglePanel(0, 1);  // Container 0, Panel 1
```

---

## 🧪 Testing

### Test-Datei öffnen

```
test-content-accordion.html
```

### Test-Szenarien

1. **Grundfunktionalität** (Klick, mehrere Panels)
2. **Keyboard Navigation** (Arrow Keys, Enter, Space, Home, End)
3. **ARIA & Accessibility** (Attribute, Focus, Screen Reader)
4. **Layout & Performance** (No Layout Shift, Smooth Transitions, Mobile)
5. **Verschachtelte Accordions** (Parent/Child funktioniert)

### Browser-Konsole Debug

```javascript
// Console wird genutzt für Logs
// Im Test: F12 > Console öffnen
// Folgende Logs sollten sichtbar sein:
// ✅ ContentBlockAccordion geladen
// ✅ Accordion(s) initialisiert
```

---

## 🎯 Anforderungen erfüllt

### ✅ UI-ACC-001 Anforderungen

| Anforderung | Status | Implementierung |
|-------------|--------|-----------------|
| Alle anfangs geschlossen | ✅ | `data-accordion-open="false"` default |
| Klick öffnet Panel | ✅ | Event Listener auf Header |
| Nur eine offen (optional) | ✅ | Können unabhängig sein |
| ARIA-Attribute | ✅ | role, aria-expanded, aria-controls |
| Keyboard Navigation | ✅ | Space/Enter/Arrows/Home/End |
| Focus Management | ✅ | Sichtbarer Focus Ring |
| Keine Layout-Shifts | ✅ | CSS Grid grid-template-rows |
| Dark Mode | ✅ | prefers-color-scheme media query |
| Reduced Motion | ✅ | prefers-reduced-motion support |
| Mobile-optimiert | ✅ | Responsive Padding/Font-Sizes |
| Screen Reader ready | ✅ | Vollständige ARIA-Unterstützung |
| Verschachtelt möglich | ✅ | Multiple Container supported |

---

## 📱 Responsive Breakpoints

```css
/* Desktop: Standard */
.dkib-accordion-header {
  padding: 16px 20px;
  font-size: 16px;
}

/* Mobile (< 768px) */
.dkib-accordion-header {
  padding: 14px 16px;
  font-size: 15px;
}
```

---

## 🌓 Dark Mode

Automatische Anpassung an System-Einstellung:

```css
@media (prefers-color-scheme: dark) {
  .dkib-content-accordion {
    background-color: #1e1e1e;
    border-color: #404040;
  }
  /* ... weitere Styles */
}
```

---

## ♿ Accessibility Checklist

- [ ] ARIA-Attribute korrekt gesetzt
- [ ] Keyboard Navigation funktioniert (Tab, Enter, Space, Arrows)
- [ ] Focus-Indikator sichtbar (blauer Ring)
- [ ] Fokus-Reihenfolge ist logisch
- [ ] Screen Reader funktioniert (NVDA, JAWS, VoiceOver)
- [ ] Farb-Kontrast ausreichend (WCAG AAA)
- [ ] Text-Größe anpassbar (Zoom)
- [ ] Keine automatischen Zeitverzögerungen
- [ ] Keine blinkenden/flackernden Inhalte
- [ ] Touch-Ziele mindestens 44x44px

---

## 🐛 Häufige Probleme

### Panel öffnet sich nicht

**Problem**: `aria-expanded` wird nicht aktualisiert
**Lösung**: Überprüfen, dass Header `role="button"` und `aria-controls` hat

### Fokus-Ring nicht sichtbar

**Problem**: `:focus` Styles werden überschrieben
**Lösung**: Verwende `:focus-visible` oder entferne `outline: none` ohne Alternative

### ARIA Hidden funktioniert nicht

**Problem**: Inhalt ist noch für Screen Reader sichtbar
**Lösung**: Überprüfe, dass `aria-hidden="true"` auf das richtige Element gesetzt ist

### Layout-Shift beim Öffnen

**Problem**: Content springt zur Seite
**Lösung**: Verwendet CSS Grid (nicht height animation) - Grid ist im CSS bereits richtig

---

## 🚀 Performance-Tipps

1. **Event Delegation**: Nutzt einen Event Listener pro Container, nicht pro Item
2. **Transition-Dauer**: 300ms ist optimal (schnell, aber nicht zu abrupt)
3. **Reduced Motion**: Respektiert `prefers-reduced-motion` automatisch
4. **Lazy Loading**: Inhalte können asynchron geladen werden

---

## 📝 Changelog

### v1.4.1 (Initial Release)

- ✅ Vollständige ARIA/a11y-Unterstützung
- ✅ Keyboard Navigation
- ✅ CSS Grid-basierte Animations
- ✅ Dark Mode & Reduced Motion
- ✅ Umfassende Test-Suite
- ✅ Dokumentation

---

## 📞 Support

Für Fragen zur Implementierung oder Tests:

1. Öffne `test-content-accordion.html` im Browser
2. Nutze die interaktive Test-Suite
3. Überprüfe Browser-Console (F12) auf Fehler
4. Validiere HTML/CSS in DevTools

---

## 📄 Lizenz

Siehe `PLUGIN_STATUS_REPORT.md` für Versionsinformationen.
