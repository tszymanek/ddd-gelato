Produkcja (Production):
  * Lody (Gelato) są wytwarzane przez rzemieślnika (Artisan/Craftsman)
  * Rzemieślnik wytwarza lody w zależności od zapotrzebowania lodziarń (Gelateria), gdy:
    - szafa mroźnicza/zamrażarka (Freezer) danej lodziarni "pustoszeje"
    - zaczyna brakować lodów w witrynie (Showcase) danej lodziarni
  * Po wyprodukowaniu lody trafiają do szafy mroźniczej/zamrażarki (Freezer) laboratorium (Lab) rzemieślnika i czekają na dostarczenie do lodziarń, gdy:
    - szafa mroźnicza danej lodziarni jest w stanie je pomieścić
    - zaczyna brakować lodów w witrynie danej lodziarni
Dystrybucja (Distribution):
  * Dostawca (Provider) odbiera lody od rzemieślnika (z jego szafy mroźniczej), jeśli jest na nie zapotrzebowanie w danej lodziarni
  * Dostawca przemieszcza się z lodami do danej lodziarni i umieszcza je w szafie mroźniczej danej lodziarni
Sprzedaż (Sale):
  * Sprzedawca (Salesman) wyciąga z zamrażarki lody, których smaków brakuje, i umieszcza je, w miejsce brakujących smaków, w witrynie

Produkcja:
  * Rzemieślnik wytwarza unikalne lody o danym smaku/nazwie
    // $craftsman->make(new Gelato(name));
    $craftsman->make(Gelato $gelato);
  * Rzemieślnik przemieszcza lody do szafy mroźniczej swego laboratorium
    $craftsman->put(Gelato $gelato, Freezer $freezer);

Dystrybucja:
  * Dostawca odbiera lody z zamrażarnika laboratorium rzemieślnika
    $provider->