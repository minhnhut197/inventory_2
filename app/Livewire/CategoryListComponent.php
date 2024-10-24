<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Str;
class CategoryListComponent extends Component
{
    use WithPagination;
    public $id;
    public $name;
    // public $slug;
    public function store(){
        $category=new Category();
        $category->name=$this->name;
        // $category->slug=$this->slug;
        $category->save();
        // Alert::success('A new supplier was added successfully!');
        // session()->flash('message','A new supplier was added successfully!');
        // return back()->with('message','A new supplier has been added!');
    }
    public function generateslug(){
        $this->slug=Str::slug($this->name);
    }
    public function mount2($id){
        $category=Category::where('id',$id)->first();
        $this->id=$category->id;
        $this->name=$category->name;
        // $this->slug=$category->slug;
    }
    public function deleteConfirm($id){
        $category=Category::find($id);
        $category->delete();
        session()->flash('message', 'category has been deleted!');
    }
    public function update(){
        $category=Category::find($this->id);
        $category->name=$this->name;
        // $category->slug=$this->slug;
        $category->save();
        session()->flash('message','Item has been updated!');
    }
    public function render()
    {
        $categories=Category::paginate(10);
        return view('livewire.category-list-component',['categories'=>$categories])->layout('layouts.base');
    }
}
