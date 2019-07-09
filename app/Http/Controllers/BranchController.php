<?php
namespace App\Http\Controllers;
use App\Model\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller{

    public function index(){
        $listdata = Branch::where('branch_delete_status', 1)
            ->orderBy('branch_sort', 'ASC')
            ->get();

        return View('branch.index')
        ->with('listdata', $listdata);
    }

    public function create(){

        return View('branch.create');
    }

    public function store(Request $request){
        $this->validate($request,
            [ 'branch_name' => 'required', ],
            [ 'branch_name.required' => 'Please enter branch name.' ]
        );

        $branch = new Branch;
        $branch->branch_name            = $request->input('branch_name');
        $branch->branch_sort            = $request->input('branch_sort');
        $branch->branch_create_name     = $request->input('userlogin');
        $branch->branch_create_date     = $request->input('thistime');
        $branch->branch_lastedit_name   = $request->input('userlogin');
        $branch->branch_lastedit_date   = $request->input('thistime');
        $branch->branch_delete_status   = 1;
        $branch->save();

        // redirect
        return redirect('branch')->with('message', 'Successfully created branch!');
    }

    public function show($branch_id){}

    public function edit($branch_id){
        // $branch = Branch::findOrFail($branch_id);
        $listdata = Branch::where('branch_id', $branch_id)->get();
        return View('branch.edit')
            ->with('branch_id', $branch_id)
            ->with('branch_name', $listdata[0]['branch_name'])
            ->with('branch_sort', $listdata[0]['branch_sort']);
    }

    public function update(Request $request, $branch_id)
    {
        $this->validate($request,
            [ 'branch_name' => 'required', ],
            [ 'branch_name.required' => 'Please enter branch name.' ]
        );

        // $branch = new Branch;
        $branch = Branch::findOrFail($branch_id);
        $branch->branch_name            = $request->input('branch_name');
        $branch->branch_sort            = $request->input('branch_sort');
        $branch->branch_lastedit_name   = $request->input('userlogin');
        $branch->branch_lastedit_date   = $request->input('thistime');
        $branch->save();

        return redirect('branch')->with('message', 'Successfully updated branch!');
    }

    public function destroy(Request $request, $branch_id)
    {
        $branch = Branch::findOrFail($branch_id);
        $branch->branch_lastedit_name   = $request->input('userlogin');
        $branch->branch_lastedit_date   = $request->input('thistime');
        $branch->branch_delete_status   = 0;
        $branch->save();

       // redirect
       return redirect('branch')->with('message', 'Successfully deleted the branch!');
    }
}
