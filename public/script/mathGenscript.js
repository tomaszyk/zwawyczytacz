
	//Funkcja losuj() wywołuje jedną z czterech funkcji (dodawanie(), odejmowanie(), mnozenie(), dzielenie()).
	//Wywołana funkcja (dodawanie, odejmowanie, mnożenie, dzielenia) losuje dwie liczby i wykonuje na nich odpowiednie działanie.
	//Następnie wywołuje funkcję porownaj(), która porównuje prawidłowy wynik z wartością wprowadzoną przez użytkownika.
	function losuj()
	{	
		document.getElementById('przycisk').style.visibility = 'visible';

		//Wyrażenie (Math.random()*10)%4+1) zapewni nam wartość ze zbioru {1,2,3,4} 
		switch(parseInt((Math.random() * 10) % 4 + 1)) 
		{
		case 1:
			dodawanie(); 
		break;
				
		case 2:
			odejmowanie();
		break;

		case 3:
			mnozenie();
		break;

		case 4:
			dzielenie();
		break;
				
		}

	}

	//Funkcja dodawania, 
	function dodawanie()
	{
		//Losuje liczbę ze zbioru {1,2,3,.....,100}
		var a=parseInt(Math.random() * 100 + 1); 

		//Wartość drugiej liczby jest zależna od tego czy pierwsza jest większe czy mniejsze od 50	
		if(a > 50) 
		{
			var b = parseInt(Math.random() * 100 % 50 + 1);										 
		}
		else
		{
			var b = parseInt(Math.random() * 100 + 1); b + "<br>"
		}

		//Funkcja prezentuje wylosowane liczby użytkownikowi wraz z polem do wpisania poprawnego wyniku	
		document.getElementById("oblicz").innerHTML = a + " + " + b + " = " + '<input id="pole-dz" type="number">';


		//Wywołujemy funkcję porownaj(), która porównuje wartość wprowadzoną przez użytkownika z wartością otrzymaną w wyniku dodawania												 
		document.getElementById("przycisk").onclick = function()
													{
														  porownaj(a + b);
													}
							 
	}



	//Funkcja odejmowania
	function odejmowanie()
	{ 
		//Losuje dwie liczby naturalne ze zbioru {1,2,3,.....,100}
		var a = parseInt(Math.random() * 100 + 1);

		var b = parseInt(Math.random() * 100 + 1);
											
		//Funkcja prezentuje wylosowane liczby użytkownikowi wraz z polem do wpisania poprawnego wyniku	
		document.getElementById("oblicz").innerHTML = a + " - " + b + " = " + '<input id="pole-dz" type="number">'; 

		//Wywołujemy funkcję porownaj(), która porównuje wartość wprowadzoną przez użytkownika z wartością otrzymaną w wyniku odejmowania										   
		document.getElementById("przycisk").onclick = function()
													{
														porownaj(a - b);
													} 
	}


	//Funkcja mnożenia
	function mnozenie()
	{
		//Losuje liczbę naturalna ze zbioru {1,2,3,...,20}
		var a = parseInt(Math.random() * 100 % 20 + 1);

		// druga liczba jest zależna od wartości pierwszej
		if(a > 10) 
		{
			var b = parseInt(Math.random() * 10 + 1);										
		}
		else
		{
			var b = parseInt(Math.random() * 100 % 20 + 1);										
		}
							
		//Funkcja prezentuje wylosowane liczby użytkownikowi wraz z polem do wpisania poprawnego wyniku
		document.getElementById("oblicz").innerHTML = a + " * " + b + " = " + '<input id="pole-dz" type="number">';

		//Wywołujemy funkcję porownaj(), która porównuje wartość wprowadzoną przez użytkownika z wartością otrzymaną w wyniku mnożenia											 
		document.getElementById("przycisk").onclick = function()
													{
														porownaj(a * b);
													}
	}


	//Funkcja dzielenia
	function dzielenie()
	{
		//Losuje dwie liczby
		var a = parseInt(Math.random() * 100 + 1);

		var b = parseInt(Math.random() * 50 + 1);

		//Jeżeli liczba a jest podzielna przez b...	
		if(a%b == 0)               
		{ 
			//Funkcja prezentuje wylosowane liczby użytkownikowi wraz z polem do wpisania poprawnego wyniku
			document.getElementById("oblicz").innerHTML = a + " / " + b + " = " + '<input id="pole-dz" type="number">';               //jeżeli tak, to pokazujemy w akapicie (id=oblicz) a/b i wstawiamy inputa na wynik
			
			//Wywołujemy funkcję porownaj(), która porównuje wartość wprowadzoną przez użytkownika z wartością otrzymaną w wyniku dzielenia
			document.getElementById("przycisk").onclick = function()
														{
															porownaj(a / b);
														}
		}

		//Jeżeli liczba a jest niepodzielna przez b...
		else if (a % b != 0)  
		{
			//Losuj b dopóki a bedzie podzielne przez b
			do
			{
				var b = parseInt(Math.random() * 50 + 1);
			}
			while(a % b != 0)

			//Funkcja prezentuje wylosowane liczby użytkownikowi wraz z polem do wpisania poprawnego wyniku									
			document.getElementById("oblicz").innerHTML = a + " / " + b + " = " + '<input id="pole-dz" type="number">'; 

			//Wywołujemy funkcję porownaj(), która porównuje wartość wprowadzoną przez użytkownika z wartością otrzymaną w wyniku dzielenia
			document.getElementById("przycisk").onclick = function()
														{
															porownaj(a / b);
														}
		}
												
												
												
	}

	//Ta zmienna przechowuje ilość poprawnych odpowiedzi
	var punkt = 0;

	//Funkcja porównaj() porównuje wartość pobraną z pola o id = "pole-dz" z wartością parametru wynik
	function porownaj(wynik) 
	{
		//Pobieranie wartości z pola id = "pole-dz"
		var liczba = document.getElementById("pole-dz").value;

		//Jeżeli wartości są równe..			
		if(wynik == liczba) 
		{
			//Przyznaje punkt
			punkt++;

			//Pokazuje odpowiedni komunikat i liczbę punktów
			document.getElementById("punkt").innerHTML = '<p class="good">Dobrze!</p> <div class="punkty-ramka"><p>Suma Twoich punktów:</p> <p class="punkty">'+ punkt + '</p></div>'; 

			//Wywołuje ponownie funkcje losuj()
			losuj();
		}

		//Jeżeli wartości nie są równe
		else
		{
			//Pokazuje odpowiedni komunikat
			document.getElementById("punkt").innerHTML = '<p class="bad">Źle :( </p><div> Prawidłowy wynik to ' + wynik + ' <br>Skup się!</p></div>';

			//Wywołuje ponownie funkcje losuj()
			losuj();
		}
				  
	}
window.onload = function()
{
	document.getElementById('start').onclick = losuj;
}