# Test Framwork CakePHP

### Pour lancer l'application : 

1. Création de la base de données depuis le fichier database.sql qui se trouve sur la racine du projet
2. Avoir un serveur Apache 
3. Créer un virtuel host pointant vers le projet (en bas de page une config windows avec wamp server) 
4. Accéder à votre site


### Configuration Vhost wampServer windows : 


1. Aller à "C:\Windows\System32\drivers\etc\hosts" et ajouter cette ligne : 

```
127.0.0.1		cakephp.localhost
```

2. Aller à "C:\wamp\bin\apache\apache2.4.9\conf\extra\httpd-vhosts.conf" et ajouter : 

```
<VirtualHost *:80>
    ServerAdmin iabdallah@boccard.fr
    DocumentRoot "C:\wamp\www\cakephp"
    ServerName cakephp.localhost
    ErrorLog "logs/cakephp.localhost-error.log"
    CustomLog "logs/cakephp.localhost-access.log" common
</VirtualHost>
```

