@extends('adminlte::page')

@section('title', 'SIESCOLA - Professor')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Professor</b></h1>
        <br>
      </div>             
    </div>
            
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('index')}}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{route('professor.show', $professor->cdprofessor)}}">Consultar</a></li>
        <li class="breadcrumb-item active" aria-current="page">Editar</li>
      </ol>
    </nav>              

                    
    <div class="row">  
      <br>
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DO PROFESSOR</b></h4>
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
        <form method="POST" action="{{ route('professor.update', $professor->cdprofessor)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-5">
                <label for="des">Nome</label>
                @if(isset($professor) && !empty($professor->nome))      
                    <input type="text" class="form-control" name="nome" id="title" value="{{ $professor->nome }}">
                @else
                    <input type="text" class="form-control" name="nome" id="title">
                @endif
            </div>
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('professor.show', $professor->cdprofessor)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop