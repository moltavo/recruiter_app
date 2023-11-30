# Recruiter App

## Οδηγίες Εγκατάστασης

1. Κλωνοποιήστε το αποθετήριο:

    ```bash
    git clone https://github.com/fotelefth/recruiter_app.git
    ```

2. Αντέγραψε το αρχείο `.env.example` σε ένα νέο αρχείο με το όνομα `.env`.

3. Ανέβασε την εφαρμογή με Docker:

    ```bash
    docker-compose up --build
    ```

    (Για το build σε Docker)

4. Εκτέλεσε τη μετεγκατάσταση της βάσης δεδομένων μέσα στον container:

    ```bash
    php artisan migrate
    ```

5. Εκτέλεσε τα τεστ με το PHP Unit:

    ```bash
    php artisan test
    ```

6. Εμφάνισε το διάγραμμα της βάσης δεδομένων από το αρχείο `db_diagram.txt`.

---