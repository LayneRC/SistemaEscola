@extends('adminlte::page')

@section('title', 'SIESCOLA - Matricula')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Matricula</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>CADASTRO DOS DADOS DA MATRICULA</b></h4>
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
        <form method="POST" action="{{ route('matricula.store')}}">
          @csrf
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputAluno">Aluno:</label>
              <select name='cdaluno' class="form-control">
              <option value="" disabled selected>Selecione o aluno</option>
              @foreach ($data['aluno'] as $value)
                <option value={{$value->cdaluno}}>{{$value->nome}}</option>
              @endforeach
              </select>
            </div>
            </div> 
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputCurso">Curso:</label>
              <select name='cdcurso' class="form-control">
              <option value="" disabled selected>Selecione o curso</option>
              @foreach ($data['curso'] as $value)
                <option value={{$value->cdcurso}}>{{$value->nomecurso}}</option>
              @endforeach
              </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputSemestre">Semestre:</label>
              <select name='cdsemestre' class="form-control">
              <option value="" disabled selected>Selecione o semestre</option>
              @foreach ($data['semestre'] as $value)
                <option value={{$value->cdsemestre}}>{{$value->ano}}</option>
              @endforeach
              </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputTurma">Turma:</label>
              <select name='cdturma' class="form-control">
              <option value="" disabled selected>Selecione a turma</option>
              @foreach ($data['turma'] as $value)
                <option value={{$value->cdturma}}>{{$value->nometurma}}</option>
              @endforeach
              </select>
            </div>
            </div>
            <div class="col-md-4">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor:</font></font></label>
              <input type="text" name='valor' class="form-control" placeholder="Valor do curso">
            </div>
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('index')}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop