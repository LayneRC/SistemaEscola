@extends('adminlte::page')

@section('title', 'SIESCOLA - Curso')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Curso</b></h1>
        <br>
      </div>             
    </div>
            
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
      </ol>
    </nav>              

                    
    <div class="row">  
      <br>
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DO CURSO</b></h4>
      <br>              
    </div>
                
    <div class="box box-primary">
      
      <div class="box-body">
      @if ($errors->any())
        <div class="alert alert-warning">
          @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
        </div>
      @endif
        <form method="POST" action="{{ route('curso.update', $curso->cdcurso)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-4">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome:</font></font></label>
              <input type="text" name='nomecurso' class="form-control" placeholder="" value={{$curso->nomecurso}}>
            </div>
            <div class="col-md-5">
                <label for="des">Valor</label>
                @if(isset($curso) && !empty($curso->valorcurso))      
                    <input type="text" class="form-control" name="valorcurso" id="title" value="{{ $curso->valorcurso }}">
                @else
                    <input type="text" class="form-control" name="valorcurso" id="title">
                @endif
            </div> 
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('curso.show', $curso->cdcurso)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop