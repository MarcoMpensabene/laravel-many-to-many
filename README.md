<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

> Continuiamo a lavorare sul codice dei giorni scorsi, ma in una nuova repo e aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.
> I task da svolgere sono diversi, ma alcuni di essi sono un ripasso di ciò che abbiamo fatto nelle lezioni dei giorni scorsi:

    creare la migration per la tabella technologies
    creare il model Technology
    creare la migration per la tabella pivot project_technology
    aggiungere ai model Technology e Project i metodi per definire la relazione many to many
    visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
    permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
    gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione
> Bonus 1:
> Creare il seeder per il model Technology.Bonus 2:
> Aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.Buon lavoro e buon divertimento!

Parte 2 

Esercizio di oggi: Laravel Boolfolio - Cover Image Ciao ragazze e ciao ragazzi, continuiamo a lavorare nella repo dei giorni scorsi e aggiungiamo un’immagine (uplodata) ai nostri progetti.Ricordiamoci di creare il symlink con l’apposito comando artisan e di aggiungere l’attributo enctype="multipart/form-data" ai form di creazione e di modifica!Buon lavoro e buon divertimento!
