@extends('adminlte::page')

@section('title', 'SIESCOLA - Home')

@section('content_header')
    
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12" id="center" style='text-align: center;'>              
        <h1><b>Sistema de Gerenciamento de Matriculas Escolares</b></h1>
        <br>
      </div>             
    </div>
<section class='centraliza' >
<div class="col-md-6" style='position: absolute; top: 20%; left:35%;'>
<div class="col-md-5 col-xs-6" style='border-radius: 10px'>
  <!-- small box -->
  <div class="small-box bg-aqua" style='width: auto; border-radius: 10px';>
    <div class="inner">
      <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totAluno}}</font></font></h3>

      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Alunos</font></font></p>
    </div>
    <div class="icon">
      <i class="fas fa-user-graduate"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-md-5 col-xs-6" style='border-radius: 10px'>
  <!-- small box -->
  <div class="small-box bg-green" style='border-radius: 10px'>
    <div class="inner">
    <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totProfessor}}</font></font></h3>


      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Professores</font></font></p>
    </div>
    <div class="icon">
      <i class="fas fa-chalkboard-teacher"></i>
    </div>
  </div>
</div>
<!-- ./col -->

<div class="col-md-5 col-xs-6" style='border-radius: 10px'>
  <!-- small box -->
  <div class="small-box bg-yellow" style='border-radius: 10px'>
    <div class="inner">
      <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totCurso}}</font></font></h3>

      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cursos</font></font></p>
    </div>
    <div class="icon">
      <i class="fas fa-graduation-cap"></i>
    </div>
  </div>
</div>
<!-- ./col -->
<div class="col-md-5 col-xs-6" style='border-radius: 10px'>
  <!-- small box -->
  <div class="small-box bg-red" style='border-radius: 10px'>
    <div class="inner">
      <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$totMat}}</font></font></h3>

      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Matriculas</font></font></p>
    </div>
    <div class="icon">
      <i class="fas fa-chalkboard"></i>
    </div>
  </div>
</div>
<!-- ./col -->

</div>
</section>
@stop