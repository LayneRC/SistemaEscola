@extends('adminlte::page')

@section('title', 'SIESCOLA - Aluno')

@section('content_header')
@stop

@section('content')
<div id="line-one">
  <div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Aluno</b></h1>
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
      <h4 id="center" style='text-align: center;'><b>EDIÇÃO DOS DADOS DO ALUNO</b></h4>
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
        <form method="POST" action="{{ route('aluno.update', $aluno->cdaluno)}}">
          @method('PATCH')
          @csrf
          <div class="row">
            <div class="col-md-4">
              <label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Número matricula:</font></font></label>
              <input type="text" name='nmatricula' class="form-control" placeholder="" value={{$aluno->nmatricula}} readonly>
            </div>
            <div class="col-md-5">
                <label for="des">Nome</label>
                @if(isset($aluno) && !empty($aluno->nome))      
                    <input type="text" class="form-control" name="nome" id="title" value="{{ $aluno->nome }}">
                @else
                    <input type="text" class="form-control" name="nome" id="title">
                @endif
            </div>
            <div class="col-md-3">
            <div class="form-group">
              <label for="inputStatus">Status:</label>
              <select name='status' class="form-control">
                <option {{ isset($aluno) && !empty($aluno->status) && $aluno->status == 'AT' ? 'selected': '' }}>AT</option>
                <option {{ isset($aluno) && !empty($aluno->status) && $aluno->status == 'IN' ? 'selected': '' }}>IN</option>
              </select>
            </div>
            </div> 
          </div>
                  
          <div class="box-footer" style="margin-top: 4%;">
            <a href="{{route('aluno.show', $aluno->cdaluno)}}" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-warning">Alterar</button>
          </div>
                      
        </form>
      </div>
    </div>             
  </div>
</div>
<!-- /.box-body -->
          
            
@stop