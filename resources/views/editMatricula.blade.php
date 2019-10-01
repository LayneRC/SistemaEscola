@extends('adminlte::page')

@section('title', 'SIESCOLA - Matricula')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Matriculas</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DA MATRICULA</b></h4>
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
        <form method="POST" action="{{ route('matricula.update', $matricula->cdmatricula)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputAluno">Aluno:</label>
                    <select name='cdaluno' class="form-control">
                        @foreach ($data['aluno'] as $value)
                            <option {{ isset($matricula) && ! empty($matricula->cdaluno) 
                                    && $matricula->cdaluno === $value->cdaluno ? 'selected' : ''}} 
                                    value="{{$value->cdaluno}}">{{$value->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputAluno">Curso:</label>
                    <select name='cdcurso' class="form-control">
                        @foreach ($data['curso'] as $value)
                            <option {{ isset($matricula) && ! empty($matricula->cdcurso) 
                                    && $matricula->cdcurso === $value->cdcurso ? 'selected' : ''}} 
                                    value="{{$value->cdcurso}}">{{$value->nomecurso}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputSemestre">Semestre:</label>
                    <select name='cdsemestre' class="form-control">
                        @foreach ($data['semestre'] as $value)
                            <option {{ isset($matricula) && ! empty($matricula->cdsemestre) 
                                    && $matricula->cdsemestre === $value->cdsemestre ? 'selected' : ''}} 
                                    value="{{$value->cdsemestre}}">{{$value->ano}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputAluno">Turma:</label>
                    <select name='cdturma' class="form-control">
                        @foreach ($data['turma'] as $value)
                            <option {{ isset($matricula) && ! empty($matricula->cdturma) 
                                    && $matricula->cdturma === $value->cdturma ? 'selected' : ''}} 
                                    value="{{$value->cdturma}}">{{$value->nometurma}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-md-3">
                <label for="des">Valor:</label>
                @if(isset($matricula) && !empty($matricula->valor))      
                    <input type="text" class="form-control" name="valor" id="title" value="{{ $matricula->valor }}">
                @else
                    <input type="text" class="form-control" name="valor" id="title">
                @endif
            </div>
            
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('matricula.show', $matricula->cdmatricula)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop