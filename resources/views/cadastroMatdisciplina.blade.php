@extends('adminlte::page')

@section('title', 'SIESCOLA - Matricula Disciplinas')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Matricula em Disciplinas</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>CADASTRO DOS DADOS DA MATRICULA EM DISCIPLINAS</b></h4>
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
        <form method="POST" action="{{ route('matdisciplina.store')}}">
          @csrf
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputMatricula">Matricula:</label>
              <select name='cdmatricula' class="form-control">
              <option value="" disabled selected>Selecione a matricula</option>
              @foreach ($data['matricula'] as $value)
                <option value={{$value->cdmatricula}}>{{$value->cdmatricula}}</option>
              @endforeach
              </select>
            </div>
            </div> 
            <div class="col-md-4">
            <div class="form-group">
              <label for="inputDisciplina">Disciplina:</label>
              <select name='cddisciplina' class="form-control">
              <option value="" disabled selected>Selecione a disciplina</option>
              @foreach ($data['disciplina'] as $value)
                <option value={{$value->cddisciplina}}>{{$value->nomedisciplina}}</option>
              @endforeach
              </select>
            </div>
            </div>
            
            <div class="col-md-4">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Valor:</font></font></label>
              <input type="text" name='valor' class="form-control" placeholder="Valor da matricula na disciplina">
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