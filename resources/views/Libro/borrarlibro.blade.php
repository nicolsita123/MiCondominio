<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<div class="modal fade" id="modal-delete.{{$registro->ID_RESIDENTE}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    

<div class="modal" tabindex="-1">
  <div class="modal-dialog">
  <form action="{{route('destroy', $registro->ID_LIBRO)}}" method="POST">
    
    @csrf
    @method('DELETE')
    
</form> 
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminación de registros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Deseas eliminar el registro {{$registro->ID_LIBRO}}
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
      </div>
      </div>
    </div>
  </div>
</div>