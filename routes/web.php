    <?php

    use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    // Route::get('/', function () {
    //     return view('welcome');
    // });

    // index method from controller
    Route::get('/', [TaskController::class, 'index']);

    // Route::get('/create', function () {
    //     return view('create');
    // });

    // Route::patch('/tasks/{id}/toggle', [TaskController::class, 'toggleCompleted'])->name('tasks.toggle');

    Route::resource('tasks', TaskController::class);

    Route::resource('users', UserController::class);
