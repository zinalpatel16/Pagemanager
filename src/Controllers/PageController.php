<?php

namespace Hcipl\Pagesmanager\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hcipl\Pagesmanager\Models\Page;
use Hcipl\Pagesmanager\Repositories\EloquentRepository;

class PageController extends Controller
{

    protected $model;

    /**
     * PageController constructor.
     * @param $model
     */
    public function __construct(Page $model)
    {
        $this->model = new EloquentRepository($model);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->model->all();
        return view('pagesmanager::index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagesmanager::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if( $request->file('cover') != '' ) {

            $path = $request->file('cover')->store('public/page_cover');

            $fileName = 'page_cover/'.pathinfo($path)['basename'];
            $data['cover'] = $fileName;
        }
        
        $data['slug'] = $this->slugify($data['title']);
        $this->model->create($data);
        return redirect('/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->model->find($id);
        return $page;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->model->find($id);
        return view('pagesmanager::edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = $this->model->find($id);
        $data = $request->all();
        
        if( $request->file('cover') != '' ) {

            $path = $request->file('cover')->store('public/page_cover');

            $fileName = 'page_cover/'.pathinfo($path)['basename'];
            $data['cover'] = $fileName;
        }

        $data['slug'] = $this->slugify($data['title']);
        $page->update($data);
        return redirect('/pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->model->find($id);
        $page->delete();
        return redirect('pages');
    }

    private function slugify($text, string $divider = '-')
    {
      // replace non letter or digits by divider
      $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      // trim
      $text = trim($text, $divider);

      // remove duplicate divider
      $text = preg_replace('~-+~', $divider, $text);

      // lowercase
      $text = strtolower($text);

      if (empty($text)) {
        return 'n-a';
      }

      return $text;
    }
}
