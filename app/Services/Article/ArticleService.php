<?php

namespace App\Services\Article;

use App\Models\Article;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class ArticleService
 * @package App\Services
 */
class ArticleService implements IService
{
    public function getAll()
    {
        try {
            $data = Article::all();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    /**
     * Create a new data
     * @param Request $data
     * @return mixed
     */
    public function create(Request $request)
    {
        $params = $request->all();
        $params['date'] = date('Y-m-d', strtotime($request->date));
        if ($file = $request->file('attachment')){
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/article'), $filename);
            $params['attachment']= $filename;
        }
    	Article::create($params);
    }
    /**
     * Update a data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        try{
            $data = Article::find($id);
            $params = $request->all();
            $params['date'] = date('Y-m-d', strtotime($request->date));
            if ($file = $request->file('attachment')){
                @unlink(public_path('upload/article/'.$data->image));
                $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('upload/article'), $filename);
                $params['attachment']= $filename;
            }
            $data->update($params);
 
            return true;

        }catch(Exception $e){
            return $e;
        }
    }
    /**
     * Delete a data
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
        $data = Article::find($id);
        return $data;
    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByJournal($id)
    {
        try {
            $data = Article::where('type_id', 1)->where('ref_id', $id)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
    public function getByResearch($id)
    {
        try {
            $data = Article::where('type_id', 2)->where('ref_id', $id)->get();
            return $data;
        } catch (\Exception $e) {
            $d['error'] = 'Something wrong';
            return response()->json(["msg" => $e->getMessage()]);
        }
    }
}
