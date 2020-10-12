@extends('layouts.app')

@section('content')

<script>
  function validar() {
       
    let nombre_ =$('#nombre').val();
    let apellido_ =$('#apellido').val();
    let identificacion_ =$('#identificacion').val();
    let id_genero_ =$('#id_genero').val();
    let telefono_ =$('#telefono').val();
       
    console.log(nombre_,apellido_,identificacion_,id_genero_,telefono_);    

    if (nombre_.length == 0 || /^\s+$/.test(nombre_) ) {
      Swal.fire("Atención", "El campo Nombre no puede ir vacío", "info")
      return false;
    }else
    if (apellido_.length == 0 || /^\s+$/.test(apellido_)) {
      Swal.fire("Atención", "El campo Apellido no puede ir vacío", "info")
      return false;
    } else
    if (identificacion_.length == 0|| !/^([0-9])*$/.test(identificacion_)) {
      Swal.fire("Atención", "El campo Documento no puede ir vacío y solo permite números.", "info")
      return false;
    }else
    if (identificacion_.length > 20) {
           Swal.fire("¡Atención!","No debe exceder el límite de caracteres en el campo documento.","info")
           return false;
      } else 
    if(id_genero_.length == 0) {
      Swal.fire("Atención", "Debes seleccionar un genero", "info")
      return false;
    }else    
    if (telefono_.length == 0|| !/^([0-9])*$/.test(telefono_) ) {
      Swal.fire("Atención", "El campo Teléfono no puede ir vacío", "info")
      return false;
    }  else {
            setTimeout(function() {
                Swal.fire("Exito", "Se ha registrado con éxito " +
                    "satisfactoriamente", "success");
                   
            }, 5000); 
    }
  }
</script>
<script>
  function validar_editar() {
       
    let nombre_ =$('#nombre_upd').val();
    let apellido_ =$('#apellido_upd').val();
    let identificacion_ =$('#identificacion_upd').val();
    let id_genero_ =$('#id_genero_upd').val();
    let telefono_ =$('#telefono_upd').val();
       
    console.log(nombre_,apellido_,identificacion_,id_genero_,telefono_);    

    if (nombre_.length == 0 || /^\s+$/.test(nombre_) ) {
      Swal.fire("Atención", "El campo Nombre no puede ir vacío", "info")
      return false;
    }else
    if (apellido_.length == 0 || /^\s+$/.test(apellido_)) {
      Swal.fire("Atención", "El campo Apellido no puede ir vacío", "info")
      return false;
    } else
    if (identificacion_.length == 0|| !/^([0-9])*$/.test(identificacion_)) {
      Swal.fire("Atención", "El campo Documento no puede ir vacío y solo permite números.", "info")
      return false;
    }else
    if (identificacion_.length > 20) {
           Swal.fire("¡Atención!","No debe exceder el límite de caracteres en el campo documento.","info")
           return false;
      } else 
    if(id_genero_.length == 0) {
      Swal.fire("Atención", "Debes seleccionar un genero", "info")
      return false;
    }else    
    if (telefono_.length == 0|| !/^([0-9])*$/.test(telefono_) ) {
      Swal.fire("Atención", "El campo Teléfono no puede ir vacío", "info")
      return false;
    }  else {
            setTimeout(function() {
                Swal.fire("Exito", "Se ha registrado con éxito " +
                    "satisfactoriamente", "success");
                   
            }, 5000); 
    }
  }
</script>
<div class="align-center">
<h1 class="align-center">TÉCNICOS</h1>
</div>
<div class="container-fluid">
  <div class="container-fluid" style="width:100%;height:120%;">
    <div class="row">
    </div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
    <form action="{{url('/creartecnicos')}}" onsubmit='return validar()' enctype="multipart/form-data" method="post">
      {{csrf_field() }}
      <div class="row">
        <div class="col-6">
          <label for="Nombre">{{'Nombre'}}</label>
          <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
        </div>
        <div class="col">
          <label for="Apellido">{{'Apellido'}}</label>
          <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellido">
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="Identificacion">{{'Identificacion'}}</label>
          <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Identificación">
        </div>
        <div class="col">
        <label for="Genero">{{'Genero'}}</label>
          <select id="id_genero" class="form-control" name="id_genero">
            <option value="">Seleccione</option>
            @foreach($generos as $value)
            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
        <label for="Telefono">{{'Télefono'}}</label>
        <input type="number" name="telefono" id="telefono" class="form-control">
      </div>
  </div>
  <br>
  <input value="Agregar" class="btn btn-success" type="submit">
  </form>
</div>
</div>
</div>
<br><br>
<div class="container-fluid" style="width:100%;height:120%;">
  <div class="row">
    <div class="form-group col-12 col-md-8 col-lg-8 col-xl-8 col-sm-12">
      <table class="table table-light" id="tablaTecnicos">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Identificación</th>
            <th>Télefono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tecnicos as $tec)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$tec->nombre}}</td>
            <td>{{$tec->apellido}}</td>
            <td>{{$tec->identificacion}}</td>
            <td>{{$tec->telefono}}</td>
            <td>
            <button type="button" onclick="editar({{$tec->id}})"  class="btn btn-primary"  data-toggle="modal" data-target="#editarGrupo"><i class="fa fa-pencil" aria-hidden="true"></i></button>  
            |
              <form method="post" action="{{url('/tecnicos/'.$tec->id)}}">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button type="submit" class=" btn btn-danger" onclick="return confirm('¿ Borrar?');">Borrar</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
 <!-- inicio modal actualizar -->
<div class="modal fade" id="editarGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Tecnicos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/tecnicos')}}" onsubmit='return validar_editar()' method="POST">
                {{csrf_field() }}
                <div>
                <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
                        <label hidden>Id</label>
                        <input type="hidden" value="" id="id_upd" class="form-control" name="id_upd">
                    </div>
                </div>
      <div class="row">
        <div class="col-6">
          <label for="Nombre">{{'Nombre'}}</label>
          <input type="text" name="nombre_upd" id="nombre_upd" class="form-control" placeholder="Nombre">
        </div>
        <div class="col">
          <label for="Apellido">{{'Apellido'}}</label>
          <input type="text" name="apellido_upd" id="apellido_upd" class="form-control" placeholder="Apellido">
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="Identificacion">{{'Identificacion'}}</label>
          <input type="text" name="identificacion_upd" id="identificacion_upd" class="form-control" placeholder="Identificación">
        </div>
        <div class="col">
        <label for="Genero">{{'Genero'}}</label>
          <select id="id_genero_upd" class="form-control" name="id_genero_upd">
            <option value="">Seleccione</option>
            @foreach($generos as $value)
            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
        <label for="Telefono">{{'Télefono'}}</label>
        <input type="number" name="telefono_upd" id="telefono_upd" class="form-control">
      </div>
  </div>
  <br>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Editar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- fin modal actualizar -->

 <script>
    function editar(id) {
        $.ajax({
            url: '/tecnicos/ver',
            type: 'GET',
            data: {
                'id': id,
            },
            datatype: 'json',
            success: function(data) {
                $("#id_upd").val(data["id"]);
                $("#nombre_upd").val(data["nombre"]);
                $("#apellido_upd").val(data["apellido"]);
                $("#identificacion_upd").val(data["identificacion"]);
                $("#id_genero_upd").val(data["id_genero"]);
                $("#telefono_upd").val(data["telefono"]);
            }
        });
    }
    
</script>
@endsection