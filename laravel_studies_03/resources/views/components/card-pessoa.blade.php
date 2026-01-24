<div class="card col mt-5 me-2" style="width: 18rem;">
  <h2>{{$nomePessoa}}</h2>
  <div class="card-body">
    <h5 class="card-title">Idiomas que Domina</h5>
    <ul>
        @foreach ($idiomas as $itemIdioma)
            <li class="card-text">{{$itemIdioma}}</li>
        @endforeach
    </ul>
    <a href="#" class="btn btn-primary">Clique Aqui</a>
  </div>
</div>
