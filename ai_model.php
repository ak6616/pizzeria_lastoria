<?php
// Bierzemy dzisiejszy dzień tygodnia (0 = niedziela, 1 = poniedziałek, itd.)
$dayOfWeek = date('w');

// Koszt dostawy zależny od dnia tygodnia
switch ($dayOfWeek) {
    case 0: // Niedziela
        sql = mysqli
        $deliveryCost = 10;  // Przykładowy koszt na niedzielę
        break;
    case 1: // Poniedziałek
        $deliveryCost = 8;   // Przykładowy koszt na poniedziałek
        break;
    case 2: // Wtorek
        $deliveryCost = 7;   // Przykładowy koszt na wtorek
        break;
    case 3: // Środa
        $deliveryCost = 6;   // Przykładowy koszt na środę
        break;
    case 4: // Czwartek
        $deliveryCost = 5;   // Przykładowy koszt na czwartek
        break;
    case 5: // Piątek
        $deliveryCost = 8;   // Przykładowy koszt na piątek
        break;
    case 6: // Sobota
        $deliveryCost = 9;   // Przykładowy koszt na sobotę
        break;
    default:
        $deliveryCost = 0;   // Domyślny koszt
        break;
}

echo "Koszt dostawy na dzisiaj to: " . $deliveryCost . " zł.";
?>

