<?php 
namespace App\Http\Controllers; 
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Schema; 
class MapController extends Controller { 
    private $allowedTables = [ 
        'users', 
        'departments', 
        'courses', 
        'students', 
        'teachers', 
        'chairman', 
        'phone', 
        'takes', 
        'teaches', 
        ]; 
        public function index() { 
            return view('map.index', [ 
                'tables' => $this->allowedTables 
                ]); 
            } 
            public function show($tableName) { 
                if (!in_array($tableName, $this->allowedTables)) { 
                    abort(404); 
                    } 
                    $columns = Schema::getColumnListing($tableName); 
                    $rows = DB::table($tableName)->get(); 
                    return view('map.show', [ 
                        'tableName' => $tableName, 
                        'columns' => $columns, 
                        'rows' => $rows, 
                        ]); 
                        } 
}