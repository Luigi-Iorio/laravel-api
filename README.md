# Laravel Boolfolio - API

_Questa repo è la prima parte del progetto **Boolfolio**, quì viene gestito il back-end della pagina web per la gestione dei progetti._

### Descrizione

Questo progetto è il proseguimento della repository precedente [laravel-many-to-many](https://github.com/Luigi-Iorio/laravel-many-to-many.git), gestisce le richieste provenienti dal [front-end](https://github.com/Luigi-Iorio/vite-boolfolio.git) e fornisce i dati relativi ai progetti presenti nel database.

### Funzionalità implementata

-   **Controller Api**: È stato implementato un `Api/ProjectController` che gestisce le richieste API e restituisce i dati dei progetti presenti nel database nel formato JSON.

-   **Rotta API per il Dettaglio dei Progetti**: Aggiunta una nuova rotta API per il dettaglio dei progetti, che permette di ottenere informazioni specifiche di un progetto.

-   **Filtro Progetti**: È stata implementa una query per la ricerca del progetto tramite titolo. La `key` passata tramite Api viene ricercata all'interno del campo _titolo_ della tabella _projects_ con l'utilizzo dell'operatore _LIKE_.

    ```php
    $projects = Project::where('title', 'LIKE', '%' . request()->key . '%')->paginate(2);
    ```

-   **Validazione Ricerca**: Sono state definite le regole di validazione per la `key`.
    ```php
    request()->validate([
        'key' => ['nullable', 'max:15']
    ]);
    ```

### Test Api

Utilizzando Postman è stato verificato il corretto funzionamento delle chiamate Api.
