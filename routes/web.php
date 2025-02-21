<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\CategoriesController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;

Route::get('/ping', function(): JsonResponse {
    return response()->json(['pong' => true]);
});

Route::get('states', [StatesController::class, 'index']);
Route::get('categories', [CategoriesController::class, 'index']);

Route::post('user/signup', [UserController::class, 'signup'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('user/signin', [UserController::class, 'signin'])->withoutMiddleware(VerifyCsrfToken::class);
Route::post('user/me', [UserController::class, 'me'])->withoutMiddleware(VerifyCsrfToken::class);

/**
 * [X] /ping - responde com pong
 * 
 * - Rotas de configuração
 * [X] - /states - Listar os estados
 * [X] - /categories - Listar as categorias do sistema
 * [X] - Criar as seeders para os estados e categorias.
 * 
 * Mensagens de erro devem conter:
 * error : Mensagem descritiva do erro, exemplo:
 * {
 * error: 'usuário inválido'
 * }
 * 
 * Sucesso:
 * Deve conter um campo "error" com o valor nulo ou vazio , exemplo:
 * {
 * error: ''
 * }
 * 
 *  - Rotas de Autenticação * Autenticação via TOKEN
 * [ ] /user/signin -- login
 * [ ] /user/signup -- Registro do usuário
 * [ ] /user/me ---informações do usuário logado
 
 * - Rotas de advertises
 * [ ] - /ad/list - Listar todos os anúncios
 * [ ] - /ad/:id - dados de um anúncio único
 * [ ] - /ad/add - Adicionar um novo anúncio
 * [ ] - /ad/:id(PUT) - Alterar um anúncio publicado
 * [ ] - /ad/:id(delete) - Deletar anúncio
 * [ ] - /ad/:image (Deletar a imagem de um anúncio)
 */

?>