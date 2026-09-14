<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class MapController extends Controller
{
    private $allowedTables = [
        'users',
        'departments',
        'courses',
        'students',
        'teachers',
        'chairman',
        'phone',
        'takes',
        'teaches'
    ];
    /**
     * Index: 
     */
    public function index()
    {
        return view('map.index', [
            'tables' => $this->allowedTables
        ]);
    }
    /**
     * Show: 
     */
    public function show($tableName)
    {
        if (!in_array($tableName, $this->allowedTables) || !Schema::hasTable($tableName)) {
            abort(404, 'Table not found.');
        }
        $columns = Schema::getColumnListing($tableName);
        $records = DB::table($tableName)->get();
        return view('map.show', compact('tableName', 'columns', 'records'));
    }
}