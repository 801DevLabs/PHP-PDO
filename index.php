<?php
  // SET DATABASE VARIABLES
  $host = 'localhost';
  $user = 'root';
  $password = '123456';
  $dbname = 'pdoposts';

  // SET DSN (DATA SOURCE NAME)
  $dsn = 'mysql:host=' . $host  . ';dbname=' . $dbname;

  // CREATE A PDO INSTANCE
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  // PDO QUERY
  // $stmt = $pdo->query('SELECT * FROM POSTS');

  // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  //   echo $row['title'] . '<br>';
  // }

  // while($row = $stmt->fetch()){
  //   echo $row->title . '<br>';
  // }

  // PREPARED STATEMENTS
  // UNSAFE -> $sql = "SELECT * FROM posts WHERE author = '$author'";

  // FETCH MULTIPLE POSTS

  // USER INPUT
  $author = 'Ann Perkins';
  $is_published = true;
  $id = 1;
  $limit = 1;

  // SET POSITIONAL PARAMS
  $sql = "SELECT * FROM posts WHERE author = ? AND is_published = ? LIMIT ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$author, $is_published, $limit]);
  $posts = $stmt->fetchAll();

  // NAMED PARAMS
  // $sql = "SELECT * FROM posts WHERE author = :author AND is_published = :is_published";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
  // $posts = $stmt->fetchAll();

  // // USER FOREACH TO LOOP THROUGH RESULTS
  foreach($posts as $post){
    echo $post->title . '<br>';
  }

  // FETCH SINGLE POST
  // $sql = "SELECT * FROM posts WHERE id = :id";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['id' => $id]);
  // $post = $stmt->fetch();

  // DISPLAY THE BODY TEXT FROM THE POST
  // echo $post->body;

  // GET ROW COUNT
  // $stmt = $pdo->prepare("SELECT * FROM posts WHERE author = ?");
  // $stmt->execute([$author]);
  // $postCount = $stmt->rowCount();

  // echo $postCount;

  // INSERTING DATA
  // $title = 'Post Eight';
  // $body = 'This is post eight';
  // $author = 'Ben Wyatt';

  // $sql = "INSERT INTO posts(title, body, author) VALUES (:title, :body, :author)";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);
  // echo 'Post Added';

  // UPDATE DATA
  // $id = 1;
  // $body = 'This is the updated post';

  // $sql = "UPDATE posts SET body = :body WHERE id = :id";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['body' => $body, 'id' => $id]);
  // echo 'Post Updated';

  // DELETE DATA

  // $id = 3;

  // $sql = "DELETE FROM posts WHERE id = :id";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute(['id' => $id]);
  // echo 'Post Deleted';

  // SEARCH
  // $search = '%post%';

  // $sql = "SELECT * FROM posts WHERE title LIKE ?";
  // $stmt = $pdo->prepare($sql);
  // $stmt->execute([$search]);
  // $posts = $stmt->fetchAll();

  // foreach($posts as $post){
  //   echo $post->title . '<br>';
  // }
