<?php

namespace App\Http\Controllers;

use App\Models\Stopage;
use Illuminate\Http\Request;
use App\DataTables\StopagesDataTable;
use Yajra\DataTables\Facades\DataTables;

class StopageController extends Controller
{
    public function index(StopagesDataTable $dataTable)
    {
        if (request()->ajax()) {
            return DataTables::of(Stopage::query())
            ->addColumn('action', function ($stopage) {
                $editUrl = route('stopages.edit', $stopage->id);
                $deleteUrl = route('stopages.destroy', $stopage->id);
    
                return '<div class="d-flex">
                            <button class="edit-button btn btn-primary shadow btn-xs sharp me-1" data-name="' . $stopage->name .'" data-fare="' . $stopage->fare .'" data-id="' . $stopage->id .'"  data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-pencil"></i></button>
                            <form method="POST" action="' . $deleteUrl . '" style="display: inline-block;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="delete-button btn btn-danger shadow btn-xs sharp">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>';
            })
            ->rawColumns(['action'])
            ->toJson();
        }

        return $dataTable->render('admin.stopages.index');
    }

    public function create()
    {
        // Show a form to create a new stopage
        return view('admin.stopages.create');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'fare' => 'required|integer',
        ]);

        // Create a new stopage instance
        $stopage = new Stopage();
        $stopage->name = $request->input('name');
        $stopage->fare = $request->input('fare');
        
        if($stopage->save()) {
            // Redirect to the index page with a success message
            return redirect()->route('stopages.index')
                ->with('success', 'Stopage created successfully.');
        }
        else {
            // Redirect to the index page with a success message
            return redirect()->route('stopages.index')
                ->with('error', 'Stopage creation failed.');
        }
    }

    public function update(Request $request, Stopage $stopage)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'fare' => 'required|integer',
        ]);

        // Update the stopage instance
        $stopage->name = $request->input('name');
        $stopage->fare = $request->input('fare');
        $stopage->save();

        // Redirect to the index page with a success message
        return redirect()->route('stopages.index')
            ->with('success', 'Stopage updated successfully.');
    }

    public function destroy(Stopage $stopage)
    {
        // Delete the stopage instance
        $stopage->delete();

        // Redirect to the index page with a success message
        return redirect()->route('stopages.index')
            ->with('success', 'Stopage deleted successfully.');
    }
}
