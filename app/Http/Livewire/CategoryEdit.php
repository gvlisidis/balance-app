<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Keyword;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class CategoryEdit extends Component
{
    public Category $category;
    public string $keyword = '';
    public string $name;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function updateName()
    {
        $this->category->update([
            'name' => Str::lower($this->name),
        ]);
    }

    public function addKeyword()
    {
        $keywordModel = $this->category->keyword;
        $keywords = $keywordModel->keywords ?? [];

        array_push($keywords, Str::lower($this->keyword));

        Keyword::updateOrCreate(
            ['category_id' => $this->category->id],
            ['keywords' => $keywords,]
        );

        $this->reset('keyword');
    }

    public function deleteKeyword(string $categoryKeyword)
    {
        $keywordModel = $this->category->keyword;
        $keywords = $keywordModel->keywords;
        Arr::pull($keywords, $categoryKeyword);
        $keywordModel->update([
            'keywords' => $keywords,
        ]);
    }

    public function render()
    {
        return view('livewire.category-edit');
    }
}
