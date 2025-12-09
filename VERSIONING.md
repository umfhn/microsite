# Versionierungspolicy für dKIP µSiteBuilder

## Semantic Versioning (SemVer) Schema

Wir verwenden das Semantic Versioning Schema: **MAJOR.MINOR.PATCH**

- **MAJOR**: Inkompatible API-Änderungen oder große Funktionserweiterungen
- **MINOR**: Rückwärtskompatible neue Funktionen
- **PATCH**: Rückwärtskompatible Bugfixes oder kleine Verbesserungen

### Beispiele für Versionserhöhungen

- **Feature-UX-Release** (z. B. UX-MSB-GEO-PWA-001): `1.4.0` → `1.5.0` (MINOR)
- **Bugfix/kleines Ticket**: `1.4.0` → `1.4.1` (PATCH)
- **Breaking Changes**: `1.4.0` → `2.0.0` (MAJOR)

## Single Source of Truth (SSOT)

**Master-Version**: `package.json` (`"version": "1.4.0"`)

Alle anderen Versionseinträge werden von dieser Master-Version abgeleitet und automatisch synchronisiert.

## Versionseinträge (konsistent zu halten)

1. **package.json**: `"version": "1.4.0"` (Master)
2. **dkib-mu-sitebuilder.php**: Plugin-Header `Version: 1.4.0`
3. **dkib-mu-sitebuilder.php**: Konstante `DKIB_MU_VERSION = '1.4.0'`
4. **CHANGELOG.md**: Stable Tag `[1.4.0]` und Versionsgeschichte
5. **Plugin-Name**: `dKIP µSiteBuilder v1.4.0` (mit Versionssuffix)

## Build- und Release-Prozess

### Version-Bump Kommandos

```bash
# PATCH erhöhen (Bugfix)
npm run bump-patch

# MINOR erhöhen (neues Feature)
npm run bump-minor

# MAJOR erhöhen (Breaking Changes)
npm run bump-major
```

### ZIP-Erstellung

```bash
npm run build-zip
```

Erzeugt: `dist/dkip-microsite-builder-1.4.0.zip`

### Vollständiger Release-Prozess

1. Ticket abschließen
2. Version erhöhen (`npm run bump-<type>`)
3. CHANGELOG.md aktualisieren
4. ZIP erstellen (`npm run build-zip`)
5. Deployment testen

## Verantwortlichkeiten

- **KC**: Führt Version-Bump nach Ticket-Freigabe durch
- **PL**: Prüft Konsistenz vor Deployment
- **PC**: (Optional) Prüft Release-Zyklus auf Vollständigkeit

## Wichtige Regeln

1. **Keine zwei Artefakte ohne Versionsunterschied**: Im `dist/` Ordner dürfen keine zwei ZIPs mit gleichem Namen existieren
2. **Plugin-Name enthält Version**: Im WordPress-Backend muss die Version im Plugin-Namen sichtbar sein
3. **Jedes Ticket → neue Version**: Mindestens PATCH-Erhöhung pro Ticket