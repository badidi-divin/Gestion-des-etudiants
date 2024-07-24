<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <h1 align="center">EDITER UN ETUDIANT</h1>
                <hr>
                @if(session('status'))
                    <div class="alert alert-success">
                       {{session('status')}} 
                    </div>
                @endif
                <ul>
                    @foreach($errors->all() as $error)
                    <li class="alert alert-danger">{{$error}}</li>
                    @endforeach
                </ul>
                <form action="/update/traitement" class="form-group" method="POST">
                    @csrf
                    <input type="text" id="id" name="id" value="{{$etudiants->id}}" style="display:none">
                    <div class="form-group">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="Nom" name="nom" value="{{$etudiants->nom}}">
                    </div>
                    <div class="form-group">
                        <label for="Prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="Prénom" name="prenom" value="{{$etudiants->prenom}}">
                    </div>
                    <div class="form-group">
                        <label for="Classe" class="form-label">Classe</label>
                        <input type="text" class="form-control" id="Classe" name="classe" value="{{$etudiants->classe}}">
                    </div>
                    <br>
                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-primary">MODIFIER UN ETUDIANT</button>
                    </div>
                    <br>
                    <a href="/etudiant">Revenir</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>