<?php 

    
    // Funkcja do połączenia z bazą danych
    function getDbConnection() {;
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "pizzeria";
        $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
        
        try {
            // Tworzenie połączenia za pomocą PDO
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Połączenie udane!";
        } catch (PDOException $e) {
            die("Błąd połączenia: " . $e->getMessage());
        }

        return $pdo;
    }
    
    // Funkcja sprawdzająca, czy użytkownik już istnieje
    function clientExists($phone, $place, $home_number) {
        $pdo = getDbConnection(); // Użyj poprawnej zmiennej $pdo
        $sql = "SELECT * FROM klienci WHERE phone = :phone AND place = :place AND homeNumber = :home_number";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':place', $place, PDO::PARAM_STR);
            $stmt->bindParam(':home_number', $home_number, PDO::PARAM_STR);
            $stmt->execute();
    
            // Sprawdzenie, czy wynik istnieje
            $exists = $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            die("Błąd zapytania: " . $e->getMessage());
        }
    
        return $exists;
    }
    
    // Funkcja dodająca nowego użytkownika
    function addClient($name, $surname, $place, $street, $home_number, $phone) {
        $pdo = getDbConnection(); // Pobranie połączenia przez PDO
        $sql = "INSERT INTO klienci (name, surname, place, street, homeNumber, phone) VALUES (:name, :surname, :place, :street, :home_number, :phone)";
        
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
            $stmt->bindParam(':place', $place, PDO::PARAM_STR);
            $stmt->bindParam(':street', $street, PDO::PARAM_STR);
            $stmt->bindParam(':home_number', $home_number, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    
            // Wykonanie zapytania
            $success = $stmt->execute();
        } catch (PDOException $e) {
            die("Błąd dodawania klienta: " . $e->getMessage());
        }
    
        return $success;
    }
    
    
    function getPrice(){
        // Połącz z bazą danych (upewnij się, że masz poprawne dane logowania do bazy danych)
        $pdo = getDbConnection();

        // Przechowuj całkowitą cenę
        $totalPrice = 0;

        // Iteruj przez każdą pizzę
        for ($i = 1; $i <= 38; $i++) {
            // Sprawdź, czy ilość pizzy została podana w formularzu
            if (isset($_POST["order_$i"]) && $_POST["order_$i"] > 0) {
                $quantity = (int)$_POST["order_$i"];

                // Pobierz cenę z bazy danych dla danej pizzy
                $stmt = $pdo->prepare("SELECT cena FROM pizza WHERE id = :id");
                $stmt->bindParam(':id', $i, PDO::PARAM_INT);
                $stmt->execute();

                // Pobierz cenę pizzy
                $price = $stmt->fetchColumn();

                if ($price !== false) {
                    // Oblicz koszt dla danej pizzy i dodaj do całkowitej ceny
                    $totalPrice += $price * $quantity ;
                    
                }

            }
        }
        echo "<h1>". $totalPrice + (int)deliveryPrice() . "</h1>";
        return $totalPrice;
    }

    function checkAddress($place, $street, $home_number){
        // Połączenie z bazą danych (przykład z PDO)
        $pdo = getDbConnection();

        // Adres wprowadzony przez klienta (przykład z formularza)
         

        // Przygotowanie zapytania SQL, które porównuje adres wprowadzone przez klienta z tym w bazie
        $query = "SELECT * FROM klienci WHERE LOWER(place) = LOWER(:place) AND LOWER(street) = LOWER(:street) AND LOWER(homeNumber) = LOWER(:home_number)"; // Funkcja LOWER porównuje bez uwzględniania wielkości liter

        // Przygotowanie zapytania
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":place", $place);
        $stmt->bindParam(":street", $street);
        $stmt->bindParam(":home_number", $home_number);
        // Wykonanie zapytania, przekazanie adresu klienta
        $stmt->execute();

        // Sprawdzenie, czy zapytanie zwróciło jakiekolwiek wyniki (adresy)
        if ($stmt->rowCount() > 0) {
            echo "Adres istnieje w bazie danych!";
        } else {
            echo "Adres nie został znaleziony w bazie danych.";
        }
    }

    function deliveryPrice(){
        $pdo = getDbConnection();
        
        
        // Bierzemy dzisiejszy dzień tygodnia (0 = niedziela, 1 = poniedziałek, itd.)
        $dayOfWeek = date('w');
        // Koszt dostawy zależny od dnia tygodnia
        switch ($dayOfWeek) {
            case 0: // Niedziela
                $sql = "SELECT * FROM dostawaweekend WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                
                $deliveryCost = 10;  // Przykładowy koszt na niedzielę
                break;
            case 1: // Poniedziałek
                try{
                    $sql = "SELECT * FROM dostawaweekday WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $stmt->execute();
                $wyniki = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($stmt->rowCount() > 0) {
                    foreach($wyniki as $wiersz){
                        $deliveryCost = $wiersz["cena"];
                    echo $wiersz["cena"];
                    }
                    
                } else {
                    foreach($wyniki as $wiersz){
                        $deliveryCost = $wiersz["cena"];
                    echo $wiersz["cena"];
                    }
                }

                // echo "<h1>test</h1>";
                   // Przykładowy koszt na poniedziałek
                }catch (PDOException $e) {
                    die("Błąd zapytania: " . $e->getMessage());
                }

                
                break;
            case 2: // Wtorek
                $sql = "SELECT * FROM dostawaweekday WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $deliveryCost = 7;   // Przykładowy koszt na wtorek
                break;
            case 3: // Środa
                $sql = "SELECT * FROM dostawaweekday WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $deliveryCost = 6;   // Przykładowy koszt na środę
                break;
            case 4: // Czwartek
                $sql = "SELECT * FROM dostawaweekday WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $deliveryCost = 5;   // Przykładowy koszt na czwartek
                break;
            case 5: // Piątek
                $sql = "SELECT * FROM dostawaweekday WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $deliveryCost = 8;   // Przykładowy koszt na piątek
                break;
            case 6: // Sobota
                $sql = "SELECT * FROM dostawaweekend WHERE miejscowosc = :miejscowosc AND ilosc = :ilosc";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":miejscowosc", $place);
                $stmt->bindParam(":ilosc", $total_amount);
                $deliveryCost = 9;   // Przykładowy koszt na sobotę
                break;
            default:
                $deliveryCost = 0;   // Domyślny koszt
                break;
        }

        
        return $deliveryCost;
       
    }
?>

