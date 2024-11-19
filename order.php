<?php
    
?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Pizzeria Lastoria Miejsce Piastowe, Haczów</title>
		<link rel="stylesheet" type="text/css" href="layout.css" />
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
        
        <style>
            /* .order-info{
                
            }
            .order-info tr{

            }
            .order-info tr td{
                display: flex;
                width: 300px;
                justify-content:space-between;
                text-align: left;
            }
            .order-info tr td input{
                

            }
            .order-info tr td span{
               
            } */

            .order-info {
    width: 100%; /* Ustawienie szerokości tabeli */
}

.order-info td {
    display: flex; /* Użycie flexboxa w komórkach */
    align-items: center; /* Wyśrodkowanie w pionie */
    justify-content: space-between; /* Rozdzielenie elementów w poziomie */
    padding: 8px; /* Odstęp wewnętrzny */
}

.order-info label {
    flex: 1; /* Wyrównanie etykiet po lewej stronie */
}

.order-info input {
    flex: 2; /* Zwiększenie szerokości pól wejściowych */
    margin-right: 10px; /* Odstęp między polem a komunikatem o błędzie */
}

.error_message {
    flex: 1; /* Wyrównanie komunikatu o błędzie */
    color: red; /* Ustawienie koloru błędu */
}
            .pizza-menu {
                display: grid;
                grid-template-columns: repeat(4, 1fr); /* 4 kolumny */
                padding: 0; /* Usunięcie wypełnienia */
            }

            .pizza-menu li {
                margin: 5px; /* Odstęp między elementami */
                display: flex; /* Wyrównanie etykiety i pola */
                justify-content: space-between; /* Rozdzielenie etykiety i pola */
                align-items: center; /* Wyśrodkowanie w pionie */
            }

            button{
                padding: 5px;
                margin-left: 5px;
            }
            /* .pizza-menu tr{
                

            }
            .pizza-menu tr td{
                display: flex;
                justify-content: space-between;
                width: 25%;
            } */

            /* .error_message{
                color:red;
            } */
            
        </style>

	</head>


	<body>

        
		<div id="fb-root"></div>
		<script>
            
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

            function toggleTimeInput() {
                const checkbox = document.getElementById("time_order");
                const timeInput = document.getElementById("time");

                // Sprawdzamy, czy checkbox jest zaznaczony
                if (checkbox.checked) {
                    timeInput.disabled = false; // Włącz pole czasu
                } else {
                    timeInput.disabled = true;  // Wyłącz pole czasu
                }
            }
		</script>

		<!--
		<div id="like-box">
			<div class="outside">
				<div class="inside">
					<div class="fb-like-box" data-href="https://www.facebook.com/pages/MadDesigns/295185563927926?ref=hl" data-width="292" border_color="#3E5543" data-show-faces="true" data-stream="false" data-header="true"></div>
			</div>
		</div>
		<div class="belt"></div>
		</div>
		-->

		<div id="alert">
			<header>
				<a id="close" href="#">[X]</a>
			</header>
			<p></p>
		</div>

		<div id="overlay"></div>

		<div id="wrapper">

		<header id="page_header">

            <div id="logo">
                <a href="index.php"><img src="img/logo.png" alt="Pizzeria Lastoria" /></a>
            </div>
            <div id="logo_small">
                <a href="index.php"><img src="img/logo_small.png" alt="Pizzeria Lastoria" /></a>
            </div>

            <nav id="main_menu">
                <ul>
                    <li><a id="category_1" href="index.php">Home</a></li>
                    <li><a id="category_2" href="#">Menu</a>
                        <ul>
                            <li><a href="menu_mp.php">Miejsce Piastowe</a></li>
                            <li><a href="menu_hacz.php">Haczów</a></li>
                        </ul>
                    </li>
                    <li><a id="category_3" href="entertaitment.php">Rozrywka</a></li>
                    <li><a id="category_4" href="gallery.php">Galeria</a></li>
                    <li><a id="category_5" href="news.php">Aktualności</a></li>
                    <li><a id="category_6" href="contact.php">Kontakt</a></li>

                </ul>
            </nav> 

		</header>


		<main>
            <?php 
                $name = $surname = $place = $street = $home_number = $phone = $payment = null;
                $name_error_message = $surname_error_message = $place_error_message = $home_number_error_message = $phone_error_message = $payment_error_message = $choice_error_message = "*";
                $order_1 = $order_2 = $order_3 = $order_4 = $order_5 = $order_6 = $order_7 = $order_8 = $order_9 = $order_10 = 
                $order_11 = $order_12 = $order_13 = $order_14 = $order_15 = $order_16 = $order_17 = $order_18 = $order_19 = $order_20 = 
                $order_21 = $order_22 = $order_23 = $order_24 = $order_25 = $order_26 = $order_27 = $order_28 = $order_29 = $order_30 = 
                $order_31 = $order_32 = $order_33 = $order_34 = $order_35 = $order_36 = $order_37 = $order_38 = null;
                $total_amount = 0;
                $isValid = 1;

                

                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    $name = $_POST["name"];
                    $surname = $_POST["surname"];
                    $place = $_POST["place"];
                    $street = $_POST["street"];
                    $home_number = $_POST["home_number"];
                    $phone = $_POST["phone"];
                    $payment = $_POST["payment"];

                    $order_1 = $_POST["order_1"]; $order_2 = $_POST["order_2"]; $order_3 = $_POST["order_3"]; $order_4 = $_POST["order_4"]; $order_5 = $_POST["order_5"]; 
                    $order_6 = $_POST["order_6"]; $order_7 = $_POST["order_7"]; $order_8 = $_POST["order_8"]; $order_9 = $_POST["order_9"]; $order_10 = $_POST["order_10"];
                    $order_11 = $_POST["order_11"]; $order_12 = $_POST["order_12"]; $order_13 = $_POST["order_13"]; $order_14 = $_POST["order_14"]; $order_15 = $_POST["order_15"];
                    $order_16 = $_POST["order_16"]; $order_17 = $_POST["order_17"]; $order_18 = $_POST["order_18"]; $order_19 = $_POST["order_19"]; $order_20 = $_POST["order_20"]; 
                    $order_21 = $_POST["order_21"]; $order_22 = $_POST["order_22"]; $order_23 = $_POST["order_23"]; $order_24 = $_POST["order_24"]; $order_25 = $_POST["order_25"];
                    $order_26 = $_POST["order_26"]; $order_27 = $_POST["order_27"]; $order_28 = $_POST["order_28"]; $order_29 = $_POST["order_29"]; $order_30 = $_POST["order_30"];
                    $order_31 = $_POST["order_31"]; $order_32 = $_POST["order_32"]; $order_33 = $_POST["order_33"]; $order_34 = $_POST["order_34"]; $order_35 = $_POST["order_35"];
                    $order_36 = $_POST["order_36"]; $order_37 = $_POST["order_37"]; $order_38 = $_POST["order_38"]; $order_39 = $_POST["order_39"];
                    

                    if(empty($name)){
                        $name_error_message = "Proszę podać imię!";
                        $isValid = 0;
                    }
                    if(empty($surname)){
                        $surname_error_message = "Proszę podać nazwisko!";
                        $isValid = 0;
                    }
                    if(empty($place)){
                        $place_error_message = "Proszę podać nazwę miejscowości!";
                        $isValid = 0;
                    }
                    if(empty($home_number)){
                        $home_number_error_message = "Proszę podać nazwę miejscowości!";
                        $isValid = 0;
                    }
                    if(empty($phone)){
                        $phone_error_message = "Proszę podać telefon!";
                        $isValid = 0;
                    }
                    if(empty($payment)){
                        $payment_error_message = "Proszę podać sposób zapłaty!";
                        $isValid = 0;
                    }
                    if(empty($order_1) && empty($order_2) && empty($order_3) && empty($order_4) && empty($order_5)
                        && empty($order_6) && empty($order_7) && empty($order_8) && empty($order_9) && empty($order_10)
                        && empty($order_11) && empty($order_12) && empty($order_13) && empty($order_14) && empty($order_15)
                        && empty($order_16) && empty($order_17) && empty($order_18) && empty($order_19) && empty($order_20)
                        && empty($order_21) && empty($order_22) && empty($order_23) && empty($order_24) && empty($order_25)
                        && empty($order_26) && empty($order_27) && empty($order_28) && empty($order_29) && empty($order_30)
                        && empty($order_31) && empty($order_32) && empty($order_33) && empty($order_34) && empty($order_35)
                        && empty($order_36) && empty($order_37) && empty($order_38) && empty($order_39)) {
                            $choice_error_message = "Proszę o wybranie choć jednej pozycji!";
                            $isValid = 0;
                            
                    }

                }
            ?>
            <form action="order.php" method="post">
                <table class="order-info">
                    <tr>
                        <td>
                            
                            <label for="name">Imię: </label>
                            <input type="text" name="name" value="<?php echo $name; ?>">
                            <span class="error_message"><?php echo $name_error_message; ?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                            <label for="surname">Nazwisko: </label>
                            <input type="text" name="surname" value="<?php echo $surname; ?>">
                            <span class="error_message"><?php echo $surname_error_message; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="place">Miejscowość: </label>
                            <input type="text" name="place" value="<?php echo $place; ?>">
                            <span class="error_message"><?php echo $place_error_message; ?></span>
                            <label for="street">Ulica: </label>
                            <input type="text" name="street" value="<?php echo $street; ?>">
                            <label for="place">Numer domu: </label>
                            <input type="text" name="home_number" value="<?php echo $home_number; ?>">
                            <span class="error_message"><?php echo $home_number_error_message; ?></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="phone">Numer telefonu: </label>
                            <input type="tel" name="phone" value="<?php echo $phone; ?>">
                            <span class="error_message"><?php echo $phone_error_message; ?></span>
                        </td>
                    </tr>
                </table>
                <br>
                <span class="error_message"><?php echo $choice_error_message; ?></span>
                <ol class="pizza-menu">
                    <li>
                        <label for="order_1">Marcherita</label>
                        <input type="number" name="order_1" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_2">Zwyczajna</label>
                        <input type="number" name="order_2" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_3">Wegetariańska</label>
                        <input type="number" name="order_3" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_4">Szynkowa</label>
                        <input type="number" name="order_4" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_5">Tradycyjna</label>
                        <input type="number" name="order_5" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_6">Salami</label>
                        <input type="number" name="order_6" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_7">Diabelska (Pikantna)</label>
                        <input type="number" name="order_7" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_8">Z Tuńczykiem</label>
                        <input type="number" name="order_8" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_9">Marynarska</label>
                        <input type="number" name="order_9" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_10">Firmowa</label>
                        <input type="number" name="order_10" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_11">Z Kurczakiem (Pikantna)</label>
                        <input type="number" name="order_11" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_12">Z Kurczakiem (Łagodna)</label>
                        <input type="number" name="order_12" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_13">Z Kurczakiem (Ananas)</label>
                        <input type="number" name="order_13" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_14">Gyros</label>
                        <input type="number" name="order_14" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_15">Owoce morza</label>
                        <input type="number" name="order_15" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_16">Domowa</label>
                        <input type="number" name="order_16" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_17">Salami i Kurczak</label>
                        <input type="number" name="order_17" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_18">Szynkowa normalna</label>
                        <input type="number" name="order_18" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_19">Super Wegetariańska</label>
                        <input type="number" name="order_19" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_20">Wiejska</label>
                        <input type="number" name="order_20" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_21">Jarska</label>
                        <input type="number" name="order_21" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_22">Hawajska</label>
                        <input type="number" name="order_22" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_23">Szynkowa Extra</label>
                        <input type="number" name="order_23" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_24">Gyros Max</label>
                        <input type="number" name="order_24" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_25">Tropicana</label>
                        <input type="number" name="order_25" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_26">Gustoza</label>
                        <input type="number" name="order_26" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_27">Delicat</label>
                        <input type="number" name="order_27" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_28">Grecka</label>
                        <input type="number" name="order_28" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_29">Meksykańska</label>
                        <input type="number" name="order_29" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_30">Cztery Sery</label>
                        <input type="number" name="order_30" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_31">Parmezana</label>
                        <input type="number" name="order_31" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_32">Szpinakowa</label>
                        <input type="number" name="order_32" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_33">Z Rukolą</label>
                        <input type="number" name="order_33" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_34">Grzybowa</label>
                        <input type="number" name="order_34" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_35">Borowikowa</label>
                        <input type="number" name="order_35" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_36">Żurawinowa</label>
                        <input type="number" name="order_36" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_37">Uczta serowa</label>
                        <input type="number" name="order_37" style="width:30px;">
                    </li>
                    <li>
                        <label for="order_38">Szpinakowa Extra</label>
                        <input type="number" name="order_38" style="width:30px;">
                    </li>
                </ol>
                
                <br>

                <h3>Fastfood</h3>
                <label for="order_39">Hamburger</label>
                <input type="number" name="order_39" style="width:30px;">

                <br><br>
                
                
                <label for="time_order">Zamówienie na godzinę: </label>
                <input type="checkbox" id="time_order" name="time_order" onchange="toggleTimeInput()">
                <br><br>
                <label for="time">Godzina: </label>
                <input type="time" name="time" id="time" disabled>
                <br><br>

                <label for="payment">Rodzaj płatności: </label><span class="error_message"><?php echo $payment_error_message; ?></span><br>
                <input type="radio" name="payment" value="cash">Płacę przy odbiorze gotówką
                <input type="radio" name="payment" value="card">Płacę przy odbiorze kartą
                <input type="radio" name="payment" value="online">Płacę online (BLIK, przelew)
                <br><br>
                <button type="submit">Złóż zamówienie</button>
                <button type="reset">Anuluj zamówienie</button>

                
            </form>
		</main>

		<footer id="page_footer">

				<div class="foot_row">
				<nav id="foot_menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="menu_mp.php">Men&#252;</a></li>
						<li><a href="entertaitment.php">Rozrywka</a></li>
						<li><a href="gallery.php">Galeria</a></li>
						<li><a href="news.php">Aktualności</a></li>
						<li><a href="contact.php">Kontakt</a></li>
					</ul>
				</nav>

<div id="foot_info">
				<div class="foot_col">
					<strong>Haczów</strong><br/>
					Haczów 585<br/>
					tel: (13) 33 350 07<br/>
					kom: 601 463 446
				</div>

				<div class="foot_col">
					<strong>Miejsce Piastowe</strong><br/>
					tel: (13) 43 393 34<br />
					tel: (13) 43 347 45<br/>
					kom: 727 598 727
				</div>
</div>
			<div id="foot_logo">
				<a href="index.php">
				<img src="img/logo_small.png" alt="Pizzeria Lastoria" />
			</a>
			</div>

			</div>

			<div class="foot_row">
				<div id="copy">&copy; Copyright 2018 Pizzeria Lastoria</div>
				<div id="powered">Created by <a href="http://www.maddesigns.pl">MadDesigns</a></div>
			</div>

		</footer>

	</div>

	</body>


</html>
<?php 
    
    if($_SERVER["REQUEST_METHOD"] == "POST" && $isValid == 1){
        require_once 'database.php';
        if (!clientExists($phone, $place, $home_number)) {
            if (addClient($name, $surname, $place, $street, $home_number, $phone)) {
                echo "<h1>Nowy użytkownik został dodany pomyślnie.</h1>";
            } else {
                echo "<h1>Błąd podczas dodawania użytkownika.</h1>";
            }
        } else {
            echo "<h1>Użytkownik o podanym numerze telefonu i adresie już istnieje.</h1>";
        }

        for ($i = 1; $i <= 38; $i++) {
            // Sprawdź, czy ilość pizzy została podana w formularzu
            if (isset($_POST["order_$i"]) && $_POST["order_$i"] > 0) {
                $total_amount++;
            }
        }
        getPrice();

        
    }



    
?>