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
        </ul>
    </li>
    <li>Daten zum Testen bereitstellen (seeder)</li>
    <li>Controller</li>
    <li>Policy</li>
    <li>API</li>
    <li>Eventuell Oberfläche</li>
</ul>
<!-- ---------------------------------------------------------- -->
<h2>Probleme</h2>
<!-- ---------------------------------------------------------- -->
<h2>Ideen zur Umsetzung</h2>
<!-- ---------------------------------------------------------- -->
<h2>Fragen</h2>
<ul>
    <li>Wie mit .env umgehen (in Bezug auf github)?</li>
    <li>create database in migrations möglich?</li>
</ul>

