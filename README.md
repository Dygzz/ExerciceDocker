# ExerciceDocker

Je vais être franc avec vous, je n'ai pas réussi à faire les tests avec Jenkins. J'ai passé pas mal de temps à faire un petit projet.

Je vais expliquer, comment je pense qu'il faut que ca marche:
- il faut dabbord faire l'installation de docker et docker-compose sur le docker jenkins en bash
- ensuite on créer un job en choisissant la version 7.3 de php et en lui likant le répo git.
- Dans un premier temps, on dois s'occuper d'abord d'installer le vendor pour ensuite faire les tests unitaires avec php unit avec la commande
- docker run -v $(pwd):/app --rm phpunit/phpunit:latest --bootstrap monsite/Calcul.php monsite/CalculTest.php.
- Pour par la suite faire un docker-compose up
De ce que j'ai compris, on peut utiliser un pipeline pour dire que tant que le premier job (la preprod) ne build pas on ne lance pas le job2 qui s'occupe de la prod.

