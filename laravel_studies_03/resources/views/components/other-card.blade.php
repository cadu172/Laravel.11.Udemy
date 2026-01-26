<div class="card col mt-5 me-2" style="width: 18rem;">
  <h2>Passando Informações através do Slot</h2>
  <div class="card-body">
    <h3>Inicio do Componente</h3>
    {{-- Aqui vai o conteudo do slot --}}
    {{ $slot }}
    <h3>Fim do Componente</h3>
    <a href="#" class="btn btn-primary">Clique Aqui</a>
  </div>
</div>
