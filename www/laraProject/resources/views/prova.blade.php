<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1,   shrink-to-fit=no">
<title>Multiple Image upload</title>
</head>
  <body>
    <div>
    <h3>Upload a Images</h3>
    <hr>
      <form method="POST" action="addAnnuncio" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div>
          <label>Descrizione</label>
            <input type="text" name="descrizione" rows="4" placeholder="Enter Product description">
          <label>Inizio locazione</label>
            <input type="date" onload="getDate()" name="inizio_locazione"/>
          <label>Fine locazione</label>
            <input type="date" onload="getDate()" name="fine_locazione"/>
          <label>Stato</label>
            <input type="text" name="stato" placeholder="Inserire stato"/>
          <label>Città</label>
            <input type="text" name="citta" placeholder="Inserire città"/>
          <label>CAP</label>
            <input type="text" name="CAP" placeholder="Inserire CAP"/>
          <label>Indirizzo</label>
            <input type="text" name="indirizzo" placeholder="Inserire indirizzo"/>
          <label>Prezzo</label>
            <input type="number" name="canone" placeholder="Inserire canone d'affitto" min="0" step="any"/>
          <label>Genere del locatario</label>
            <select name="genere">
              <option value="Uomo">Uomo</option>
              <option value="Donna">Donna</option>
              <option value="Non specificato" selected="selected">Non specificato</label>
            </selecet>
          <div>
              <input type="checkbox" name="servizio1" value="1"/>
            <label>1</label>
              <input type="checkbox" name="servizio2" value="2"/>
            <label>2</label>
              <input type="checkbox" name="servizio3" value="3"/>
            <label>3</label>
          </div>
        </div>
        <div>
          <label>Choose main img</label>
            <input type="file" name="mainImg"/>
          <label>Choose Images</label>
            <input type="file"  name="images[]" multiple/>
        </div>
        <hr>
        <button type="submit" >Submit</button>
      </form>
    </div>
  </body>
</html>
