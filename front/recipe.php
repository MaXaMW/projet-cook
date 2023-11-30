<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../front/style/style.css">
    <link rel="stylesheet" href="recipe.css">
    <title>Document</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a class="link" href="home.php">Accueil</a></li>
                <li><a class="link" href="recipe.php">Recettes</a></li>
                <li><a class="link" href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Recettes</h1>
        <?php
        foreach ($recipes as $recipe) {
            echo "<div class='recipe'>";
            echo "<h2>" . $recipe['title'] . "</h2>";
            echo "<p>" . $recipe['content'] . "</p>";
            echo "<p>" . $recipe['author'] . "</p>";
            echo "</div>";
        }
        ?>
    </main>
</body>
</html>