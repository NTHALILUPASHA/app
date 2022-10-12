
<?php
 
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\workerController;
  
 Route::get('/', function () {
     return view('welcome');
 });
 Route::resource("/worker", workerController::class);
