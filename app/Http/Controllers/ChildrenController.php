<?php

namespace App\Http\Controllers;

use App\Models\Children;
use App\Models\children_parent;
use App\Models\Koordinator;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ChildrenController extends Controller
{
    public function index()
    {
        return view('pages.anak.index');
    }

    public function about()
    {
        $dataParent = children_parent::get();
        $data = User::join('children', 'users.id', '=', 'children.user_id')
            ->join('children_parents', 'children_parents.id', '=', 'children.parent_id')
            ->join('koordinators', 'koordinators.id', '=', 'children.coordinator_id')
            ->where('children.user_id', auth()->user()->id)
            ->get(['children.*', 'children_parents.name as parent_name', 'koordinators.name as koor_name']);
        return view('pages.anak.about', [
            'dataParent' => $dataParent,
            'data' => $data
        ]);
    }

    public function showParent()
    {
        $data = children_parent::get();
        return view('pages.anak.show-parent', [
            'data' => $data
        ]);
    }

    public function detailParent($id)
    {
        $data = children_parent::where('children_parents.id', $id)->get();
        return view('pages.anak.detail-parent', [
            'data' => $data
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
            'nik' => 'required',
            'file_ktp' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'file_kk' => 'required|image|max:2048|mimes:jpg,jpeg,png'
        ]);

        $file_ktp = $request->file('file_ktp');
        $filename = 'images/berkas_parent/' . $file_ktp->getClientOriginalName();
        $file_ktp->move(public_path('images/berkas_parent/'), $filename);

        $file_kk = $request->file('file_kk');
        $filename2 = 'images/berkas_parent/' . $file_kk->getClientOriginalName();
        $file_kk->move(public_path('images/berkas_parent/'), $filename2);
        
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
            'nik' => $request->nik,
            'file_ktp' => $filename,
            'file_kk' => $filename2
        ]);

        // dd($data);
        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('child.show-parent');
        } else {
            return redirect()->route('child.store-parent');
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
        // dd($request->all());
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
            'nik' => 'required',
            'file_ktp' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'file_kk' => 'required|image|max:2048|mimes:jpg,jpeg,png'
        ]);
        $data = children_parent::findOrFail($id);
        
        if ($request->hasFile('file_ktp')) {
            $file_ktp = $request->file('file_ktp');
            $filename = 'images/parent/' . $file_ktp->getClientOriginalName();
            $file_ktp->move(public_path('images'), $filename);
            
            Storage::delete(public_path('images'), $filename);
            
            $file_kk = $request->file('file_kk');
            $filename2 = 'images/parent/' . $file_kk->getClientOriginalName();
            $file_kk->move(public_path('images'), $filename2);
            $file_kk->storeAs('public/images/parent' . $file_kk->getClientOriginalName());

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
                'nik' => $request->nik,
                'file_ktp' => $filename,
                'file_kk' => $filename2
            ]);

        } else {
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
                'nik' => $request->nik,
            ]);
        }

        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('child.about');
        } else {
            return redirect()->route('child.update-parent');
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
            'grade' => 'required',
            'city_address' => 'required',
            'address' => 'required',
            'class' => 'required',
            'school' => 'required',
            'file_raport' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'file_sktm' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_sitting_room' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'photo_front_home' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'photo_kitchen' => 'required|image|max:2048|mimes:jpg,jpeg,png',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:koordinators,id',
            'parent_id' => 'required|exists:children_parents,id',
            'donation_amount' => 'nullable|numeric',
        ]);
        // dd($request->file('file_raport'));

        $photo = $request->file('photo');
        $filename = 'images/' . $photo->getClientOriginalName();
        $photo->move(public_path('images'), $filename);
    
        $photo = $request->file('file_raport');
        $fileRaport = 'images/anak/' . $photo->getClientOriginalName();
        $photo->move(public_path('images/anak/'), $fileRaport);
    
        $photo = $request->file('file_sktm');
        $fileSktm = 'images/anak/' . $photo->getClientOriginalName();
        $photo->move(public_path('images/anak/'), $fileSktm);
    
        $photo = $request->file('photo_sitting_room');
        $fileSittingRoom = 'images/anak/' . $photo->getClientOriginalName();
        $photo->move(public_path('images/anak/'), $fileSittingRoom);
    
        $photo = $request->file('photo_front_home');
        $fileFrontRoom = 'images/anak/' . $photo->getClientOriginalName();
        $photo->move(public_path('images/anak/'), $fileFrontRoom);
    
        $photo = $request->file('photo_kitchen');
        $fileKitchen = 'images/anak/' . $photo->getClientOriginalName();
        $photo->move(public_path('images/anak/'), $fileKitchen);
    
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
            'city_address' => $request->city_address,
            'address' => $request->address,
            'class' => $request->class,
            'school' => $request->school,
            'file_raport' => $fileRaport,
            'file_sktm' => $fileSktm,
            'photo_sitting_room' => $fileSittingRoom,
            'photo_front_home' => $fileFrontRoom,
            'photo_kitchen' => $fileKitchen,
            'status_with_parents' => $request->status_with_parents,
            'coordinator_id' => $request->coordinator_id,
            'parent_id' => $request->parent_id,
            'user_id' => $user_id,
        ]);

        if ($data) {
            // dd('berhasil');
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('child.about');
        } else {
            // dd('gagal');
            Alert::error('Data Gagal Dibuat');
            return redirect()->route('child.create-child');
        }
    }

    public function editChildrenData($id)
    {
        $data = Children::findOrFail($id);
        $dataKoor = Koordinator::get();
        $dataParent = children_parent::get();

        // dd($data);

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
            'photo' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,svg,webp',
            'status_in_family' => 'required',
            'grade' => 'required',
            'city_address' => 'required',
            'address' => 'required',
            'class' => 'required',
            'school' => 'required',
            'file_raport' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'file_sktm' => 'nullable|image|max:2048|mimes:jpg,jpeg,png,gif,svg,webp',
            'photo_sitting_room' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'photo_front_home' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'photo_kitchen' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
            'status_with_parents' => 'required',
            'coordinator_id' => 'required|exists:koordinators,id',
            'parent_id' => 'required|exists:children_parents,id',
            'donation_amount' => 'nullable|numeric',
        ]);

        $children = Children::findOrFail($id);

        if ($request->hasFile('photo') || $request->hasFile('file_raport') || $request->hasFile('file_sktm') || $request->hasFile('photo_sitting_room') || $request->hasFile('photo_front_home') || $request->hasFile('photo_kitchen')) {
            $photo = $request->file('photo');
            $filename = 'images/' . $photo->getClientOriginalName();
            $photo->move(public_path('images'), $filename);
        
            $photo = $request->file('file_raport');
            $fileRaport = 'images/anak/' . $photo->getClientOriginalName();
            $photo->move(public_path('images/anak/'), $fileRaport);
        
            $photo = $request->file('file_sktm');
            $fileSktm = 'images/anak/' . $photo->getClientOriginalName();
            $photo->move(public_path('images/anak/'), $fileSktm);
        
            $photo = $request->file('photo_sitting_room');
            $fileSittingRoom = 'images/anak/' . $photo->getClientOriginalName();
            $photo->move(public_path('images/anak/'), $fileSittingRoom);
        
            $photo = $request->file('photo_front_home');
            $fileFrontRoom = 'images/anak/' . $photo->getClientOriginalName();
            $photo->move(public_path('images/anak/'), $fileFrontRoom);
        
            $photo = $request->file('photo_kitchen');
            $fileKitchen = 'images/anak/' . $photo->getClientOriginalName();
            $photo->move(public_path('images/anak/'), $fileKitchen);
    
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
                'city_address' => $request->city_address,
                'address' => $request->address,
                'class' => $request->class,
                'school' => $request->school,
                'file_raport' => $fileRaport,
                'file_sktm' => $fileSktm,
                'photo_sitting_room' => $fileSittingRoom,
                'photo_front_home' => $fileFrontRoom,
                'photo_kitchen' => $fileKitchen,
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
            Alert::success('Data Berhasil Disimpan');
            return redirect()->route('child.about');
        } else {
            dd('gagal');
            return redirect()->route('child.edit-child');
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
