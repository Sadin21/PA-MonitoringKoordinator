<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\children_parent;
use App\Models\ChildrenParent;
use App\Models\Koordinator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChildrenController extends Controller
{
    public function index()
    {
        return view('pages.anak.index');
    }

    public function about()
    {
        $dataParent = children_parent::get();
        $me = User::join('children', 'users.id', '=', 'children.user_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->where('children.user_id', auth()->user()->id)
            ->get(['children.*', 'children_parents.name as parent_name']);
        return view('pages.anak.about', [
            'dataParent' => $dataParent,
            'me' => $me
        ]);
    }

    public function createParentData()
    {
        return view('pages.anak.create-parent');
    }

    public function storeParentData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
        ]);
        
        $data = children_parent::create([
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'marital' => $request->marital,
            'tertiary_education' => $request->tertiary_education,
            'job' => $request->job,
            'salary' => $request->salary,
            'address' => $request->address,
            'phone' => $request->phone,
            'home_status' => $request->home_status,
            'number_of_souls' => $request->number_of_souls,
            'category_of_souls' => $request->category_of_souls,
        ]);

        // dd($data);
        if ($data) {
            // dd('berhasil');
            return redirect()->route('child.index')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('child.store-parent')->with('error', 'Data gagal ditambahkan');
        }

    }

    public function editParentData($id)
    {
        $data = children_parent::findOrFail($id);
        return view('pages.anak.update-parent', [
            'data' => $data
        ]);
    }

    public function updateParentData(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'marital' => 'required',
            'tertiary_education' => 'required',
            'job' => 'required',
            'salary' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'home_status' => 'required',
            'number_of_souls' => 'required',
            'category_of_souls' => 'required',
        ]);
        $data = children_parent::findOrFail($id);
        
        $data->update([
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'marital' => $request->marital,
            'tertiary_education' => $request->tertiary_education,
            'job' => $request->job,
            'salary' => $request->salary,
            'address' => $request->address,
            'phone' => $request->phone,
            'home_status' => $request->home_status,
            'number_of_souls' => $request->number_of_souls,
            'category_of_souls' => $request->category_of_souls,
        ]);

        if ($data) {
            return redirect()->route('child.about')->with('success', 'Data berhasil ditambahkan');
        } else {
            return redirect()->route('child.update-parent')->with('error', 'Data gagal ditambahkan');
        }
         
    }

    public function deleteParentData($id)
    {
        $data = children_parent::findOrFail($id);
        $data->delete();

        if ($data) {
            return redirect()->route('child.about')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('child.about')->with('error', 'Data gagal dihapus');
        }
    }

    public function createChildrenData()
    {
        $dataKoor = Koordinator::get();
        $dataParent = children_parent::get();

        return view('pages.anak.create-children', [
            'dataKoor' => $dataKoor,
            'dataParent' => $dataParent
        ]);
    }

    public function storeChildrenData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg,webp',
            'status_in_family' => 'required',
            // 'regis_staus' => 'required',
            'grade' => 'required',
            'address' => 'required',
            'class' => 'required',
            'semester' => 'required',
            'school' => 'required',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:koordinators,id',
            'parent_id' => 'required|exists:children_parents,id',
        ]);

        // dd($request->all());
        $photo = $request->file('photo');
        $filename = 'images/' . $photo->getClientOriginalName();
        $photo->move(public_path('images'), $filename);

        $user_id = auth()->user()->id;
        
        $data = Children::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'photo' => $filename,
            'status_in_family' => $request->status_in_family,
            'regis_status' => "Pengajuan",
            'grade' => $request->grade,
            'address' => $request->address,
            'semester' => $request->semester,
            'class' => $request->class,
            'school' => $request->school,
            'status_with_parents' => $request->status_with_parents,
            'coordinator_id' => $request->coordinator_id,
            'parent_id' => $request->parent_id,
            'user_id' => $user_id,
        ]);

        // dd($data);

        if ($data) {
            // dd('berhasil');
            return redirect()->route('child.about')->withSuccess('Data Berhasil Disimpan');
        } else {
            dd('gagal');
            return redirect()->route('child.create-child')->withSuccess('Data Gagal Disimpan');
        }
    }

    public function editChildrenData($id)
    {
        $data = Children::findOrFail($id);
        $dataKoor = Koordinator::get();
        $dataParent = children_parent::get();

        return view('pages.anak.update-children', [
            'data' => $data,
            'dataKoor' => $dataKoor,
            'dataParent' => $dataParent
        ]);
    }

    public function updateChildrenData(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg,webp',
            'status_in_family' => 'required',
            // 'regis_staus' => 'required',
            'grade' => 'required',
            'class' => 'required',
            'grade' => 'required',
            'address' => 'required',
            'school' => 'required',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:koordinators,id',
            'parent_id' => 'required|exists:children_parents,id',
        ]);

        $children = Children::findOrFail($id);

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');
            $filename = 'images/' . $photo->getClientOriginalName();
            $photo->move(public_path('images'), $filename);
            Storage::delete(public_path('images'), $filename);
    
            $user_id = auth()->user()->id;

            $children->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'photo' => $filename,
                'status_in_family' => $request->status_in_family,
                'regis_status' => "Pengajuan",
                'grade' => $request->grade,
                'class' => $request->class,
                'address' => $request->address,
                'semester' => $request->semester,
                'school' => $request->school,
                'status_with_parents' => $request->status_with_parents,
                'coordinator_id' => $request->coordinator_id,
                'parent_id' => $request->parent_id,
                'user_id' => $user_id,
            ]);
        } else {
            $user_id = auth()->user()->id;

            $children->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'status_in_family' => $request->status_in_family,
                'regis_status' => "Pengajuan",
                'grade' => $request->grade,
                'address' => $request->address,
                'semester' => $request->semester,
                'class' => $request->class,
                'school' => $request->school,
                'status_with_parents' => $request->status_with_parents,
                'coordinator_id' => $request->coordinator_id,
                'parent_id' => $request->parent_id,
                'user_id' => $user_id,
            ]);
        }

        if ($children) {
            // dd('berhasil');
            return redirect()->route('child.about')->withSuccess('Data Berhasil Diperbarui');
        } else {
            dd('gagal');
            return redirect()->route('child.edit-child')->withSuccess('Data Gagal Diperbarui');
        }
    }

    public function deleteChildrenData($id)
    {
        $data = Children::findOrFail($id);
        $data->delete();

        if ($data) {
            return redirect()->route('child.about')->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->route('child.about')->with('error', 'Data gagal dihapus');
        }
    }
}
