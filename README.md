<h1>JobPortal</h1>
<!-- ---------------------------------------------------------- -->
<h2>Wichtig</h2>
<!-- ---------------------------------------------------------- -->
<h2>Use-Case</h2>
<b>Besucher:</b><br>
<ul>
    <li>Jobs ansehen/filtern nach Kategorie/Tag</li>
    <li>Unternehmendetails ansehen</li>
</ul>
<b>Nutzer:</b><br>
<ul>
    <li>Unternehmen anlegen</li>
    <li>Jobs anlegen für Unternehmen</li>
    <li>Unternehmen für Nutzer freigeben</li>
</ul>
<!-- ---------------------------------------------------------- -->
<h2>Design Entscheidungen</h2>
<h3>Datenbank</h3>
<b>Jobs:</b>
<ul>
    <li>Benötigen id/name/description</li>
    <li>Eine category zum filtern (extra table)</li>
    <li>Mehrere tags zum filtern (extra table [n:m]!)</li>
    <li>Eine company</li>
    <li>Einen Ersteller (user)</li>
    <li>eventuell bild</li>
</ul>
<b>Companies:</b>
<ul>
    <li>Benötigen id/name/description/address</li>
    <li>Mehrere jobs (foreign key in jobs)</li>
    <li>Einen Ersteller (user)</li>
    <li>Mehrere Mitarbeiter (berechtigt zum erstellen von jobs [n:m]!)</li>
    <li>eventuell bild</li>
</ul>
<b>Users:</b>
<ul>
    <li>benötigen id/name/email/password/address</li>
    <li>eventuell bild</li>
</ul>
<!-- ---------------------------------------------------------- -->
<h2>TODO Liste</h2>
<ul>
    <li>Migrations schreiben
        <ul>
            <li>Grundlagen sind gesetzt</li>
            <li>erste Struktur ist entwickelt<br>
            muss später eventuell erweitert werden,
            reicht aber erstmal um darauf aufzubauen
            und um den Rest zu entwickeln/verstehen.</li>
        </ul>
    </li>
    <li>Daten zum Testen bereitstellen (seeder)
        <ul>
            <li>Testdaten stehen bereit.</li>
            <li>Eventuell werden noch weitere Daten benötigt.</li>
        </ul>
    </li>    
    <li>Models und Controller erstellen
        <ul>
            <li>Erste Models und Controller erstellt (zum Einarbeiten)</li>
            <li>Baisfunktion stehen zur Verfügung</li>
            <li>Relationships sind eingetragen</li>
            <li>Abfragen bezüglich der Relationships sind möglich</li>
        </ul>
    </li>
    <li>Unnötige timestamps entfernen</li>
    <li>API
        <ul>
            <li>REST routes sind erstellt</li>
            <li>Http-response muss sinnvoll gestaltet werden</li>
            <li>relationships sind eingebaut</li>
        </ul>
    </li>
    <li>Policy</li>
    <li>Passwörter verschlüsseln (das geht bestimmt ganz einfach)
        <ul>
            <li>Hash::make() erfüllt den Job</li>
        </ul>
    </li>
    <li>Eventuell Oberfläche</li>
    <li>Transformieren der Daten bevor sie an die view Schicht geschickt werden</li>
</ul>
<!-- ---------------------------------------------------------- -->
<h2>Probleme</h2>
<!-- ---------------------------------------------------------- -->
<h2>Ideen zur Umsetzung</h2>
<ul>
    <li>User kann andere User zu Unternehmen hinzufügen/einladen</li>
    <li>PDF export (wenn noch Zeit übrig ist)</li>
</ul>
<!-- ---------------------------------------------------------- -->
<h2>Fragen</h2>
<ul>
    <li>Wie mit .env umgehen (in Bezug auf github)?
        <br>Muss jeder für sich definieren und für sich selbst anpassen,
        deswegen ignorieren.</li>
    <li>create database in migrations möglich?<br>
        macht keinen Sinn, weil jeder für sich die db definieren muss(Gefahr der Überschreibung)</li>
    <li>show(Model $model) oder show(int $id)?<br>
    Achtung in api.php nicht /{id}, sondern /{user} beispielsweise.</li>
    <li>abfragen/löschen/bearbeiten von nicht vorhandenen Daten bringt 404 - doch nach id fragen?</li>
    <li>Filtern von Anfragen? mehr routing oder geht das anders? filterRules()?</li>
    <li>Parameter für paginate() übergeben?</li>
</ul>

