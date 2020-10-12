@extends('layouts.app')

@section('content')

<script>
function validar() {
    let id_cliente_ =$('#id_cliente').val();
    let id_tecnico_ =$('#id_tecnico').val();
    let id_servicio_ =$('#id_servicio').val();
    let fecha_inicio_ =$('#fecha_inicio').val();
    let fecha_fin_ =$('#fecha_fin').val();
    let horas_inicio_ =$('#horas_inicio').val();
    let horas_fin_ =$('#horas_fin').val();
       
      console.log(fecha_inicio_);

    if (id_cliente_.length == 0  ) {
      Swal.fire("Atención", "El campo Cliente no puede ir vacío", "info")
      return false;
    }else
    if (id_tecnico_.length == 0 ) {
      Swal.fire("Atención", "El campo técnico no puede ir vacío", "info")
      return false;
    } else
    if (id_servicio_.length == 0) {
      Swal.fire("Atención", "El campo servicio no puede ir vacío.", "info")
      return false;
    }else
    if (fecha_inicio_ === "") {
            Swal.fire({
                title: "El campo fecha no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        } else
        if (fecha_fin_ === "") {
            Swal.fire({
                title: "El campo fecha no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }else
    if (horas_inicio_ ==="") {
            Swal.fire({
                title: "El campo horas no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }else
    if (horas_fin_ === "") {
            Swal.fire({
                title: "El campo horas no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
        else {
            setTimeout(function() {
                Swal.fire("Exito", "Se ha registrado con éxito " +
                    "satisfactoriamente", "success");
                   
            }, 500); 
    }   
}
</script>
<script>
  function validar_editar() {
    let id_cliente_ =$('#id_cliente_upd').val();
    let id_tecnico_ =$('#id_tecnico_upd').val();
    let id_servicios =$('#id_servicios_upd').val();
    let fecha_inicio_ =$('#fecha_inicio_upd').val();
    let fecha_fin_ =$('#fecha_fin_upd').val();
    let horas_inicio =$('#horas_inicio_upd').val();
    let horas_fin =$('#horas_fin_upd').val();
       
      

    if (id_cliente_.length == 0  ) {
      Swal.fire("Atención", "El campo Cliente no puede ir vacío", "info")
      return false;
    }else
    if (id_tecnico_.length == 0 ) {
      Swal.fire("Atención", "El campo técnico no puede ir vacío", "info")
      return false;
    } else
    if (id_servicio_.length == 0) {
      Swal.fire("Atención", "El campo servicio no puede ir vacío.", "info")
      return false;
    }else
    if (fecha_inicio_.length === "") {
            swal("Atención","El campo fecha no puede ir vacío", "error");
            return false;
        } else
        if (fecha_fin_.length === "") {
            swal({
                title: "El campo fecha no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }else
    if (horas_inicio_ === "") {
            swal({
                title: "El campo horas no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }else
    if (horas_fin_ === "") {
            swal({
                title: "El campo horas no puede ir vacío",
                text: "Por favor ingresar fecha ",
                icon: "error"
            });
            return false;
        }
        else {
            setTimeout(function() {
                Swal.fire("Exito", "Se ha registrado con éxito " +
                    "satisfactoriamente", "success");
                   
            }, 5000); 
    }  
}
</script>

<h1>SERVICIOS</h1>
<div class="container-fluid">
  <div class="container-fluid"  style="width:100%;height:120%;">
    <div class="row">
    </div class="form-group col-12 col-md-4 col-lg-4 col-xl-4 col-sm-12">
    <form action="{{url('/crearServicios')}}" onsubmit='return validar()' method="post">
      {{csrf_field() }}
      <div class="row">
        <div class="col-6">
          <label for="Cliente">{{'Cliente'}}</label>
          <select id="id_cliente" class="form-control" name="id_cliente">
            <option value="">Seleccione</option>
            @foreach($cliente as $value)
            <option value="{{ $value->id }}">{{$value->nombre }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <label for="Tecnico">{{'Técnico'}}</label>
          <select id="id_tecnico" class="form-control" name="id_tecnico">
            <option value="">Seleccione</option>
            @foreach($tecnico as $value)
            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="servicios">{{'Servicios'}}</label>
          <select id="id_servicio" class="form-control" name="id_servicio">
            <option value="">Seleccione</option>
            @foreach($tiposervicio as $value)
            <option value="{{ $value->id }}">{{ $value->nombre }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <label for="FechaInicio">{{'Fecha Inicio'}}</label>
          <input type="date"  name="fecha_inicio" id="fecha_inicio" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="FechaInicio">{{'Fecha Fin'}}</label>
          <input type="date" onchange="validar_fecha()" name="fecha_fin" id="fecha_fin" class="form-control">
        </div>
        
          <div class="col-6">
            <label for="horas">{{'Hora de inicio'}}</label>
            <input type="time" name="horas_inicio" id="horas_inicio" class="form-control">
          </div>        
      </div>
      <div class="row">
        <div class="col-6">
          <label for="FechaInicio">{{'Hora Fin'}}</label>
          <input type="time"  name="horas_fin" id="horas_fin" class="form-control">
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
      <table class="table table-light" id="tablaClientes">
        <thead class="thead-light">
          <tr>
            <th>#</th>
            <th>Servicio</th>
            <th>Cliente</th>
            <th>Tecnico</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Hora Inicio</th>
            <th> Hora Fin</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($servicios as $ser)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ser->tipo_servicio}}</td>
            <td>{{$ser->cliente}}</td>
            <td>{{$ser->tecnico}}</td>
            <td>{{date('d/m/Y', strtotime($ser->fecha_inicio))}}</td>
            <td>{{date('d/m/Y', strtotime($ser->fecha_fin))}}</td>
            <td>{{date('H:m',strtotime($ser->horas_inicio))}}</td>
            <td>{{date('H:m',strtotime($ser->horas_fin))}}</td>
            
            <td>
              <button type="button" onclick="editar({{$ser->id}})" class="btn btn-primary" data-toggle="modal" data-target="#editarGrupo"><i class="fa fa-pencil" aria-hidden="true"></i></button>
              |
              <form method="post" action="{{url('/servicios/'.$ser->id)}}">
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
        <h5 class="modal-title" id="exampleModalLabel">Editar Grupos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/servicios')}}" onsubmit='return validar_editar()' method="POST">
          {{csrf_field() }}
          <div>
            <div class="form-group col-12 col-md-12 col-lg-12 col-xl-12 col-sm-12">
              <label hidden>Id</label>
              <input type="hidden" value="" id="id_upd" class="form-control" name="id_upd">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="Cliente">{{'Cliente'}}</label>
              <select id="id_cliente_upd" class="form-control" name="id_cliente_upd">
                <option value="">Seleccione</option>
                @foreach($cliente as $value)
                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
              <label for="Tecnico">{{'Técnico'}}</label>
              <select id="id_tecnico_upd" class="form-control" name="id_tecnico_upd">
                <option value="">Seleccione</option>
                @foreach($tecnico as $value)
                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <label for="servicios">{{'Servicios'}}</label>
              <select id="id_servicios_upd" class="form-control" name="id_servicios_upd">
                <option value="">Seleccione</option>
                @foreach($tiposervicio as $value)
                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
                @endforeach
              </select>
            </div>
            <div class="col">
          <label for="FechaInicio">{{'Fecha Inicio'}}</label>
          <input type="date" onchange="validar_fecha()" name="fecha_inicio_upd" id="fecha_inicio_upd" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="FechaInicio">{{'Fecha Fin'}}</label>
          <input type="date" onchange="validar_fecha()" name="fecha_fin_upd" id="fecha_fin_upd" class="form-control">
        </div>
        
          <div class="col-6">
            <label for="horas">{{'Hora  inicio'}}</label>
            <input type="time" name="horas_inicio_upd" id="horas_inicio_upd" class="form-control">
          </div>        
      </div>
      <div class="row">
        <div class="col-6">
          <label for="FechaInicio">{{'Hora Fin'}}</label>
          <input type="time"  name="horas_fin_upd" id="horas_fin_upd" class="form-control">
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
      url: '/servicios/ver',
      type: 'GET',
      data: {
        'id': id,
      },
      datatype: 'json',
      success: function(data) {
        $("#id_upd").val(data["id"]);
        $("#id_cliente_upd").val(data["id_cliente"]);
        $("#id_tecnico_upd").val(data["id_tecnico"]);
        $("#id_servicios_upd").val(data["id_servicio"]);
        $("#fecha_inicio_upd").val(data["fecha_inicio"]);
        $("#fecha_fin_upd").val(data["fecha_fin"]);
        $("#horas_inicio_upd").val(data["horas_inicio"]);
        $("#horas_fin_upd").val(data["horas_fin"]);
      }
    });
  }
</script>
<script >
function validar_fecha(){
var fecha_inicio = document.getElementById("#fecha_inicio");
var fecha_fin = document.getElementById("#fecha_fin");

if(fecha_inicio > fecha_fin){
    fecha_inicio.style.backgroundColor='red';
    return ;
}
}
</script>
@endsection