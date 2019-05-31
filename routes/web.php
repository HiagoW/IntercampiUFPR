<?php
use App\Campus;
use App\Linha;
use App\Horario;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $campi = Campus::all();
    $linhas = Linha::all();
    $horarios = DB::table('horarios')->select('horario','chegada','campus','linha')->get();
    foreach($horarios as $horario){
        foreach($campi as $campus){
            if($horario->campus == $campus->id){
                $horario->campus = $campus->sigla;
            }
        }
        foreach($linhas as $linha){
            if($horario->linha == $linha->id){
                $horario->linha = $linha->nomeLinha;
            }
        }
    }
    $campi = Campus::all('sigla');
    $linhas = Linha::all('nomeLinha');
    return view('index',[
        'campi' => json_encode($campi, JSON_UNESCAPED_SLASHES),
        'linhas' => json_encode($linhas, JSON_UNESCAPED_SLASHES),
        'horarios' => json_encode($horarios, JSON_UNESCAPED_SLASHES)]
    );
});

Route::resource('linhas', 'LinhaController');
Route::resource('campi', 'CampusController');
Route::resource('horarios', 'HorarioController');
