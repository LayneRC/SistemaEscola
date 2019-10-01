<?php

Route::group(['middleware'  =>  ['auth']], function(){
    Route::get('home', 'HomeController@index')->name('index');
    Route::post('aluno/show', 'alunoController@searchAluno')->name('aluno.search');
    Route::post('professor/show', 'professorController@searchProfessor')->name('professor.search');
    Route::post('curso/show', 'cursoController@searchCurso')->name('curso.search');
    Route::post('turma/show', 'turmaController@searchTurma')->name('turma.search');
    Route::post('semestre/show', 'semestreController@searchSemestre')->name('semestre.search');
    Route::post('disciplina/show', 'disciplinaController@searchDisciplina')->name('disciplina.search');
    Route::post('matricula/show', 'matriculaController@searchMatricula')->name('matricula.search');
    Route::post('matdisciplina/show', 'matdisciplinaController@searchMatdisciplina')->name('matdisciplina.search');


});

Route::resource('/aluno', 'alunoController',[
    'names' => [
        'store' => 'aluno.store',
        'show'  =>  'aluno.show',
        'edit'  =>  'aluno.edit',
        'update' => 'aluno.update',
    ]
])->middleware('auth');

Route::resource('/professor', 'professorController',[
    'names' => [
        'store' => 'professor.store',
        'show'  =>  'professor.show',
        'edit'  =>  'professor.edit',
        'update' => 'professor.update',
    ]
])->middleware('auth');

Route::resource('/curso', 'cursoController',[
    'names' => [
        'store' => 'curso.store',
        'show'  =>  'curso.show',
        'edit'  =>  'curso.edit',
        'update' => 'curso.update',
    ]
])->middleware('auth');

Route::resource('/turma', 'turmaController',[
    'names' => [
        'store' => 'turma.store',
        'show'  =>  'turma.show',
        'edit'  =>  'turma.edit',
        'update' => 'turma.update',
    ]
])->middleware('auth');

Route::resource('/semestre', 'semestreController',[
    'names' => [
        'store' => 'semestre.store',
        'show'  =>  'semestre.show',
        'edit'  =>  'semestre.edit',
        'update' => 'semestre.update',
    ]
])->middleware('auth');

Route::resource('/disciplina', 'disciplinaController',[
    'names' => [
        'store' => 'disciplina.store',
        'show'  =>  'disciplina.show',
        'edit'  =>  'disciplina.edit',
        'update' => 'disciplina.update',
    ]
])->middleware('auth');

Route::resource('/matricula', 'matriculaController',[
    'names' => [
        'store' => 'matricula.store',
        'show'  =>  'matricula.show',
        'edit'  =>  'matricula.edit',
        'update' => 'matricula.update',
    ]
])->middleware('auth');

Route::resource('/matdisciplina', 'matdisciplinaController',[
    'names' => [
        'store' => 'matdisciplina.store',
        'show'  =>  'matdisciplina.show',
        'edit'  =>  'matdisciplina.edit',
        'update' => 'matdisciplina.update',
    ]
])->middleware('auth');

Route::get('/', 'SiteController@index')->name('home');


Auth::routes();

