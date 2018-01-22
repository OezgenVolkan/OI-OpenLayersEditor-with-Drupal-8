# OI-OpenLayersEditor-with-WordPress

Dieses kleine Projekt wird für das Modul "Ortsbasierte Informationssysteme" an der HTW-Berlin entwickelt. Das Projekt verbindet OpenLayers mit WordPress und bietet einen Editor für OpenStreetMaps. Mit dem Editor soll es möglich sein, Punkte, Linien und Polygone in die Karte einzuzeichnen und diese mit Meta-Daten abzuspeichern. Das Ergebnis des Projekts soll ein erster funktionsfähiger Prototyp sein.  

---

## 1 Einführung
### 1.1 Gegenstand und zweck des Dokuments

Dieses Dokument dient zur Dokumentation eines Projektes für das Modul „Ortsbasierte Informationssysteme“. Die Dokumentation beschreibt hierbei die Entwicklung einer Software. Das Dokument richtet sich dabei an den Entwickler, der sich für die Visualisierung von Geodaten und die Entwicklung von Editoren interessiert und es wird
davon ausgegangen, dass grundlegende Kenntnisse in der Softwareentwicklung sowie im Umgang mit
Geodaten vorhanden sind.

### 1.2 Aufbau des Dokuments

Die Dokumentation ist wie folgt gegliedert. Zunächst wird im Kapitel 2 das Produkt vorgestellt. Dabei
wird die Produktvision näher erläutert sowie die Zielgruppe für das Produkt beschrieben. Das 3.
Kapitel dient der Vorbereitung. Hier werden die verwendeten Anwendungen und Bibliotheken und die
Aufgaben der Software für das Produkt erläutert. Im 4. Kapitel wird die Realisierung dokumentiert. So
wird beschrieben wie die Softwarelösung implementiert wird. 


## 2 Vorstellung des Produktes
### 2.1 Produktvision

Als Software-Produkt soll mit Webtechnologien ein Editor entwickelt werden, mit dem man Geodaten Visualisieren, erstellen und     bearbeiten kann. Der Editor wird in ein Content Management System eingebettet und kann somit über ein Web-Browser bedient werden. Mit dem Editor soll es möglich sein, Punkte, Linien und Polygone auf einer OpenStreetMaps-Karte einzuzeichnen und mit Meta-Daten abzuspeichern. Zusätzlich soll es die Möglichkeit geben, nach beendigung der Zeichnung, die Punkte, Linien oder Polygone zu korrigieren. Dafür soll als Zielprodukt ein erster funktionsfähiger Prototyp entstehen.

### 2.2 Zielgruppe

Mögliche Zielgruppe könnten Personen oder Unternehmen sein, die mit Geoinformationen arbeiten. Genau gesehen kommen alle als Zielgruppe in Frage, die sich für die Erstellung oder Pflege von Karten interessieren. 


## 3 Vorbereitung
### 3.1 Verwendete Anwendungen und Bibliotheken
#### 3.1.1 XAMPP

* ##### Was ist XAMPP:

   XAMPP ist ein Open-Source Programmpaket. Es ermöglicht das Installieren und Konfigurieren eines Apache Webservers mit MySQL, PHP und Perl. Die Software wendet sich hauptsächlich an Entwickler, die eine Entwicklungsumgebung mit Datenbankanbindung benötigen. Durch die Nutzung erhält der Entwickler einen lokalen Apache-Webserver.

* ##### XAMPP installieren und konfigurieren

   XAMPP ist unter dem Link https://www.apachefriends.org/de/download.html herunterladbar. Nachdem die Software heruntergeladen und installiert wurde, muss die Anwendung gestartet werden. Nachdem Start öffnet sich das XAMPP Control Panel, wie unten im Bild zu sehen.
   
   ![alt text](https://a.fsdn.com/con/app/proj/xampp/screenshots/Screen%20Shot%202016-02-19%20at%2016.png/1 "XAMPP Control Panel")
   
   Die Module Apache und MySQL müssen über einen Klick auf den Start-Button gestartet werden. Wenn dies erfolgreich gewesen ist, sind die Modulnamen grün hinterlegt. Durch diesen Schritt wurde ein vollfunktionsfähiger lokaler Webserver mit MySQL-Datenbank Anbindung aufgesetzt. Nun kann man über einen Web-Browser unter der Adresse `http://localhost/` auf den lokalen Webserver zugreifen.
   
   Durch die Installation von XAMPP wurden am gewünschten Installationsort unter dem Ordner `XAMPP` mehrere Verzeichnisse und Dateien abgelegt. Für dieses Projekt ist das Verzeichnis `htdocs` von Bedeutung. Dies ist der öffentliche Ordner, wo die Source-Dateien der Webanwendungen gespeichert werden und über die Adresse `http://localhost/[Name_Webanwendung]` durch einen Web-Browser abrufbar sind. In dieses Verzeichnis wird auch dieses Projekt gespeichert und ist somit über `http://localhost/OI-OpenLayersEditor-with-WordPress` erreichbar. 

* ##### MySQL-Datenbank Tabelle über phpMyAdmin erstellen

   Für die WordPress Installation wird eine MySQL-Datenbank Tabelle benötigt, die Konfiguration für WordPress folgt im nächsten Kapitel. Da das MySQL-Modul von XAMPP gestartet ist, kann man über den Browser unter der Adresse `http://localhost/phpmyadmin` auf phpMyAdmin zugreifen, wie im folgenden Bild dargestellt.
   
   ![alt text](https://upload.wikimedia.org/wikipedia/commons/0/06/Screenshot-127.0.0.1_-_localhost_phpMyAdmin_3.3.2deb1ubuntu1_-_Chromium.png "phpMyAdmin")
   
   Über phpMyAdmin kann man Datenbanktabellen anlegen und bearbeiten. Wir möchten eine Datenbanktabelle anlegen, dazu klicken wir links in der Navigation auf den ersten Eintrag mit der Bezeichnung `Neu`. Hier vergeben wir lediglich den Namen der Tabelle, hier `osmeditor` **(Wichtig für die Folgende WordPress Installation)**.

#### 3.1.2 WordPress

* ##### Was ist WordPress:

   WordPress ist eine Open-Source-Software, zur Verwaltung der Inhalte einer Webseite. Mit der Webanwendung können Weblogs, Webseiten oder Webanwendungen erstellt werden. WordPress kann auch hierarchische Seiten verwalten und gestattet den Einsatz als Content-Management-System (CMS). Es basiert auf der Skriptsprache PHP und arbeitet mit einer MySQL-Datenbank.

* ##### Installation:

   Bevor wir die Anwendung aufsetzen können müssen wir es ersteinmal WordPress herunterladen. Unter dem Link https://de.wordpress.org/download/ können wir die Source-Dateien als Zip downloaden. Die Zip-Datei wird nun in das `htdocs/OI-OpenLayersEditor-with-Wordpress` Verzeichnis, welches in Kapitel **3.1.1 - XAMPP installieren und konfigurieren** erstellt wurde, entpackt. Als nächsten Schritt rufen wir die Adresse `http://localhost/OI-OpenLayersEditor-with-Wordpress` über ein Browser auf, es erscheint die Folgende Seite.
   
   ![alt text](http://homepageanleitung.de/wp-content/uploads/2015/07/wordpress-installieren.png "WordPress Begrüßung")
   
   WordPress begrüßt uns und teilt uns mit, dass wir eine existierende Datenbanktabelle benötigen und ohne diese Informationen nicht fortfahren können. Da wir aber bei der XAMPP Konfiguration eine Datenbanktabelle angelegt haben, können wir auf den Button `Los geht´s!` klicken. Damit gelangen wir zur nächsten Seite, wie im Bild unten gezeigt.
   
   ![alt text](https://online-marketing-site.de/wp-content/uploads/wordpress-installieren-zugangsdaten.png "WordPress Datenbank Informationen")
   
   Hier geben wir die Folgenden Informationen ein:
   * **Datenbank Name**: `osmeditor`
   * **Benutzername**: `root (bei XAMPP localhost standard)`
   * **Passwort**: `leer lassen (bei XAMPP localhost standard)`
   * **Datenbank host**: `localhost`
   * **Tabellen-Präfix**: `wp_ (standard bei Wordpress)`
   
   Nachdem wir die nötigen Datenbank Informationen eingegeben haben, klicken wir auf senden und wenn alles gut läuft kommt die letzte Seite der Installation, wie unten zu sehen.
   
   ![alt text](https://www.perun.net/wp-content/uploads/2015/12/wordpress-installieren.png "WordPress Allgemeine Informationen")
   
   WordPress möchte nun, dass wir den `Titel` der Webseite eingeben, hier ist der Titel gleich des Verzeichnisses, also `OI-OpenLayersEditor-with-Wordpress`. `Benutzername`, `Passwort` und `E-Mail-Adresse` werden vom Nutzer ausgewählt und sind für den späteren Login im Backend-Bereich wichtig. 

#### 3.1.3 OpenLayers JavaScript-Bibliothek
##### OpenLayers-Bibliothek einbinden

## 4 Realisierung
### 4.1 Implementierung der Software


## 5 Ergebnis
