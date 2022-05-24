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
          <label>Choose Images</label>
            <input type="file"  name="images[]" multiple>
        </div>
        <hr>
        <button type="submit" >Submit</button>
      </form>
    </div>
  </body>
</html>
