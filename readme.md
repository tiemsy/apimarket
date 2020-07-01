<p>Création une API Rest sous Symfony.</p>
<p>l'API expose un produit e-commerce simple avec un peu d'informations.</p>

<p>Pour commencer j'ai installer symfony sans les modules.</p>
<code>composer create-project symfony/skeleton apimarket</code><br /><br />
<p>Ensuite installation des packages suivants :</p>
<code>- api // pour api platform<br />
- make // pour les entity et autres<br />
- DataFixtures // pour pouvoir inserer des data dans Product et User avec Factory/Faker</code><br /><br />

<p>
Au début, j'avais commencé à développer des methods dans <code>ApiProductsController</code>
</p>
<code>- index : Lister les produuits par la methode GET - /api/products<br/>
- store : Inserer des données dans la table product par la methode POST - api/product"
</code><br /><br />
<p>API Platform fait déjà tout ce travail [GET, POST, PUT, PATCH, DELETE] et j'ai donc décidé de retenir ce choix logique - /apip</p>

<p>L'accès à cette API est sécurisée par système de jeton JWT<p>
<p>Dans un premier temps, j'ai installé le package <code>lexik/jwt-authentication-bundle</code>
puis généré des clés private et public dans le repertoire config/jwt<br />
<code>- openssl genrsa -out config/jwt/private.pem -aes256 4096<br />
- openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem</code>
</p><br /><br />
<p>
Création de l'entity User par <code>bin/console make:user</code> puis <code>bin/console make:aut</code> pour générer des fichiers la class SecurityController avec la méthode login et logout
</p><br /><br />

<p>Lancer la commande bin/console doctrine:fixtures:load pour remplir les tables</p>