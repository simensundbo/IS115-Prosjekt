## Oppstart av WebAppen
    Instaler Composer A Dependency Manager for PHP på maskinen. Link til composer: https://getcomposer.org/
    Kjør composer update i komandolinjen.
    Man vil da få en mappe som heter vendor hvor alle Dependency til prosjektet ligger
    Dependency er spesifisert i composer.json og composer.lock filene

## Database & Mail oppsett
    Naviger deg til app/Config/Database.php.
    Fyll inn verdiene til din database i $default arrayen.
    Databasen til prosjektet finner man i 'app/Database' mappen

    For å konfigurere PHPMailer må man lage en .env fil hvor man spesifiserer innloggingen til mailen man vil bruke.
    Kopier env_example og gi den navnet '.env'
    Husk å fjern '#' forran den man vil bruke i env filen

    mail = 'din mail'
    password = 'ditt passord'

## For å starte WebAppen
    Kjør kommandoen php spark serve i kommandolinjen.
    En php web server vil da begynne å lytte til port 8080
    Php spark er en PHP’s built-in web server som kommer med codeigniter rammeverket.

## IS-115 Gruppe 11

    Simen Sundbø & Rikke Solvang
