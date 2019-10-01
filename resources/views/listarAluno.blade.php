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
        <li class="breadcrumb-item active" aria-current="page">Consultar</li>
      </ol>
    </nav>              

                    
    <div class="row">  
      <br>
      <h4 id="center" style='text-align: center;'><b>LISTA DOS ALUNOS CADASTRADOS</b></h4>
      <br>              
    </div>

  
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></h3>
              <a href="{{route('aluno.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Cadastrar</a>     
              </button>
              <form action="{{route('aluno.search')}}" method="POST" class="form form-inline pull-right">
                {!! csrf_field() !!}
                <input type="text" name="nmatricula" class="form-control" placeholder="Número Matricula">
                <input type="text" name="nome" class="form-control" placeholder="Nome Aluno">

                <button type="submit" class="btn btn-default">Pesquisar</button>
              </form>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <thead>
                    <tr>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit; position: center;">Número Matricula</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Status</font></font></th>
                        <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Ação</font></font></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($listAluno as $value)
                    <tr>
                        <th>{{$value->nmatricula}}</th>
                        <th>{{$value->nome}}</th>
                        <th>{{$value->status}}</th>
                        <!-- <th><button type="button" class="edit-model btn btn-primary" data-mynmatricula="{{$value->nmatricula}}" data-mynome="{{$value->nome}}" data-mystatus="{{$value->status}}" data-valid="{{$value->cdaluno}}" data-toggle="modal" data-target="#edit"><i class="fas fa-user-edit"></i></button> -->
                        <th><a href="{{route('aluno.edit', $value->cdaluno)}}" class="btn btn-primary"><i class="fas fa-user-edit"></i></a>
                        </th>
                    </tr>
                @endforeach
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    @stop