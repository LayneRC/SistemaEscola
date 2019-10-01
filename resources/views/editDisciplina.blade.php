@extends('adminlte::page')

@section('title', 'SIESCOLA - Disciplina')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Disciplinas</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DA DISCIPLINA</b></h4>
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
        <form method="POST" action="{{ route('disciplina.update', $disciplina->cddisciplina)}}">
          @method('PATCH')
          @csrf
          <div class="row">
          <div class="col-md-5">
                <label for="des">Nome</label>
                @if(isset($disciplina) && !empty($disciplina->nomedisciplina))      
                    <input type="text" class="form-control" name="nomedisciplina" id="title" value="{{ $disciplina->nomedisciplina }}">
                @else
                    <input type="text" class="form-control" name="nomedisciplina" id="title">
                @endif
            </div>
            <div class="col-md-3">
                <label for="des">Valor:</label>
                @if(isset($disciplina) && !empty($disciplina->valor))      
                    <input type="text" class="form-control" name="valor" id="title" value="{{ $disciplina->valor }}">
                @else
                    <input type="text" class="form-control" name="valor" id="title">
                @endif
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputStatus">Professor:</label>
              <select name='cdprofessor' class="form-control">
              @foreach ($disciplinas_prof as $value)
                <option {{ isset($disciplina) && ! empty($disciplina->cdprofessor) 
                        && $disciplina->cdprofessor === $value->cdprofessor ? 'selected' : ''}} 
                        value="{{$value->cdprofessor}}">{{$value->nome}}</option>
             @endforeach
              </select>
            </div>
            </div> 
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('disciplina.show', $disciplina->cddisciplina)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop