<p>Création une API Rest sous Symfony.</p>
<p>l'API expose un produit e-commerce simple avec un peu d'informations.</p>

<p>Pour commencer j'ai installer symfony sans les modules.</p>
<code>composer create-project symfony/skeleton apimarket</code><br /><br />
<p>Ensuite j'ai installé des packages suivants :</p>
<code>- api // pour api platform</code><br />
<code>- make // pour les entity et autres</code><br />
<code>- DataFixtures // pour pouvoir inserer des data dans Product et User avec Factory/Faker</code><br /><br />
<p>
Ensuite j'ai l'entity User par <code>bin/console make:user</code> puis <code>bin/console make:aut</code> pour générer des fichiers la class SecurityController avec la méthode login et logout
</p><br />

<p>Après avoir fait un git clone du repo, vous devez lancer les commandes suivantes:</p>
<code>- bin/console doctrine:database:create</code><br />
<code>- bin/console make:migration</code><br />
<code>- bin/console doctrine:migrations:migrate</code><br />
<code>- bin/console doctrine:fixtures:load pour remplir les tables</code>
<p><br />
Au début, j'avais commencé à développer des methods dans <code>ApiProductsController</code>
</p>
<code>- index : Lister les produuits par la methode GET - /api/products</code><br />
<code>- store : Inserer des données dans la table product par la methode POST - api/product"
</code><br /><br />
<p>API Platform fait déjà tout ce travail [GET, POST, PUT, PATCH, DELETE] et j'ai donc décidé de retenir ce choix logique - /apip</p>
<p>La route est definie dans <code>config/routes/api_plateform.yaml</code></p>

<p>L'accès à cette API est sécurisée par système de jeton JWT<p>
<p>Dans un premier temps, j'ai installé le package <code>lexik/jwt-authentication-bundle</code>
puis généré des clés private et public dans le repertoire config/jwt<br />
<code>- openssl genrsa -out config/jwt/private.pem -aes256 4096<c/ode><br />
<code>- openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem</code>
</p><br />

<p>Puis configuration de l'accès dans <code>config/packages/security.yaml</code></p>

