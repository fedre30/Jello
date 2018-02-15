## Projet Jello
<a href="https://ibb.co/nxofGS"><img src="https://preview.ibb.co/dC6BO7/siteMap.png" alt="siteMap" border="0"></a>
## CRUD - Inscription au formulaire

* *registerPage.php*
* *db.php*

### Create - Formulaire

Dans *db.php*, on crée une fonction **createUser()** qui prend en paramètre les différentes informations requises à l'inscription.

```PHP
function createUser($firstName, $lastName, $email, $password)
```

Elle contient notamment la préparation de la **requête SQL** suivante :

```PHP
prepare("INSERT INTO users (lastName, firstName, email, password) VALUES (:lastName, :firstName, :email, :password)");

```

Les **variables** stock la saisie des **inputs** du formulaire. Les éléments de *VALUES* prennent le contenu des **variables**.

À noter que ```=>``` est un équivalent de ```bindValue()``` dans l'exécution : 

```PHP
	execute([
            ':lastName' => $lastName,
            ':firstName' => $firstName,
            ':email' => $email,
            ':password' => $passwordHashed
        ]);
```
### Read - Formulaire

Dans *db.php*, on crée une fonction **getUserInformation($userID)** qui prend en paramètre `$userID` et récupère dans une variable **`$request`**,les informations liées à `lastName`, `firstName`, `email`, `password` de la table **`users`**.

```PHP
$request = 'SELECT `lastName`, `firstName`, `email`, `password` FROM `users` WHERE `userID` = :userID;';
```

Puis on prépare la requête avant de l'exécuter : 

```PHP      
$stmt = $this->db->prepare($request);
$stmt->bindValue(':userID', $userID);
$stmt->execute();
```

Ensuite on stock dans une variable `$row` le contenu du tableau associatif par 

`$row = $stmt->fetch(PDO::FETCH_ASSOC);`

Enfin, on retourne le résultat à la fonction.

## CRUD - Connexion au formulaire

* *loginPage.php*
* *db.php*
* *init.php*

### Read - Formulaire

Dans *db.php*, on crée une fonction **connectUser($email, $password)** qui prend en paramètre `$email`, `$password`.

Puis on prépare la requête avant de l'exécuter : 

```PHP
$stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
```

```PHP
$stmt->execute([':email' => $email]);
```

On stock ensuite dans la variable **$result** ce que fetchAll à reçu de la variable **$stmt**, soit la requête SQL.
`$result = $stmt->fetchAll();`

Puis on effectue une vérification pour savoir le nombre d'éléments que contient **$result**. S'il est strictement égal à 0, alors **false** est retourné à la fonction **connectUser()**.

On va ensuite protéger le password envoyé en effectuent un hashage avec la méthode : *PASSWORD_BCRYPT*

Pour se faire, on récupère le mot de passe dans une variable **$passwordHashed**.

```PHP
$passwordHashed = $result[0]['password'];
```

Puis on effectue une vérification à l'aide d'une fonction *password_verify()* qui prend deux paramètres. Le mot de passe entré dans l'input, et le mot de passe haché.

```PHP
$passwordVerified = password_verify($password, $passwordHashed);
```

Si le mot de passe ne correspond pas alors on envoie false, sinon, on stock dans un cookie grâce à **setcookie** dans lequel plusieurs paramètres sont attribués. Notamment, le nom du cookie, ici *"JelloUser"* le *serialize* (qui retourne un tableau en chaîne de caractère) ici de  l'*userID* et de l'*email* et enfin on spécifie sa date d'expiration.

### Update - Formulaire

Dans *db.php*, on crée une fonction **updateUser()** qui prend en paramètre `$userID`, `$lastName`, `$firstName`, `$email`, `$password`.

On stock ensuite dans une variable **$stmt** la préparation de la requête SQL.

```PHP
$stmt = $this->db->prepare('UPDATE users SET lastName = :lastName, firstName = :firstName, email = :email, password = :password WHERE userID = :userID ');
```
Enfin, on lance l'exécution de la requête SQL.

```PHP
$stmt->execute([
   ':userID' => $userID,
   ':lastName' => $lastName,
   ':firstName' => $firstName,
   ':email' => $email,
   ':password' => $password
]);
```

Ici encore ```=>``` est un équivalent de ```bindValue()``` dans l'exécution.  

## CRUD - Board

* *db.php*
* *boardPage.php*


### Create - Board

Dans *db.php*, on crée une fonction **createBoard()** qui prend en paramètre la variable qui contient l'ID de l'utilisateur.

Cette fonction contient notamment la préparation de la requette SQL suivante :

```PHP
$stmt = $this->db->prepare("INSERT INTO boards(ownerID) VALUES (:userId)");
```
Et qui l'exécute :

```PHP
 $stmt->execute([
    ':userId' => $userId
]);
```

### Read - Board     

Dans *db.php* on crée une fonction **getBoard()** qui prend en paramètre une variable.

On viens ensuite préparer la requête SQL pour venir lire le contenu de la table *boards*.

```PHP
$stmt = $this->db->prepare('SELECT * FROM boards WHERE boardID = :boardID');
```
```PHP
$stmt->execute([':boardID' => $boardID]);
$result = $stmt->fetchAll();
```
Retourne false si le nombre d'éléments contenu dans $result est strictement égale à 0.

```PHP
if (count($result) === 0) {
    return false;
}
```

## CRUD - Card

* *db.php*
* *boardPage.php*

### Create - Card

Dans *db.php* on crée une fonction **createCard()** qui prend en paramètre les variables `$title`, `$description`, `$laneId`.

On vient ensuite préparer la requête SQL pour ajouter de contenu dans la table *cards*.

Puis on exécute la requête :

```PHP
$stmt->execute([
   ':title' => $title,
   ':description' => $description,
   ':cardPosition' => $laneId
]);
```

### Read - Card

Dans *db.php* on crée une fonction **getBoardFromCard()** qui prend en paramètre la variable `$cardId`.

On vient ensuite préparer la requête SQL.
```PHP
$stmt = $this->db->prepare('SELECT * FROM cards JOIN board_lanes ON  cards.cardPosition = board_lanes.laneID JOIN boards                                                  ON board_lanes.boardID = boards.boardID WHERE cards.cardID = :cardId');
$stmt->execute([':cardId' => $cardId]);
$result = $stmt->fetchAll();
```

Pour ensuite l'exécuter, stocker les éléments dans un tableau avec fetchAll et retourner la valeur stocker dans *$result* à la fonction : 

```PHP
$stmt->execute([':cardId' => $cardId]);
     $result = $stmt->fetchAll();
        return $result;
```

### Update - Card

Dans *db.php* on crée une fonction **updateCard()** qui prends en paramètre les variables `$cardID`, `$title`, `$description`, `$cardPosition`.

On vient ensuite préparer la requête SQL et l'exécuter.

```PHP
$stmt = $this->db->prepare('UPDATE cards SET title = :title, description = :description, cardPosition = :cardPosition WHERE cardID = :cardID');
        $stmt->execute([
            ':cardID' => $cardID,
            ':title' => $title,
            ':description' => $description,
            ':cardPosition' => $cardPosition
        ]);
```

Enfin, on lie la requête SQL à la fonction rowCount() et on vérifie le nombre de lignes.

```PHP
return $stmt->rowCount() === 1;
```

### Delete - Card

Dans *db.php* on crée une fonction **deleteCard()** qui prend en paramètre la variable *$cardID*.

On prépare la requête SQL et on l'exécute : 

```PHP
 $stmt = $this->db->prepare('DELETE FROM cards WHERE cardID = :cardID');
        $stmt->execute([
            ':cardID' => $cardID
        ]);
```
Enfin, on lie cette requête, contenue dans *$stmt* à *rowCount()* qui va retourner le nombre de lignes affectées et qui doit être égale à 1 pour être correctement retournée.

```PHP
return $stmt->rowCount() === 1;
```
