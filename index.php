<?php

class Unicorn { //gör objektets struktur och värden
    private $name = "";
    private $color = "pink";
    private $age = 0;

    function __construct(string $name, string $color = "pink", int $age){
        $this->name = $name;
        $this->color = $color;
        $this->age = $age;
    }

    function getMessage(): string { //funktion för att skriva ut unicornsen
        return "Unicorn {$this->name} says hello I am {$this->color} and I am {$this->age} years old!";
    }

    function getName(): string {
        return "Name: {$this->name}";
    }
}

class UnicornList { 
    private $unicorns = []; //deklarerar arrayen. Tom, ska passa in värden

    function __construct($unicorns) { //konstruktor som säger att variabel $unicorn är unicorn genom att passa in den som ett argument. Constuctor definerar de framtida objekten
        $this->unicorns = $unicorns;
    }

    function getUnicorns() {
        return $this->unicorns;
    }
}

class RenderUnicorn { //renderar och echo ut listan på unicorns genom att anropa funktionen i unicorns
    function renderMessage(Unicorn $unicorn) { //går ej typsäkra denna???
        echo "<p>{$unicorn->getMessage()}</p>";
    }
}

class RenderUnicornByName {
    function renderByName(Unicorn $unicorn) {
        echo "<li>{$unicorn->getName()}</li>";
    }
}

$myUnicorns = new UnicornList([
    new Unicorn("Bosse", "light green", 3),
    new Unicorn("Lisa", "blue", 5),
    new Unicorn("Anna", "purple", 56),
    new Unicorn("Måne", "black", 12),
    new Unicorn("Tiara", "brown and lime", 6),
]);

$render = new RenderUnicorn();
$renderName = new RenderUnicornByName();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unicorns</title>
</head>
<body>
<h1>Unicorns</h1>

    <?php

        foreach($myUnicorns->getUnicorns() as $unicorn) { 
            echo $render->renderMessage($unicorn); 
        }
    ?>

    <h1> My Unicorns by Name </h1>
    <ol>
    <?php
        foreach($myUnicorns->getUnicorns() as $unicorn) {
            echo $renderName->renderByName($unicorn);
        }
    ?>
    </ol>

</body>
</html>