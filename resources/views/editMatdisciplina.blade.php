@extends('adminlte::page')

@section('title', 'SIESCOLA - Matricula Disciplina')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Matriculas em Disciplinas</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DA MATRICULA EM DISCIPLINAS</b></h4>
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
        <form method="POST" action="{{ route('matdisciplina.update', $matdisciplina->cdmatdisciplina)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputMatricula">Matricula:</label>
                    <select name='cdmatricula' class="form-control">
                        @foreach ($data['matricula'] as $value)
                            <option {{ isset($matdisciplina) && ! empty($matdisciplina->cdmatricula) 
                                    && $matdisciplina->cdmatricula === $value->cdmatricula ? 'selected' : ''}} 
                                    value="{{$value->cdmatricula}}">{{$value->cdmatricula}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputDisciplina">Disciplina:</label>
                    <select name='cddisciplina' class="form-control">
                        @foreach ($data['disciplina'] as $value)
                            <option {{ isset($matdisciplina) && ! empty($matdisciplina->cddisciplina) 
                                    && $matdisciplina->cddisciplina === $value->cddisciplina ? 'selected' : ''}} 
                                    value="{{$value->cddisciplina}}">{{$value->nomedisciplina}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            
            <div class="col-md-3">
                <label for="des">Valor:</label>
                @if(isset($matdisciplina) && !empty($matdisciplina->valor))      
                    <input type="text" class="form-control" name="valor" id="title" value="{{ $matdisciplina->valor }}">
                @else
                    <input type="text" class="form-control" name="valor" id="title">
                @endif
            </div>
            
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('matdisciplina.show', $matdisciplina->cdmatdisciplina)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop