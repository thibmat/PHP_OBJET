<?php

class Database
{
  /**
   * Instance de PDO
   * @var PDO
   */
  private $pdo;

  /**
   * Créer une instance de PDO
   */
  public function connect(): void
  {
      // Connexion à MySQL
      $this->pdo = new PDO(
            'mysql:host=localhost;dbname=user',
            'root',
            'root',
            [
              PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
            ]
      );
  }
  /**
   * Exécute la requête SQL fournie et retourne un éventuel tableau
   * @param string $sql
   * @param string $className
   * @return array|null
   */
  public function query(string $sql, ?string $className='null'): ?array
  {

      $result = $this->pdo->query($sql);
      if($classname != 'null'){
        return $result->fetchAll(PDO::FETCH_CLASS, $className);
      }else {
        return $result->fetchAll();
      }
  }
  /**
   * Execute une requête SQL pour :
   * - La création (INSERT INTO)
   * - La modification (UPDATE)
   * - La suppression (DELETE, DROP)
   * @param string $sql
   * @return int
   */
  public function exec(string $sql): int
  {
      return $this->pdo->exec($sql);
  }
  /**
   *
   * Prépare les variables PHP à insérer dans une requête SQL
   * @return string
   */
  public function getStrParamsSQL(...$params): string
  {
      // On crée un tableau avec les 3 propriétés
      // $params = [
      //     htmlentities($this->username),
      //     htmlentities($this->email),
      //     htmlentities($this->password)
      // ];
      // On crée une chaîne de caractères séparés de virgules et les quotes simples
      $str = implode("','", $params);
      // On a ajoute une quote simple au début et une à la fin
      // On retourne l'ensemble
      return "'" . htmlentities($str) . "'" ;
  }














}
?>
